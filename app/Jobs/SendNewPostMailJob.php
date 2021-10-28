<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendPostNotificationMail;
use Mail;
use App\Models\WebsitePosts;
use App\Models\WebsiteSubscriptions;

class SendNewPostMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    public $timeout = 7200; // 2 hours
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $postDetail = WebsitePosts::where("website_post_id", $this->details['website_post_id'])->first();
        $subscribeUsers = WebsiteSubscriptions::with('users')->where("website_id", $postDetail->website_id)->get();

        $input = array();
        $mailData = array();

        $input['subject'] = "New Post : ".$postDetail->post_title;
        $mailData['postTitle'] = $postDetail->post_title;
        $mailData['postDesc'] = $postDetail->description;
        
        foreach ($subscribeUsers as $key => $subscribeUser) {
            
            $input['email'] = $subscribeUser->users->email;
            $input['name'] = $subscribeUser->users->name;
            
            \Mail::send('emails.newpost', $mailData, function($message) use($input){
                $message->to($input['email'], $input['name'])->subject($input['subject']);
            });
        }
    }
}