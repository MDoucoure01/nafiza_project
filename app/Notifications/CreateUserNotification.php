<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateUserNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user)
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

    //     $userName = $this->user->firstname.' '.$this->user->lastname;
    //     $userEmail = $this->user->email;
    //     $userPassword = $this->noHashUserpassword;

    //     return (new MailMessage)
    //                 ->subject('[NAAFIZA] - Création de votre compte ')
    //                 ->subject('Ton sujet personnalisé')
    //                 ->line('Bienvenue à Naafiza, nous avons bien reçu votre insciption.')
    //                 ->line('Votre compte est en cours de la validation sous paiement de vos droit d\'inscription qui s\'éléve au montant de : 200000 fr ')
    //                 ->action('Vous pouvez clique ici pour payer', url('https://coaching.bakeli.tech'))
    //                 ->line('Nous vous remercions poour l\'attention portée au programme Naafiza.');
    // }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->subject('[NAAFIZA] - Création de votre compte')
    //                 ->view('emails.custom_notification', [
    //                     'title' => 'Inscription à Naafiza',
    //                     'content' => 'Bienvenue à Naafiza, nous avons bien reçu votre insciption. 
    //                     Votre compte est en cours de la validation sous paiement de vos droit d\'inscription qui s\'éléve au montant de : 200000 fr 
    //                     Vous pouvez clique sur le bouton suivant pour payer',
    //                     'actionUrl' => url('https://pay.wave.com/m/M_QIKlqn4fuMS7/c/sn/?amount=25000'), // Lien du bouton d'action
    //                     'actionText' => 'Payer ici'
    //                 ]);
    // }

    public function toMail($notifiable)

{
    // L'URL à encoder dans le QR code
    $qrCodeUrl = 'https://pay.wave.com/m/M_QIKlqn4fuMS7/c/sn/?amount=25000';

    return (new MailMessage)
                ->subject('[NAAFIZA] - Création de votre compte')
                ->view('emails.custom_notification', [
                    'title' => 'Inscription à Naafiza',
                    'content' => 'Bienvenue à Naafiza, nous avons bien reçu votre inscription. 
                    Votre compte est en cours de validation sous paiement de vos droits d\'inscription qui s\'élèvent au montant de : 200000 fr. 
                    Vous pouvez payer avec un scan de ce qr code.',
                    'actionUrl' => $qrCodeUrl, // Lien du bouton d'action
                    'actionText' => 'Payer ici',
                    'qrCodeUrl' => $qrCodeUrl // URL pour le QR code
                ]);
}



}
