<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Conversation;
use App\Events\MessageEvent;
use App\Notifications\MessageNotif;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class MessagerieController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $conversations= Conversation::join('blood_requests','blood_requests.id','conversations.blood_request_id')
        ->select('conversations.*')->where('blood_requests.user_id',$user->id)
        ->select('conversations.*')->OrWhere('conversations.user_id',$user->id)
        ->latest()->get();
        $messages=null;
        return view("messagerie",compact('conversations','messages'));
    }

    public function conversation(Conversation $conversation)
    {
        $user = auth()->user();
        $conversations= Conversation::join('blood_requests','blood_requests.id','conversations.blood_request_id')
        ->select('conversations.*')->where('blood_requests.user_id',$user->id)
        ->OrWhere('conversations.user_id',$user->id)
        ->orderby('created_at','DESC')->get();

        $messages = $conversation->messages()->orderby('created_at')->get();

        $conversation_curent = $conversation;
        return view("messagerie",compact('conversations','messages','conversation_curent'));
    }

    public function respond(BloodRequest $blood_request_id)
    {
        $message = request()->validate([
            "message" => "required"
        ]);

        $conversations =  $blood_request_id->conversations()->create([
             "user_id"=>auth()->user()->id,
         ]);
         $conversations->messages()->create([
            "user_id"=>auth()->user()->id,
            "message"=>$message["message"]
         ]);
        return redirect('inbox');
    }

    public function send(Conversation $conversation,Request $message)
    {

        $message = $conversation->messages()->create([
            "user_id"=>auth()->user()->id,
            "message"=>$message->message
         ]);
         


            if ($conversation->user->id == auth()->user()->id) {
            $usr = Bloodrequest::find($conversation->blood_request_id)->user()->first();
            }else{
                $usr = $conversation->user()->first();
            }
            //Notification::Send($usr, new  MessageNotif($message,$usr));
             $usr->notify(new MessageNotif($message,$usr));
            return response($usr,200);

        
    }
}
