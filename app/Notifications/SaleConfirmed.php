<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Cart;

class SaleConfirmed extends Notification
{
    use Queueable;

    protected $sale;

    /**
     * Create a new notification instance.
     */
    public function __construct($sale)
    {
        $this->sale = $sale;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $carts = Cart::where('reg', $this->sale->reg)->with('product')->get();

        return (new MailMessage)
                    ->subject('Sale Confirmed')
                    ->greeting('Hello Sir, I am ' . $notifiable->name)
                    ->line('Your sale with ID #' . $this->sale->reg . ' has been confirmed.')
                    ->view('email.sale-confirmed-notification', [
                        'sale' => $this->sale,
                        'carts' => $carts,
                        'user' => $notifiable
                    ]);
                    // ->action('View Sale', url('/order-view/' . $this->sale->reg))
                    // ->line('Thank you for your business!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'sale_id' => $this->sale->id,
            'message' => 'Your sale has been confirmed!'
        ];
    }
}
