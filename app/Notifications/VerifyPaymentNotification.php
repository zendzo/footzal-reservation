<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyPaymentNotification extends Notification
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
                ->subject('Booking Telah Diverifikasi')
                ->line('Hai '.$this->order->member->fullName)
                ->line('Booking Anda Dengan Kode '.$this->order->code.' Telah Diverifikasi')
                ->line('Detail Booking')
                ->line('Tanggal : '.$this->order->seat->slot->rent_date.' Jam : '.$this->order->seat->rent_time)
                ->line('Lokasi '.$this->order->seat->slot->lapangan->name)
                ->line('Alamat '.$this->order->seat->slot->lapangan->address)
                ->line('Total Rp.'.$this->order->seat->price)
                ->action('Lihat Detail', url('/member/my-order'))
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
