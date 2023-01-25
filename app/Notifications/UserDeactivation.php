<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserDeactivation extends Notification
{
    use Queueable;

    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Object $user)
    {
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = 'deactivated';
        if ($this->user->active)
            $message = 'activated';

        // Tempory mail format
        return (new MailMessage)
                    ->subject('Account status update')
                    ->line('Hello '.$this->user->Fname.' '.$this->user->Lname.',')
                    ->line('Your account has been '.$message);
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
