<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsResource;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        return PostsResource::collection(Posts::all());
    }

    public function store(Request $request)
    {
        return Posts::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    public function comments(Request $request, $id)
    {
        $post = Posts::find($id);
        $comments = $post->getComments();

        array_push($comments, [
            'message' => $request->message,
        ]);

        $post->comments = json_encode($comments);
        $post->save();

        return $post;
    }
}
