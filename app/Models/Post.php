<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'post_image',
        'post_image_file_size',
        'post_image_extension',
        'post_image_size',
        'post_caption',
        'post_status',
        'user_id',
        'post_hashtags'
    ];
}
