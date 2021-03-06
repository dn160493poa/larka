<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);

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
            'title' => '????????????????????',
            'content' =>'bla bla bla bla bla bla',
            'image' => 'Gratatata',
            'likes' => 0,
            'is_published' => 0,
        ]);

        dd($post->content);
    }


}
