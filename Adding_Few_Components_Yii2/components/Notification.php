<?php 

namespace app\components;
use yii\base\Component;
use Yii;


class Notification extends Component
{
	const EMAIL_METHOD='email';
	public $method;

	# говорим о том, что метод send будет принимать только ту модель, 
	// которая реализирует интерфейс UserNotification
	public function send(UserNotification $user,$subject,$body)
	{
			if($this->method==self::EMAIL_METHOD)
				{
					Yii::$app->mailer->compose()
					->setTo($user->getEmail())
					->setTextBody($body)
					->setSubject($subject)
					->send();
					
				}
	}



}