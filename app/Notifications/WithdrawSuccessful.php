<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawSuccessful extends Notification
{
    use Queueable;

    protected $amount;

    protected $wallet;

    private $settings;

    /**
     * Create a new notification instance.
     *
     * @param $amount
     * @param $wallet
     * @param $settings
     * @return void
     */
    public function __construct($wallet , $amount, $settings)
    {
        $this->wallet = $wallet;
        $this->amount = $amount;
        $this->settings = $settings;
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
            'data' =>' Your withdraw of '. $this->amount.', to wallet:'. $this->wallet .' was successful'
        ];
    }
}
