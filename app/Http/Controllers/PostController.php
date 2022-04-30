<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        /* Post::create([
            'user_id' => auth()->id(),
            'body' => $request->body
        ]); */

        auth()->user()->posts()->create([
            'body' => $request->body
        ]);

        return redirect()->back();
    }
}
