<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *
        {
            box-sizing: border-box;
        }
        .container
        {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-auto-rows: 420px;
            grid-gap: 10px;

        }
        .item
        {
            border: 1px solid black;
            background-color: silver;
        }
        .item img
        {
            width:100%;
            height: 250px;
        }
        .item p,.item h1
        {
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php
function test($var){echo "<pre>";die(var_dump($var));}
function test2($var){echo "<pre>";die(print_r($var));}



#test2($_POST);


# подключем БД
$db=new mysqli('localhost','root','','test');

#основной SQL
$query="SELECT * FROM `product` ";


#делаем ф-ю для создания SQL запроса
function updateSQL($sql,$string,$and=true)
{
    if($sql)
    {
        if($and==true) $sql.=" AND ".$string;
        else $sql .= " OR ".$string;
    }
    else $sql=$string;
    return $sql;
}

# валидация полученных данных
$sql='';
if(@$_POST['min_price'])$sql=updateSQL($sql,'price >= '.$_POST['min_price']);
if(@$_POST['max_price'])$sql=updateSQL($sql,'price <='.$_POST['max_price']);
if(@$_POST['firmList'])
{
    $unitedQuery=implode(',',$_POST['firmList']);
    $sql=updateSQL($sql,'dealer_id IN ( '.$unitedQuery." )");
}

#теперь запрос корректен
$query=(!empty($sql))?$query." WHERE ".$sql : $query;
#test($query);
$res=$db->query($query)->fetch_all(MYSQLI_ASSOC);

?>

<form  method="POST">
    <input type="text" name="min_price" >
    <input type="text" name="max_price" ><br>
    1<input type="checkbox" name="firmList[]" value="1"> &nbsp;&nbsp;
    2<input type="checkbox" name="firmList[]" value="2">&nbsp;&nbsp;
    3<input type="checkbox" name="firmList[]" value="3">&nbsp;&nbsp; <br>
    4<input type="checkbox" name="firmList[]" value="4">&nbsp;&nbsp;
    5<input type="checkbox" name="firmList[]" value="5">&nbsp;&nbsp;
    6<input type="checkbox" name="firmList[]" value="6">&nbsp;&nbsp;<br>
    7<input type="checkbox" name="firmList[]" value="7">&nbsp;&nbsp; <br>
    <input type="submit">
</form>


<div class="container">
<?php foreach ($res as $item): ?>
<div class="item">
    <h1> <?=$item['name']?></h1>
    <img src="../<?=$item['img_src']?>" alt="">
    <p><?=$item['description']?></p>
    <p><?=$item['price']?></p>
    <p><?=$item['dealer_id']?></p>
</div>

<?php endforeach; ?>
</div>
</body>
</html>