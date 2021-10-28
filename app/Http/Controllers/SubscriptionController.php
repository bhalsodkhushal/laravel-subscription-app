<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\WebsiteSubscriptions;
use Validator;

class SubscriptionController extends Controller
{
    public function storeSubscription(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'website_id' => 'required|integer|exists:websites,website_id',
			'user_id' => 'required|integer|exists:users,id',
		]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $checkSubscription = WebsiteSubscriptions::where(["user_id" => $data['user_id'], "website_id" => $data['website_id']])->first();
        if(!empty($checkSubscription)) {
            return response(['error' => "You have already subscribed for selected website.", 'Validation Error']);
        }

        $post = WebsiteSubscriptions::create($request->all());

        return response()->json($post, 201);
    }
}
