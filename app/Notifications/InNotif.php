<?php

namespace App\Notifications;

use App\BloodRequest;
use App\Events\NotificationEvent;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InNotif extends Notification 
{
    use Queueable;
    public $request,$user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(BloodRequest $request ,User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }



    public function toDatabase($notifiable)
    {
        $info = $this->request;
        $info = [
            "id"=> $info->id,
            "user_id"=> $info->user_id,
            "sender_name"=>$this->user->name,
            "caravan_id"=> $info->caravan_id,
            "association_id"=> $info->association_id,
            "bloodType"=> $info->bloodType,
            "city"=> $info->city,
            "address"=> $info->address,
            "description"=> $info->description,
            "deadline"=> $info->deadline,
            "created_at"=> $info->created_at,
            "updated_at"=> $info->updated_at
        ];
        event(new NotificationEvent($info));
        return $info;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
