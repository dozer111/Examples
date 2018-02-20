<?php
$db=new mysqli('localhost','root','','test');
$query="SELECT * FROM `product` ORDER BY id DESC";
$res=$db->query($query)->fetch_all(MYSQLI_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
<style>
    *{
        box-sizing: border-box;
    }
.container,.container2
{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-auto-rows: 375px;
    grid-gap: 10px;
}
    .item,.item2 {
        border: 1px solid black;
        background-color: darkgoldenrod;
    }
    .item2
    {
        background-color: black;
        color: white;
    }

img
{
    width: 100%;
    height: 40%;
}

</style>
<div id="res1"></div>
<form action="index2.php" method="POST">
    Min:<input type="text" name="min_price" id="min_price"> &nbsp;&nbsp;&nbsp;
    Max:<input type="text" name="max_price" id="max_price"><br>
    <input type="checkbox" name="category[]" class="checkbox" value="1" >
    <input type="checkbox" name="category[]" class="checkbox" value="2" >
    <input type="checkbox" name="category[]" class="checkbox" value="3" >
    <input type="checkbox" name="category[]" class="checkbox" value="4" >
    <input type="checkbox" name="category[]" class="checkbox" value="5" >
    <input type="checkbox" name="category[]" class="checkbox" value="6" >
    <input type="checkbox" name="category[]" class="checkbox" value="7" >

</form>
<button id="check">test</button>
<button id="check1">GO</button>

<div class="container">
    <?php foreach ($res as $item): ?>
    <div class="item">
        <h1><?=$item['name']?></h1>
        <img src="../<?=$item['img_src']?>" alt="">
        <p><?=$item['description']?></p>
        <p><?=$item['price']?></p>
        <p><?=$item['dealer_id']?></p>
    </div>


    <?php endforeach; ?>    <script>
        var filterArray={};
        // взяли минимум
        $('#min_price').on('change',function () {
            var test=$('#min_price').val();
            filterArray.min_price=test;

        });
        // взяли максимум
        $('#max_price').on('change',function () {
            var test2=$(this).val();
            filterArray.max_price=test2;

        });
        var testArr=[];
        $('.checkbox').on('click',function () {
            testArr.push($(this).val());


        });
        $('#check').on('click',function () {
            filterArray.category=testArr;

        });
        $('#check1').on('click',function () {
           var res=JSON.stringify(filterArray);

            console.log(res);
          $.ajax({
               url:'index2.php',
               type:'POST',
               data:{AJAX:res},
               success:function (data) {
                    $('#res1').text(data);
               }
           });

           //alert(res);
        });


    </script>
<div class="container2">

</div>
</div>
















</body>
</html>