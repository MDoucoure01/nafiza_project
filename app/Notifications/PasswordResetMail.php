<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage; 

class PasswordResetMail extends Notification
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
    // public function toMail($notifiable)
    // {
    //     $userID = $this->user->id;
    //     $userToken = $this->user->auth_token;
 
    //     return (new MailMessage)
    //                 ->subject('[NAAFIZA ] - Réinitialiser votre mot de passe')
    //                 ->line('Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.')
    //                 ->action('Modifier votre mot de passe', url('https://xyz/password-reset/'.$userToken))
    //                 ->line('Nous vous souhaitons une bonne expérience sur notre application naafiza.');
    // }
    public function toMail($notifiable)
    {
        $userID = $this->user->id;
        $userToken = $this->user->auth_token;
        return (new MailMessage)
                    ->subject('[NAAFIZA ] - Réinitialiser votre mot de passe')
                    ->view('emails.custom_other_notification', [
                        'title' => 'Réinitialisation mot de passe',
                        'content' => 'Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.',
                        'actionUrl' => url('https://xyz/password-reset/'.$userToken), // Lien du bouton d'action
                        'actionText' => 'Modifier votre mot de passe ici'
                    ]);
    }
 
} 
