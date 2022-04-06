<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts_count = Post::count();

        return view('admin.post.edit', compact('post', 'categories', 'tags', 'posts_count'));
    }
}
