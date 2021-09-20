<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // createPost
    public function createPost(Request $request)
    {
        $data = $request->all();

        $post = new Post;
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->url_image = $data['url_image'];
        $post->save();

        // $post->comment;

        $status = "success creating data post";

        return response()->json(compact('post', 'status'), 200);
    }

    public function getPost(Post $post)
    {
        $post->comment;

        return response()->json(compact('post'), 200);
    }

    public function updatePost(Request $request, Post $post)
    {
        $data = $request->all();

        // Jika title ada dan tidak kosong
        // isset = cek variable
        // empty = cek variable dan value
        if (isset($data['title']) && !empty($data['title'])) {
            $post->title = $data['title'];
        }

        // Jika description ada
        if (isset($data['description'])) {
            $post->description = $data['description'];
        }

        // Jika postingan image ada dan tidak kosong
        if (isset($data['url_image']) && !empty($data['url_image'])) {
            $post->url_image = $data['url_image'];
        }

        $post->save();

        $status = "success updating data post";

        return response()->json(compact('post', 'status'), 200);
    }

    public function deletePost(Post $post)
    {
        $comments = $post->comment;

        foreach ($comments as $comment) {
            Comment::find($comment->id)->delete();
        }

        $post->delete();

        $status = "success deleting data post";

        return response()->json(compact('status'), 200);
    }
}
