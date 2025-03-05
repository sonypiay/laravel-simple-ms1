<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    public function getComments(): array
    {
        return $this->comments ? json_decode($this->comments, true) : [];
    }
}
