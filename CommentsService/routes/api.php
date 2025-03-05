<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{postId}/comments', [CommentsController::class, 'index']);
Route::post('comments', [CommentsController::class, 'store']);