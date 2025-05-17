<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;
    protected $order;
    protected $message;

    /**
     * Create a new notification instance.
     */
     public function __construct($order, $message)
     {
         $this->order = $order;
         $this->message = $message;
     }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
     public function via($notifiable)
     {
         return ['mail'];
     }

    /**
     * Get the mail representation of the notification.
     */
     public function toMail($notifiable)
     {
         return (new \Illuminate\Notifications\Messages\MailMessage)
             ->subject('اطلاعیه وضعیت سفارش')
             ->greeting('سلام!')
             ->line($this->message)
             ->action('مشاهده سفارش', url(route('user.orders.show', $this->order->id)))
             ->line('با تشکر از خرید شما!');
     }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
