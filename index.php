<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lommeregner</title>
</head>

<body>
	
	<h1>Lommeregner</h1>
	
	<!-- Specifikationer:
		Felt 1 = indtast tal
		Felt 2 = knapper med operator
		Felt 3 = indtast tal
		Felt 4 = Knap beregn
		Felt 5 = resultat (ikke skrivbartfelt) -->
	
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
		<input type="number" name="val1" required ><br>
		<input type="number" name="val2" required ><br><br>
		<button type="submit" name="operator" value="add">+</button>
		<button type="submit" name="operator" value="sub">-</button>
		<button type="submit" name="operator" value="mul">*</button><button type="submit" name="operator" value="div">/</button><br><br>
	</form>
	
	<?php
	//$v1 = $_GET['val1'];
	//$v2 = $_GET['val2'];
	$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('missing or illegal val1 parameter');
	$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('missing or illegal val2 parameter');
	$op = $_GET['operator'];
		  
		  echo 'Resultatet er: ';
	
		  switch($op){
			 case 'add':
				  $res = $v1+$v2;
				  break;
			case 'sub':
				  $res = $v1-$v2;
				  break;
			case 'mul':
				  $res = $v1*$v2;
				  break;
			case 'div':
				  $res = $v1/$v2;
				  break;
			  default:
				  $res = 'Unknown operator "'.$op.'"';
		  }
		  
		  echo $v1.' '.$op.' '.$v2.' = '.$res;
	?>
</body>
</html>