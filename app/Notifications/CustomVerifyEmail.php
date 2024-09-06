<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class CustomVerifyEmail extends Notification
{
    // Define los canales por los que se envía la notificación
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Contenido del correo electrónico
    public function toMail($notifiable)
    {
        // Utiliza la plantilla Markdown para el correo electrónico
        return (new MailMessage)
            ->subject('Verifica tu Dirección de Correo Electrónico')
            ->markdown('emails.verify', ['verificationUrl' => $this->verificationUrl($notifiable)]);
    }
    
    // Genera la URL de verificación con hash del email
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
