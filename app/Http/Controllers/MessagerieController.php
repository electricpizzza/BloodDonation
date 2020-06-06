<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Conversation;
use App\Events\MessageEvent;
use App\Notifications\MessageNotif;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class MessagerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function readMsg(Conversation $conversation)
    {
        $unreadMessagess =  auth()->user()->unreadNotifications->where('type','App\Notifications\MessageNotif');
        foreach ($unreadMessagess as $item)
            if ($item['data']['id']==$conversation->messages->last()->id)
            $item->markAsRead();
    }

    public function index()
    {
        $user = auth()->user();
        $conversations= Conversation::join('blood_requests','blood_requests.id','conversations.blood_request_id')
        ->select('conversations.*')->where('blood_requests.user_id',$user->id)
        ->select('conversations.*')->OrWhere('conversations.user_id',$user->id)
        ->latest()->get();
        $messages=null;
        $conversation_curent=null;
        return view("messagerie",compact('conversations','messages','conversation_curent'));
    }

    public function conversation(Conversation $conversation)
    {
        $user = auth()->user();
        
        //$this->readMsg($conversation);
            
        $conversations= Conversation::join('blood_requests','blood_requests.id','conversations.blood_request_id')
        ->select('conversations.*')->where('blood_requests.user_id',$user->id)
        ->OrWhere('conversations.user_id',$user->id)
        ->orderby('updated_at','DESC')->get();

        $messages = $conversation->messages()->orderby('updated_at')->get();

        $conversation_curent = $conversation;


        return view("messagerie",compact('conversations','messages','conversation_curent'));
    }

    public function respond(BloodRequest $blood_request_id)
    {
        $message = request()->validate([
            "message" => "required"
        ]);
        
        $conversation =  $blood_request_id->conversations()->create([
             "user_id"=>auth()->user()->id,
         ]);
         $conversation->messages()->create([
            "user_id"=>auth()->user()->id,
            "message"=>$message["message"]
         ]);
        return redirect('inbox/'.$conversation->id);
    }

    public function send(Conversation $conversation,Request $message)
    {
        $this->readMsg($conversation);

        $conversation->updated_at=new DateTime('now');
        $conversation->save();
        $message = $conversation->messages()->create([
            "user_id"=>auth()->user()->id,
            "message"=>$message->message
         ]);
         


            if ($conversation->user->id == auth()->user()->id) {
            $usr = Bloodrequest::find($conversation->blood_request_id)->user()->first();
            }else{
                $usr = $conversation->user()->first();
            }
             $usr->notify(new MessageNotif($message,$usr));
            return response($usr,200);

        
    }
}
