<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculator</title>
	<link rel="stylesheet" href="calculator.css">
</head>

<body>
	
	<div id="calculator">
	<h1>Calculator</h1>
	
	<!-- Specifications:
		Input 1 = write number
		Input 2 = operator buttons
		Input 3 = write number
		Input 4 = result -->
	
	<!--Form with input and buttons. Form sends to itself -->
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
	
	//Value
	//$v1 = $_GET['val1'];
	//$v2 = $_GET['val2'];
	
	//Value and validate, or die(unknown command)
	$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('Write two numbers and choose an operator option');
	$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('Write two numbers and choose an operator option');
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
				  $res = 'Try the calculator with a valid operator'; 
				break;
		  }
	//Result of numbers in input
	echo 'The result of '.$v1.' '.$opchar.' '.$v2.' = '.$res;
		  ?>
	</div>	
</body>
</html>