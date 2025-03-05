<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($postId)
    {
        return Comments::where('post_id', $postId)->get();
    }

    public function store(Request $request)
    {
        return Comments::create([
            'post_id' => $request->post_id,
            'message' => $request->message,
        ]);
    }
}
