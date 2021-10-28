<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSubscriptions extends Model
{   
    public $fillable = [
        'website_id',
        'user_id'        
    ];

    public function users() {  
        return $this->belongsTo('App\Models\User', 'user_id');  
    }  
}