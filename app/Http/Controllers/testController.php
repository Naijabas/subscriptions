<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subscription;

class testController extends AppBaseController
{
    public function index()
    {
        $posts = Post::where('notified', 'no')->get();

        foreach($posts as  $post){
            $subs = Subscription::with('user')->where('website_id', $post->website_id)->get();

            foreach($subs as $sub){
                Mail::to($sub->user->email)
                ->send(new SendEmail($post));
            }
        }
    }
}
