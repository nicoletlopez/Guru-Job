<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewNotification extends Notification implements ShouldQueue
{
    use Queueable;
    use Notifiable;

    protected $hr;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */


    public function __construct($hr, $message)
    {
        # $this->message;
        $this->hr = $hr;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('notifications.index');

        return (new MailMessage)
            ->subject('New Notification')
            ->line('You have a new notification')
            ->action('View Notification', url($url));
        #->line('Thank you for using our application!');
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed $notifiable
     * @return NexmoMessage
     */
   # public function toNexmo($notifiable)
   # {
   #     return (new NexmoMessage())
   #         ->content('You got a new notification! \n Regards, \n Guru')
   #         ->from('639165346971')
   #         ->unicode();
   # }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        #$data=NotificationsController::message(Request::capture());
        #return [
        #    'message'=>$data['message'],
        #    'hr'=>$data['hr'],
        #];
        return [
            'hr' => $this->hr,
            'message' => $this->message,
        ];
        #return[
        #    'message'=>$this->message,
        #];
    }
}
