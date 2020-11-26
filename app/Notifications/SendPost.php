<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;

class SendPost extends Notification
{
    use Queueable;
    private $post;

    /**
     * Create a new notification instance.
     *
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return TelegramFile
     */
    public function toTelegram($notifiable)
    {
        $url = url('posts/'.$this->post->id.'-'.$this->post->slug);
        $shortUrl = url($this->post->short_link);

        return TelegramFile::create()
            ->to($this->post->chat_id)
            ->token($this->post->bot_token)
            ->content("\n".$this->post->description)
            ->file(public_path($this->post->image->url), 'photo');
        /*
         * As soon as the application will be deployed, we can uncommit this line. Otherwise, it will cause problem as the result of localhost
         */
//            ->button($shortUrl, $url);
    }
}
