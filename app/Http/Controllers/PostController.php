<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'test'
        ], [
            'title' => 'Created',
            'content' =>'test',
            'image' => 'test',
            'likes' => 0,
            'is_published' => 0,
        ]);

        dd($post->content);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'Gratatata'
        ], [
            'title' => 'Гратататта',
            'content' =>'bla bla bla bla bla bla',
            'image' => 'Gratatata',
            'likes' => 0,
            'is_published' => 0,
        ]);

        dd($post->content);
    }


}
