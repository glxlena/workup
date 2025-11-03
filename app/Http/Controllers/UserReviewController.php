<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewReviewNotification;

class UserReviewController extends Controller
{
    public function store(Request $request, $reviewedId)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:300',
        ]);
        if ($reviewedId == Auth::id()) {
            return back()->with('error', 'Você não pode se avaliar.');
        }

        // criar avaliação
        $review = UserReview::create([
            'reviewer_id' => Auth::id(),
            'reviewed_id' => $reviewedId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // notificar o usuário avaliado
        $reviewedUser = User::find($reviewedId);
        if ($reviewedUser) {
            $reviewedUser->notify(new NewReviewNotification($review));
        }


        return back()->with('success', 'Avaliação registrada com sucesso!');
    }

    public function destroy($id)
    {
        $review = UserReview::findOrFail($id);

        if ($review->reviewed_id !== Auth::id()) {
            return back()->with('error', 'Você não pode excluir esta avaliação.');
        }

        // salva os dados para possível desfazer
        session(['deleted_review' => $review]);

        $review->delete();
        return back()->with('review_deleted', 'Avaliação excluída com sucesso!');
    }

    public function undoDelete()
    {
        if (session()->has('deleted_review')) {
            $data = session('deleted_review');
            UserReview::create([
                'reviewer_id' => $data->reviewer_id,
                'reviewed_id' => $data->reviewed_id,
                'rating' => $data->rating,
                'comment' => $data->comment,
            ]);
            session()->forget('deleted_review');
            return back()->with('success', 'Avaliação restaurada com sucesso!');
        }
        return back()->with('error', 'Não há avaliação para restaurar.');
    }


}

