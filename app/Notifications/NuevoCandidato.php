<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    public $id_vacante;
    public $nombre_vacante;
    public $usuario_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // Tomara un Id de vacante
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        // Aqui pasaos la informacion que 
        // quiero que tenga esta notificacion una vez instanciada
        $this->id_vacante       = $id_vacante;
        $this->nombre_vacante   = $nombre_vacante;
        $this->usuario_id       = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // Tambien podemos poner las notificaciones en una db,
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = url('candidatos/' . $this->id_vacante);
        $url = url('/notificaciones');
        // Informacion enviada a un email
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es '. $this->nombre_vacante)
                    ->action('ver Notificaciones', $url)
                    ->line('Gracias por utilizar TeckJobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //Almacena en un arreglo diferente informacionpara la notificacion
        return [
        ];
    }

    public function toDatabase($notifiable) {
        // Almacena las notificaciones en la DB con comandos
        // sail artisan notifications:table | sail artisan migrate
        return [
            'id_vacante'        => $this->id_vacante,
            'nombre_vacante'    => $this->nombre_vacante,
            'usuario_id'        => $this->usuario_id,
        ];
    }
}
