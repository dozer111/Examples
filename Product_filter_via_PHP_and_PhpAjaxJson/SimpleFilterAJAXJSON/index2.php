<?php

$test=$_POST['AJAX'];

$test1=json_decode($test);
$text='';
$query="SELECT * FROM `product` ORDER BY id DESC WHERE ";
$query=(isset($test1->min_price))?$query." `price`>".$test1->min_price:$query." `price`>0";
$query=(isset($test1->max_price))?$query." AND `price`<".$test1->max_price:$query;

$min_price=(isset($test1->min_price))?$test1->min_price:false;
$max_price=(isset($test1->max_price))?$test1->max_price:false;
$category=[];
if(isset($test1->category))
{
    foreach ($test1->category  as $oneCategory)
    {
        $query.=" OR dealer_id=".$oneCategory.' ';
    }
}
echo $query;
?>
