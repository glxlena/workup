<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FavoriteNotification;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function toggleFavorite(Post $post)
    {
        $user = Auth::user();
        $isFavorited = $user->favorites()->where('post_id', $post->id)->exists();

        if ($isFavorited) {
            // remove dos favoritos
            $user->favorites()->detach($post->id);
            return response()->json([
                'favorited' => false,
                'message' => 'Post removido dos favoritos!'
            ]);
        }

        // adiciona aos favoritos
        $user->favorites()->attach($post->id);

        // notifica o dono do post (se não for o próprio usuário)
        $owner = $post->user;
        if ($owner && $owner->id !== $user->id) {
            $owner->notify(new FavoriteNotification([
                'type' => 'favorite',
                'user_id' => $user->id,
                'user_name' => $user->name,
                'post_id' => $post->id,
                'post_title' => $post->title,
            ]));
        }

        return response()->json([
            'favorited' => true,
            'message' => 'Post adicionado aos favoritos!'
        ]);
    }

    public function index(Request $request)
    {
        $query = Auth::user()->favorites()->where('status', true)->latest();

        if ($request->filled('user_type')) {
            $query->where('post_type', $request->input('user_type'));
        }

        if ($request->filled('niche')) {
            $query->where('niche', $request->input('niche'));
        }

        if ($request->filled('state')) {
            $state = $request->input('state');
            $query->whereHas('user', fn($q) => $q->where('state', $state));
        }

        if ($request->filled('city')) {
            $city = $request->input('city');
            $query->whereHas('user', fn($q) => $q->where('city', $city));
        }

        $posts = $query->with(['user', 'images'])->paginate(9)->appends($request->query());

        foreach ($posts as $post) {
            $post->is_favorited = true;
        }

        return view('home.favorites', compact('posts'));
    }

    public function undo(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer'
        ]);

        $user = Auth::user();
        $postId = (int) $request->input('post_id');

        $exists = $user->favorites()->where('post_id', $postId)->exists();
        if (! $exists) {
            $user->favorites()->attach($postId);
        }

        return redirect()->route('favorites.index')->with('success', 'Ação desfeita com sucesso!');
    }
    public function contact($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('messages.messages', compact('user'));
    }
}
