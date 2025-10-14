<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'images'])->where('status', true)->latest();

        if ($request->filled('user_type')) {
            $query->where('post_type', $request->input('user_type'));
        }
    
        if ($request->filled('niche')) {
            $query->where('niche', $request->input('niche'));
        }
    
        if ($request->filled('state')) {
            $state = $request->input('state');
            $query->whereHas('user', function ($q) use ($state) {
                $q->where('state', $state);
            });
        }
    
        if ($request->filled('city')) {
            $city = $request->input('city');
            $query->whereHas('user', function ($q) use ($city) {
                $q->where('city', $city);
            });
        }
        $posts = $query->paginate(9)->appends($request->query());
    
        if (Auth::check()) {
            $favoritedPostIds = Auth::user()->favorites()->pluck('post_id')->toArray();
            foreach ($posts as $post) {
                $post->is_favorited = in_array($post->id, $favoritedPostIds);
            }
        } else {
            foreach ($posts as $post) {
                $post->is_favorited = false;
            }
        }
    
        return view('home', compact('posts'));
    }
    
    

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_type' => 'required|in:freelancer,recrutador',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'niche' => 'required|string|max:255',
            'images' => 'nullable|array|max:5', 
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ],
        [
            'title.required' => 'Preencha o título.',
            'description.required' => 'Preencha a descrição.',
            'niche.required' => 'Informe a categoria.',
            'post_type.required' => 'Selecione.',
            'images.max' => 'Você pode enviar no máximo 5 fotos.',
            'images.*.image' => 'Um dos arquivos enviados não é uma imagem válida.',
            'images.*.max' => 'Cada foto não pode exceder 2MB.',
        ]);

        $data = $request->only(['post_type', 'title', 'description', 'niche']);
        $data['user_id'] = Auth::id();
        $post = Post::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');

                $post->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('posts.userPosts')->with('success', 'Post criado com sucesso!');
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar este post.');
        }

        $post->load('images');

        return view('home.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_type' => 'required|in:freelancer,recrutador',
            'niche' => 'required|string|max:255',
            'new_images' => 'nullable|array|max:5', 
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'removed_images' => 'nullable|array', 
            'removed_images.*' => 'exists:post_images,id', 
        ], 
        [
            'new_images.max' => 'Você pode adicionar no máximo 5 novas fotos.',
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'post_type' => $request->post_type,
            'niche' => $request->niche,
        ]);
        
        if ($request->filled('removed_images')) {
            $removedImageIds = $request->input('removed_images');
            
            $imagesToRemove = $post->images()->whereIn('id', $removedImageIds)->get();

            foreach ($imagesToRemove as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
        }

        if ($request->hasFile('new_images')) {
            $existingCount = $post->images()->count();
            $newCount = count($request->file('new_images'));
            
            if ($existingCount + $newCount > 5) {
                return redirect()->back()->with('error', 'O post não pode ter mais de 5 fotos. Remova algumas existentes antes de adicionar novas.')->withInput();
            }

            foreach ($request->file('new_images') as $image) {
                $path = $image->store('posts', 'public');
                $post->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('posts.userPosts')->with('success', 'Post editado com sucesso!');
    }

    public function destroy(Post $post)
    {
        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        session([
            'deleted_post' => $post->toArray(),
            'deleted_post_id' => $post->id,
            'deleted_post_images' => $post->images->pluck('path')->toArray(), 
        ]);
    
        $post->delete();
    
        return redirect()->route('posts.userPosts')->with('post_deleted', 'Post excluído com sucesso.');
    }

//função para desfazer a exclusão de post
    public function undoDelete(Request $request)
    {
        if (session()->has('deleted_post')) {
            $data = session('deleted_post');
            $imagePaths = session('deleted_post_images', []);

            unset($data['created_at'], $data['updated_at'], $data['id']);
            $post = new Post($data);
            $post->id = session('deleted_post_id');
            $post->exists = false;
            $post->save();

            foreach ($imagePaths as $path) {
                $post->images()->create(['path' => $path]);
            }
            
            session()->forget(['deleted_post', 'deleted_post_id', 'deleted_post_images']);

            return redirect()->route('posts.userPosts')->with('success', 'Exclusão desfeita com sucesso!');
        }

        return redirect()->route('posts.userPosts')->with('error', 'Nada para desfazer.');
    }

    public function userPosts(Request $request)
    {
        $query = Auth::user()->posts()->with(['user', 'images'])->latest(); // Carrega as imagens

        if ($request->filled('user_type')) {
            $query->where('post_type', $request->input('user_type'));
        }

        if ($request->filled('niche')) {
            $query->where('niche', $request->input('niche'));
        }

        $posts = $query->paginate(10)->appends($request->query());

        // separa em dois grupos
        $availablePosts = $posts->filter(fn($post) => $post->status);
        $unavailablePosts = $posts->filter(fn($post) => !$post->status);

        return view('home.userPosts', compact('availablePosts', 'unavailablePosts', 'posts'));
    }


    //mudar status de disponibilidade do post
    public function toggleStatus(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Você não tem permissão para alterar este post.');
        }

        $post->status = !$post->status; // alterna disponível/indisponível
        $post->save();

        return redirect()->route('posts.userPosts')->with('success', 'Status do post atualizado!');
    }
}