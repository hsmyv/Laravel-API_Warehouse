<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id'];


    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function user()
    {
        // I set withDefault because of avoid 'Trying to get property 'name' of non-object' when I fetch $comment->user->name
       return $this->belongsTo(User::class)->withDefault(
        [
            'name' => 'Deleted Profile'
        ]
       );
    }
}
