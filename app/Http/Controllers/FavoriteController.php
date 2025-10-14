<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function toggleFavorite(Post $post)
    {
        $isFavorited = Auth::user()->favorites()->where('post_id', $post->id)->exists();

        if ($isFavorited) {
            Auth::user()->favorites()->detach($post->id);
            return response()->json(['favorited' => false, 'message' => 'Post removido dos favoritos!']);
        } else {
            Auth::user()->favorites()->attach($post->id);
            return response()->json(['favorited' => true, 'message' => 'Post adicionado aos favoritos!']);
        }
    }

    public function index(Request $request)
    {
        $query = Auth::user()->favorites()->where('status', true)->latest();
    
        // filtro por tipo de post
        if ($request->filled('user_type')) {
            $query->where('post_type', $request->input('user_type'));
        }
    
        // filtro por categoria
        if ($request->filled('niche')) {
            $query->where('niche', $request->input('niche'));
        }
    
        //filtro por Estado (precisa da relação com o usuário do post)
        if ($request->filled('state')) {
            $state = $request->input('state');
            $query->whereHas('user', function ($q) use ($state) {
                $q->where('state', $state);
            });
        }
    
        //filtro por Cidade
        if ($request->filled('city')) {
            $city = $request->input('city');
            $query->whereHas('user', function ($q) use ($city) {
                $q->where('city', $city);
            });
        }
        
        $posts = $query->with(['user', 'images'])->paginate(9)->appends($request->query());
    
        foreach ($posts as $post) {
            $post->is_favorited = true;
        }
    
        return view('home.favorites', compact('posts'));
    }
}