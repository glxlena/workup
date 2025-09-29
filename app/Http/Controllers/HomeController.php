<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user')->where('status', true)->latest();

        // filtro por tipo de post
        if ($request->filled('user_type')) {
            $query->where('post_type', $request->input('user_type'));
        }
    
        // filtro por categoria
        if ($request->filled('niche')) {
            $query->where('niche', $request->input('niche'));
        }
    
        // filtro por estado
        if ($request->filled('state')) {
            $state = $request->input('state');
            $query->whereHas('user', function ($q) use ($state) {
                $q->where('state', $state);
            });
        }

        // filtro por cidade
        if ($request->filled('city')) {
            $city = $request->input('city');
            $query->whereHas('user', function ($q) use ($city) {
                $q->where('city', $city);
            });
        }
        
        $posts = $query->paginate(9)->appends($request->query());
    
        // INJETAR O STATUS DE FAVORITO
        if (Auth::check()) {
            $favoritedPostIds = Auth::user()->favorites()->pluck('post_id')->toArray();
            
            $posts->getCollection()->transform(function ($post) use ($favoritedPostIds) {
                $post->is_favorited = in_array($post->id, $favoritedPostIds);
                return $post;
            });
        }

        return view('home.home', compact('posts'));
    }
    
    public function create()
    {
        return view('home.create');
    }
}