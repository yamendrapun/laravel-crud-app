<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index ()
    {
        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        
        $posts = Post::latest();

        if(request('search')){
            $posts 
                ->where('title', 'LIKE', '%'.request('search').'%')
                ->orWhere('content', 'LIKE', '%'.request('search').'%');
        }

       return view('admin.posts.index', ['posts' => $posts->get(), 'admin' => $admin]);
    }
    
    public function show (Post $post)
    {
        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();

        $data = DB::table('posts')
            ->join('admins', 'admins.id', '=', 'posts.admin_id')
            ->select('posts.*', 'admins.firstName', 'admins.lastName')
            ->where('posts.id', $post->id)
            ->get();
        return view('admin.posts.show', ['data' => $data, 'admin' => $admin]);
    }

    public function create ()
    {
        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        return view('admin.posts.create', ['admin' => $admin]);
    }

    public function store (Request $request)
    {
        // Validate request
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        
        $admin = new Post;
        $admin->title = $request->title;
        $admin->content = $request->content;
        $admin->admin_id = $admin->id;
        $save = $admin->save();


        if($save){
            return redirect('/posts')->with('success', 'New Post has been successfully added to database');
        }else{
            return redirect('/posts')->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function edit (Post $post)
    {
        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        return view('admin.posts.edit', ['post' => $post, 'admin' => $admin]);
    }

    public function update (Post $post)
    {
        // Validate request
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        
        // update data into database
        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'admin_id' => $admin->id
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

    public function search (Request $request)
    {
       $admin = Admin::where('id', '=', session('LoggedInUser'))->first();

        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $posts = DB::table('posts')->where('title', 'LIKE', '%'.$search_text.'%');
            dd($posts);
            return view('admin.posts.index',['posts' => $posts, 'admin' => $admin]);
        }else{
            return view('search');
        }

    //     $posts = Post::query()
    //         ->where('title', 'LIKE', '%{$search}%')
    //         ->orWhere('content', 'LIKE', '%{$search}%')
    //         ->get();

    //    $admin = Admin::where('id', '=', session('LoggedInUser'))->first();

        // return view('admin.posts.index', ['posts' => $posts, 'admin' => $admin]);

    }
}
