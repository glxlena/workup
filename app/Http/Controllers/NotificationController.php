<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    //lista as notificações do usuário logado
    public function index()
    {
        $user = Auth::user();

        $notifications = $user->notifications;

        return view('notifications.index', compact('notifications'));
    }

    //marca uma notificação como lida
    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->where('id', $id)->first();

        if (! $notification) {
            return redirect()->back()->with('error', 'Notificação não encontrada.');
        }

        // marca como lida
        $notification->markAsRead();

        $data = $notification->data;
        if (isset($data['type']) && $data['type'] === 'review' && isset($data['review_id'])) {
            return redirect()->route('user.show', [
                'user' => Auth::id(),
                'highlight_review' => $data['review_id']
            ]);
        }

        if (isset($data['type']) && $data['type'] === 'favorite' && isset($data['post_id'])) {
            //vai para meus posts 
            return redirect()->route('posts.userPosts', [
                'highlight_post' => $data['post_id']
            ]);
        }

        // fallback
        return redirect()->back();
    }

    // marca todas as notificações como lidas
    public function markAllAsRead(Request $request)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        if ($request->wantsJson()) {
            return response()->json(['ok' => true]);
        }

        return redirect()->back();
    }

    // exclui uma notificação específica do usuário logado
    public function destroy($id)
    {
        $user = Auth::user();
        /** @var DatabaseNotification|null $notification */
        $notification = $user->notifications()->where('id', $id)->first();

        if (! $notification) {
            return redirect()->back()->with('error', 'Notificação não encontrada.');
        }

        $notification->delete();

        return redirect()->back()->with('success', 'Notificação excluída.');
    }
}
