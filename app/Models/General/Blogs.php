<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    public $timestamps = true;

    protected $fillable = [
        "blogs_title",
        "blogs_contents",
        "blogs_desc",
        "blogs_image",
        "authors",
        "published_at",
        "status",
    ];
}
