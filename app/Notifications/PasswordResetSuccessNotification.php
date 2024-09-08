<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetSuccessNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        $userEmail = $this->user->email;
        $userPassword = $this->user->noHashingPassword;
        return (new MailMessage)
                    ->subject('[NAAFIZA] - Votre nouveau mot de passe')
                    ->line('Bravo ! Votre mot de passe a été bien réinitialié avec succés. Vous pouvez à nouveau vous reconnecter avec vos identifiants suivants : <br/>
                            <b>Email : </b> '.$userEmail)
                    ->action('Connectez-vous', url('https://xyw'))
                    ->line('Nous vous souhaitons une bonne expérience sur notre application Naafiza.');
    }
}
