<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MemberOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
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
            ->subject('Booking Masuk CODE #'.$this->order->code)
            ->line('Member '.$this->order->member->fullName.' Melakukan Booking')
            ->line('Kode '.$this->order->code)
            ->line('Detail Booking')
            ->line('Tanggal : '.$this->order->seat->slot->rent_date.' Jam : '.$this->order->seat->rent_time)
            ->line('Lokasi '.$this->order->seat->slot->lapangan->name)
            ->line('Alamat '.$this->order->seat->slot->lapangan->address)
            ->line('Total Rp.'.$this->order->seat->price)
            ->action('Verifikasi Booking', url('/admin/order-detail/'.$this->order->code))
            ->line('Terimakasih!');
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
