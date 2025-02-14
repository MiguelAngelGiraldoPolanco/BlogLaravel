<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post_id = session('post_id');
        $post = Post::findOrFail($post_id);
        
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post)->with('success', 'Comentario agregado con éxito.');
    }
}
