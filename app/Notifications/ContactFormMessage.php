<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Notifications\Notification;

class ContactFormMessage extends Notification
{
    use Queueable;
    protected $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(contactFormRequest $message)
    {
        $this->message = $message;
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
        return (new MailMessage)
                    ->subject(config('recipient.name') . ", you have a new message!")
                    ->greeting(" ")
                    ->line('Hello,')
                    ->line('You have a new message from your Contact Us form.')
                    ->line("From: {$this->message->name}")
                    ->line("Email: {$this->message->email}")
                    ->line("Message: {$this->message->message}");
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
