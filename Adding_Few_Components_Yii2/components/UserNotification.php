<?php
namespace app\components;

/**
|===========================================================|
|  Компонент для отправки пользователям 					|
|  уведомлений по email      								|
|===========================================================|
*/
interface UserNotification 
{
	public function getEmail();
	public function getId();


}












?>