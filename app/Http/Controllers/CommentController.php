<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request, Post $post)
    {
        $data = $request->all();

        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->body = $data['body'];

        $comment->save();

        $post->comment;

        $status = "success create comment";

        return response()->json(compact('post', 'status'), 200);
    }

    public function updateComment(Request $request, Post $post, Comment $comment)
    {
        $data = $request->all();

        if (isset($data['body']) && !empty($data['body'])) {
            $comment->body = $data['body'];
        }

        $comment->save();

        $post->comment;

        $status = "success update comment";

        return response()->json(compact('post', 'status'), 200);
    }

    public function deleteComment(Post $post, Comment $comment)
    {
        $comment->delete();

        $status = "success delete comment";

        return response()->json(compact('status'), 200);
    }
}
