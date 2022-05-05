<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user','likes')->orderBy('created_at', 'desc')->paginate(15);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post){     
        return view('posts.show', [
            'post' => $post
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

    public function destroy(Post $post){
        /* if(!$post->ownedBy(auth()->user())){
            return response(null, 409);
        } */
    
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->back();
    }
}
