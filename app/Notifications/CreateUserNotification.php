<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\CreateUserNotification;

class CreateUserNotification extends Notification
{
    use Queueable;
    public $noHashUserpassword;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($noHashUserpassword, $user)
    {
        $this->noHashUserpassword = $noHashUserpassword;
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

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('[NAAFIZA] - Création de votre compte')
                    ->view('emails.custom_notification', [
                        'content' => 'Bienvenue à Naafiza, nous avons bien reçu votre insciption. 
                        Votre compte est en cours de la validation sous paiement de vos droit d\'inscription qui s\'éléve au montant de : 200000 fr 
                        Vous pouvez clique sur le bouton suivant pour payer',
                        'actionUrl' => url('/'), // Lien du bouton d'action
                        'actionText' => 'Payer ici'
                    ]);
    }
    
    

}
