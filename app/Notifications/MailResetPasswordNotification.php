<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordNotification extends Notification {
    use Queueable;

    protected $pageUrl;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     */
    public function __construct( string $token ) {
        $this->pageUrl = config( 'mail.resetPassword.confirmationUrl' );
        $this->token   = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via( $notifiable ) {
        return [ 'mail' ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable ): MailMessage {
        return ( new MailMessage )
            ->line( 'Reset password.' )
            ->action( 'Reset Password', $this->pageUrl . "?token=" . $this->token )
            ->line( 'If you did not request a password reset, no further action is required.' );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray( $notifiable ): array {
        return [
            //
        ];
    }
}
