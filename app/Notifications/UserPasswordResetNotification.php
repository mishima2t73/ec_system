<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class UserPasswordResetNotification extends ResetPasswordNotification
{
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
            ->subject(Lang::get('パスワードの再設定'))
            ->line('アカウントのパスワードリセットリクエストを受け取ったため、このメールを送信しています。')
            ->action('パスワードの再設定', url(config('url').route('User.password.reset', $this->token, false)))
            ->line('もし心当たりがない場合は、本メッセージを破棄してください。');
    }
}