<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 05/05/2018
 * Time: 17:47
 */

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreated extends Notification


{
	private $token;

	public function __construct($token)
	{
		$this->token = $token;
	}

	public function via($notifiable)
	{
		return ['mail'];
	}

	public function toMail($notifiable)
	{
		$appName = config('app.name');
		return (new MailMessage)
			->subject("Sua conta no $appName foi criada")
			->greeting("Olá {$notifiable->name}, seja bem-vindo ao $appName")
			->line("Seu número de matrícula é {$notifiable->enrolment}")
			->action('Clique aqui para definir sua senha', route('password.reset', $this->token))
			->line('Obrigado por usar nosso sistema!')
			->salutation('');
	}
}