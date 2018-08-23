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
		Felt 4 = resultat (ikke skrivbartfelt) -->
	
	<?php
	
	//$v1 = $_GET['val1'];
	//$v2 = $_GET['val2'];
	$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('missing or illegal val1 parameter');
	$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('missing or illegal val2 parameter');
	$op = $_GET['operator'];
		  
		  
	
		  switch($op){
			 case 'add':
				  $res = $v1+$v2;
				  $opchar = '+';
				  break;
			case 'sub':
				  $res = $v1-$v2;
				  $opchar = '-';
				  break;
			case 'mul':
				  $res = $v1*$v2;
				  $opchar = '*';
				  break;
			case 'div':
				  $res = $v1/$v2;
				  $opchar = '/';
				  break;
			case 'mod':
				  $res = $v1 % $v2 == 0;
				  $opchar = '%';
				  break;
			  default:
				  $res = 'Unknown operator "'.$op.'"';
		  }
		  
		  
	?>
	
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
		<input type="number" name="val1" value="<?=$v1?>" required ><br>
		<input type="number" name="val2" value="<?=$v1?>"2required ><br><br>
		
		<button type="submit" name="operator" value="add">+</button>
		<button type="submit" name="operator" value="sub">-</button>
		<button type="submit" name="operator" value="mul">*</button><button type="submit" name="operator" value="div">/</button>
		<button type="submit" name="operator" value="mod">mod</button><br><br>
	</form>
	
	<?php
	echo 'Resultatet er: ';
	echo $v1.' '.$opchar.' '.$v2.' = '.$res;
		  ?>

</body>
</html>