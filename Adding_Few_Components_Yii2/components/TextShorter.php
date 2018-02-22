<?php 

namespace app\components;
use yii\base\Component;
use Yii;


class TextShorter extends Component
{
	private $limit;

	public function __construct()
	{
		$this->limit=Yii::$app->params['symbolsNumber'];
	}

	public function doShortText($text,$limit=null,$ending='')
	{

		if($limit===null) $limit=$this->limit;
		$resultString=substr($text,0,$limit).$ending;
		return $resultString;
	}








}






?> 