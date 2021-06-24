<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    //use Queueable;
    public static $toMailCallback;
 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
         
        return (new MailMessage)->view(
            'emails.auth.register', ['url' => $this->verificationUrl($notifiable)]
        )->subject('本登録確認メール');
    }
 
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'user.verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );
    }
 
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
