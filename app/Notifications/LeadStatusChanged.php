<?php

namespace App\Notifications;

use App\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use function Symfony\Component\Debug\Tests\testHeader;

class LeadStatusChanged extends Notification
{
    use Queueable;
    private $user;
    private $newStatus;
    private $lead;

    public function __construct($lead, $newStatus, $user)
    {
        $this->user        = $user;
        $this->newStatus   = $newStatus;
        $this->lead        = $lead;
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
                    ->line("Lead {$this->lead->trade_name} status changed to " . Status::text($this->newStatus) . " by {$this->user->name} ({$this->user->email}).")
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
