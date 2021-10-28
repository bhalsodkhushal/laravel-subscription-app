<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\WebsitePosts;
use Validator;

class PostController extends Controller
{
    public function createWebsitePost(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'website_id' => 'required|string|exists:websites,website_id',
			'post_title' => 'required|string|max:100',
			'description' => 'required|string',
			'is_active' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $post = WebsitePosts::create($request->all());

        $details = array();
        $details['website_post_id'] = $post->website_post_id;       
  
        dispatch(new \App\Jobs\SendNewPostMailJob($details))->delay(now()->addSeconds(2)); ;
        
        return response()->json($post, 201);
    }
}
