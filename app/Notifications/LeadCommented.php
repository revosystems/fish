<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LeadCommented extends Notification
{
    use Queueable;
    public $user;
    public $comment;
    private $lead;

    public function __construct($lead, $comment, $user)
    {
        $this->user     = $user;
        $this->comment  = $comment;
        $this->lead     = $lead;
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
            ->line("Lead {$this->lead->trade_name} commented by {$this->user->name} ({$this->user->email}).")
            ->line("{$this->comment}.")
            ->action('See lead', route('leads.show', $this->lead))
            ->line('Thank you for using our application!');
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
