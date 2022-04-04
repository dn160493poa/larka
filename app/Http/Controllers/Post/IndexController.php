<?php


namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        //$data = $request->validated();

        $posts = Post::paginate(10);


        return view('posts.index', compact('posts'));
    }

}
