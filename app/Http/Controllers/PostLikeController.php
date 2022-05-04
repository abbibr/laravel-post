<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Post $post){
        // $like = Post::find($id);
        // dd($post->likedBy(auth()->user())); -> like bosgan yoki bosmaganini tekshiradi (true yoki false qaytadi)

        if($post->likedBy(auth()->user())){
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post){
        auth()->user()->likes()->where('post_id', $post->id)->delete();
        //dd
        return redirect()->back();
    }
}
