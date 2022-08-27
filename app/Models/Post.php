<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'category_id',
        'subject',
        'body',
        'status',
        'image_path',

    ];

    //get comment for the post
    public function comments()
    {
        return $this->hasMany(
            Comment::class,
            'post_id',
            'id'
        );
    }

    //get user that owns the post
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id',
        );
    }

    //get category of the post
    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'id',
        );
    }


}
