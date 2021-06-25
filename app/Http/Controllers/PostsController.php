<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index ()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function edit (Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update (Post $post)
    {
        // Validate request
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $data = Admin::where('id', '=', session('LoggedInUser'))->first();
        
        // update data into database
        $update = $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'admin_id' => $data->id
        ]);

        return redirect('/posts')->with('success', 'Your post has been updated successfully.');
    }
}
