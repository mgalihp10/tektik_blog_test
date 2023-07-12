<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsComments extends Model
{
    use HasFactory;
    protected $table = 'blogs_comments';
    public $timestamps = true;

    protected $fillable = [
        "id_blog",
        "user_id",
        "fullname",
        "email",
        "comments",
    ];
}
