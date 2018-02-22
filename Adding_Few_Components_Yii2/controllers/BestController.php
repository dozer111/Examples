<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\Article;

class BestController extends Controller
{
	public function actionIndex()
	{
		echo "<h1>This is test controllerMap";
	}
	
	public function actionTest()
	{
		$notification=Yii::$app->notify;

		$user=User::findByUsername('demo');
		$notification->send($user,'test subject','some test text in letter');
		return $this->redirect('/');
	}


	public function actionA()
	{
		$model=new Article();
		$res=$model->find()->asArray()->limit(20)->all();
		#echo "<pre>";
		#print_r($res);
		$obj=Yii::$app->shortText;
		foreach($res as $post)
		{
			echo $obj->doShortText($post['text'],5)."<br>";
		}
	}






}



?>


