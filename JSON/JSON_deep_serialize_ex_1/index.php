<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Особенности сериализации JSON</h1>
	<script>
		
		// обьект без toJSON привязки
		var test={
			name:"Alex",
			sorname:"Khonko",
			email:function()
			{
				alert(this.name+this.sorname+"@gmail.com");
				/*  при 
					return this.name+this.sorname+"@gmail.com";
					всё равно в сериазизации test2
					данное значение не выдастся , только 
					первые 2 
				*/
			}
		};
		var test2={
			user:"test1",
			password:"test password 1",
			login:"test login",
			more:test

		};



	// обьект с toJSON привязкой ---> теперь первые 2 свойства не показываются, показывается только то, что вернет  toJSON
		var test11={
			name:"Alex",
			sorname:"Khonko",
			toJSON:function()
			{
				return this.name+this.sorname+"@gmail.com";

			}
		};
		var test12={
			user:"test1",
			password:"test password 1",
			login:"test login",
			more:test11

		};








		// сериализируем обе строки, паралельно приводим в порядок всё что можно привести
		 var test3=JSON.stringify(test2);
		 var test13=JSON.stringify(test12);
		 alert("Без toJSON привязки "+test3);
		 alert("С toJSON привязкой "+test13);


	</script>
	
</body>
</html>