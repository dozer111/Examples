<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	Say hello to admin &nbsp;&nbsp; <button id='say'>Do it</button>
	<div id="request" style="font-size: 40px"></div>
	<script>
		$(function(){
			$('#say').on('click',function(){
				$.ajax({
					url:'index2.php',
					type:'POST',
					data:'AdminName=Jack&AdminSorname=Daniels',
					success:function(data)
					{
						$('#request').text(data);
					}
				});
			});
		});
	</script>
</body>
</html>