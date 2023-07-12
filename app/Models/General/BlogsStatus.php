<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsStatus extends Model
{
    use HasFactory;
    protected $table = 'blogs_list_status';
    public $timestamps = false;

    protected $fillable = [
        "status",
    ];
}
