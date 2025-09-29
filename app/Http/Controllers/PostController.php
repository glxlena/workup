<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ],
        [
            'title.required' => 'Preencha o título.',
            'description.required' => 'Preencha a descrição.',
            'niche.required' => 'Informe a categoria.',
            'post_type.required' => 'Selecione.',
        ]);

        $data = $request->only(['post_type', 'title', 'description', 'niche']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('home')->with('success', 'Post criado com sucesso!');
    }

    public function edit(Post $post)
    {

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_type = $request->post_type;
        $post->niche = $request->niche;

        if ($request->input('remove_image') == "1" && $post->image_path) {
            Storage::disk('public')->delete($post->image_path);
            $post->image_path = null;
        }

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('posts.userPosts')->with('success', 'Post editado com sucesso!');
    }

    public function destroy(Post $post)
    {
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        session([
            'deleted_post' => $post->toArray(),
            'deleted_post_id' => $post->id,
            'deleted_post_image' => $post->image_path,
        ]);
    
        $post->delete();
    
        return redirect()->route('posts.userPosts')->with('post_deleted', 'Post excluído com sucesso.');

    }

//função para desfazer a exclusão de post
    public function undoDelete(Request $request)
    {
        if (session()->has('deleted_post')) {
            $data = session('deleted_post');
            unset($data['created_at'], $data['updated_at'], $data['id']);
            $post = new Post($data);
            $post->id = session('deleted_post_id');
            $post->exists = false;
            $post->save();
            session()->forget(['deleted_post', 'deleted_post_id', 'deleted_post_image']);

            return redirect()->route('posts.userPosts')->with('success', 'Exclusão desfeita com sucesso!');
        }

        return redirect()->route('posts.userPosts')->with('error', 'Nada para desfazer.');
    }


    public function userPosts(Request $request)
    {
        $query = Auth::user()->posts()->with('user')->latest();

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
