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
       $admin = Admin::where('id', '=', session('LoggedInUser'))->first();

        return view('posts.index', ['posts' => $posts, 'admin' => $admin]);
    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store (Request $request)
    {
        // Validate request
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $data = Admin::where('id', '=', session('LoggedInUser'))->first();
        
        $admin = new Post;
        $admin->title = $request->title;
        $admin->content = $request->content;
        $admin->admin_id = $data->id;
        $save = $admin->save();


        if($save){
            return redirect('/posts')->with('success', 'New Post has been successfully added to database');
        }else{
            return redirect('/posts')->with('fail', 'Something went wrong, please try again later');
        }
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
        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'admin_id' => $data->id
        ]);

        return redirect('/posts')->with('success', 'Your post has been updated successfully.');
    }

    public function destroy (Post $post)
    {
        if($post->delete()){
            return redirect('/posts')->with('success', 'Post was been successfully deleted from database');
        }else{
            return redirect('/posts')->with('fail', 'Something went wrong, please try again later');
        }
    }
}
