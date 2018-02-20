<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script> 
	$(function(){
		
		$('#test').on('click',function(){
			$.ajax({
			url:'index2.php',
			success:function(data)
			{
				$('#info').text(data);
			}
		});
		});

		$('#test2').on('click',function(){
			$('#info').text('');
		});
	
	});
</script>
<button id='test'>Check IP</button>
<button id='test2'>Hide IP</button>
<div id="info"></div>




	
</body>
</html>




