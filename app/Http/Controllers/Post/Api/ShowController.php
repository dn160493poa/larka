<?php

namespace App\Http\Controllers\Post\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
