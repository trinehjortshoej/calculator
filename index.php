<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lommeregner</title>
	<link rel="stylesheet" href="lommeregner.css">
</head>

<body>
	
	<div id="lommeregner">
	<h1>Lommeregner</h1>
	
	<!-- Specifikationer:
		Felt 1 = indtast tal
		Felt 2 = knapper med operator
		Felt 3 = indtast tal
		Felt 4 = resultat (ikke skrivbartfelt) -->
	
	<!--Form med input felter og knapper. Form sender til sig selv-->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
		
		<input class="input" type="number" name="val1" placeholder="0" value="<?=$v1?>" required><br>
		
		<input class="input" type="number" name="val2" placeholder="0" value="<?=$v2?>" required> <br><br>
		
		<button class="button" type="submit" name="operator" value="add">+</button>
		<button class="button" type="submit" name="operator" value="sub">-</button>
		<button class="button" type="submit" name="operator" value="mul">*</button>
		<button class="button" type="submit" name="operator" value="div">/</button>
		<button class="button" type="submit" name="operator" value="mod">%</button><br><br>
	</form>
	
	<?php
	
	//Angiver at det indtastede bliver en værdi
	//$v1 = $_GET['val1'];
	//$v2 = $_GET['val2'];
	
	//Angiver at det indtastede bliver en værdi og validerer for om det er et tal, eller ugyldigt
	$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('Tast to tal og vælg en af de givne muligheder');
	$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('Tast to tal og vælg en af de givne muligheder');
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
				  $res = 'Prøv lommeregneren med en af de givne muligheder'; 
				break;
		  }
	//resultat af indtastning udskrives
	echo $v1.' '.$opchar.' '.$v2.' = '.$res;
		  ?>
	</div>	
</body>
</html>