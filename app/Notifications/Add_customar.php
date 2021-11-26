<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\customar;
use App\model\customar_attach;
use App\model\customar_item;
use Auth;
class Add_customar extends Notification
{
    use Queueable;
     private $customar;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(customar $customar)
    {
        $this->customar=$customar;
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

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' =>$this->customar->id,
            'titel'=>'تم اظافة عميل بواسطة',
             'user'=> auth('admin') -> user() -> name,
        ];
    }
}
