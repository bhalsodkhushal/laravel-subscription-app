<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsitePosts extends Model
{   
    public $fillable = [
        'website_id',
        'post_title',
        'description',
        'is_active'
    ];
}