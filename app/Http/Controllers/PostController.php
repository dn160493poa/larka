<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index(){
        $post = Post::find(1);

        $test = Post::where('id', 1)->get();

        dd($test);

        //return 'bcaaaaaa';
    }

    public function create()
    {
        $postArr = [
            [
                'title' => 'About russians pigs',
                'content' => 'bla bla bla bla bla bla',
                'image' => 'image_bla_bla_bla.jpeg',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'About belorussians mouses',
                'content' => 'bla bla bla bla bla bla',
                'image' => 'image_bla_bla_bla.jpeg',
                'likes' => 15,
                'is_published' => 1,
            ]
        ];

        foreach ($postArr as $post)
        {
            Post::create([
                'title' => $post['title'],
                'content' => $post['content'],
                'image' => $post['image'],
                'likes' => $post['likes'],
                'is_published' => $post['is_published']
            ]);
        }
    }

    public function update()
    {
        $post = Post::find(1);

        $post->update([
            'title' => 'new title',
            'content' =>'new title',
            'image' => 'new title',
            'likes' => 0,
            'is_published' => 0
        ]);
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
