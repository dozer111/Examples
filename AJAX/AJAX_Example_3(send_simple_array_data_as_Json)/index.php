<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<h1>Получить щепотку данных о юзерах</h1><button id='addRequest'>Запрос</button>
	<div id="result"></div>




	<script> 
		$(function(){
			$('#addRequest').on('click',function(){
				$.ajax({
					url:'index2.php',
					dataType:'json',
					success:function(data)
					{
						$('#result').html('<table border="2" style="font-size:32px"><tr><td>Name</td><td>Sorname</td><td>Age</td></tr><tr><td>'+data.name+'</td><td>'+data.sorname+'</td><td>'+data.age+'</td></tr></table>');
					}
				});
			});
		});
	</script>
	

</body>
</html>