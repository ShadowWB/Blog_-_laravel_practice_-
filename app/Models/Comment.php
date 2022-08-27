<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_email',
        'comment',

    ];

    ////get post that owns the comment
    public function  post()
    {
        return $this->belongsTo(
            Post::class,
            'post_id',
            'id'
        );
    }
}
