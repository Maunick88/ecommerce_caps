<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmation extends Notification
{
    protected $order;

    /**
     * Create a new notification instance.
     *
     * @param  $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) 
    {
        $orderDetailsUrl = route('order.details', ['id' => $this->order->id]);
        return (new MailMessage)
            ->subject('Confirmación de tu Pedido')
            ->markdown('emails.order_confirmation', [
                'order' => $this->order, 
                'user' => $notifiable
            ]);
    }
}
