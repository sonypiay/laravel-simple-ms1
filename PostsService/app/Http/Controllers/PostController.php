<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::all();

        foreach( $posts as $post )
        {
            $post->comments = Http::get("http://localhost:8081/api/posts/{$post->id}/comments")->json();
        }

        return $posts;
    }

    public function store(Request $request)
    {
        return Posts::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }
}
