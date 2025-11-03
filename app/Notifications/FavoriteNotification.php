<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class FavoriteNotification extends Notification
{
    use Queueable;

    protected $favorite; // ou dados do post/favoritador

    public function __construct($favoriteData)
    {
        $this->favorite = $favoriteData;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'favorite',
            'user_id' => $this->favorite['user_id'],
            'user_name' => $this->favorite['user_name'],
            'post_id' => $this->favorite['post_id'],
            'post_title' => $this->favorite['post_title'],
            'created_at' => now()->toDateTimeString(),
        ];
    }
}
