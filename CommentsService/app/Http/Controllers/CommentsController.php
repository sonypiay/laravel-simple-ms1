<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentsController extends Controller
{
    public function index($postId)
    {
        return Comments::where('post_id', $postId)->get();
    }

    public function store(Request $request)
    {
        $comments = Comments::create([
            'post_id' => $request->post_id,
            'message' => $request->message,
        ]);

        Http::post("http://localhost:8080/api/posts/{$comments->post_id}/comments", [
            'message' => $comments->message,
        ]);

        return $comments;
    }
}
