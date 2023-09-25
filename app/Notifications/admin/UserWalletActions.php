<?php

namespace App\Notifications\admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWalletActions extends Notification
{
    use Queueable;

    protected $user;
    protected $amount;
    protected $wallet;
    private $action;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $amount
     * @param $wallet
     * @param $action
     * @return void
     */
    public function __construct($user, $wallet , $amount, $action)
    {
        $this->user = $user;
        $this->wallet = $wallet;
        $this->amount = $amount;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
            ->greeting('Hello,')
            ->line('User: '. $this->user->name .' made '. $this->action.' of '. $this->amount.', to wallet: '. $this->wallet .'')
            ->action('View dashboard', url('/'))
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
            'data' => 'User: '. $this->user->name .' made '. $this->action.' of '. $this->amount.', to wallet: '. $this->wallet .''
        ];
    }
}
