<!DOCTYPE html>
<html>
<head>
	<title>Hello world</title>

	<script>
		var xmlhttp;
		xmlhttp.onreadystatechange=function()
		  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			  	  document.getElementById("meng").innerHTML=xmlhttp.responseText;
			    }
		  }
			xmlhttp.open("GET","ajax2.php",true);
			xmlhttp.send();		
	</script>
</head>
<body>
<H1>Hello world!</H1>
</body>
</html>