<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminPasswordResetNotification extends ResetPasswordNotification
{
    //別サイト参考改変
    public function __construct($token)
    {
        $this->token = $token;
    }
    public function toMail($notifiable)
    {
        if (static::$toMailCallback){
            return call_user_func(static::$toMailCallback, $notifiable,$this->token);
        }
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url(config('url').route('admin.password.reset', $this->token, false)))
            ->line('If you did not request a password reset, no further action is required.');
    }
}