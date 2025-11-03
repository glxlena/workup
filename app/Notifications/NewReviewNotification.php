<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewReviewNotification extends Notification
{
    use Queueable;

    protected $review;

    public function __construct($review)
    {
        $this->review = $review;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'review',
            'review_id' => $this->review->id,
            'reviewer_id' => $this->review->reviewer_id,
            'reviewer_name' => $this->review->reviewer->name ?? 'Usuário',
            'rating' => $this->review->rating,
            'created_at' => $this->review->created_at->toDateTimeString(),
        ];
    }
}
