<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculator</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>

	#calculator_box {
		display: flex;
		justify-content: center;

		width: 1em;
	}

</style>
</head>

<body>
<div class="container">

	<div class="jumbotron">
		<h1 class="display-4 col-md">Mini PHP calculator</h1>
	</div>

	<div class="row">
		<div class="col-md alert alert-secondary" id="calculator_box">

	<!-- Assignment specifications:
		Input 1 = write number
		Input 2 = operator buttons
		Input 3 = write number
		Input 4 = result -->

	<!--Form with input and buttons. Form sends to itself -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">

		<input class="form-control" type="number" name="val1" placeholder="0" value="<?=$_GET['val1']??''?>" required><br>

		<input class="form-control" type="number" name="val2" placeholder="0" value="<?=$_GET['val2']??''?>" required> <br><br>

		<button class="btn" type="submit" name="operator" value="add">+</button>
		<button class="btn" type="submit" name="operator" value="sub">-</button>
		<button class="btn" type="submit" name="operator" value="mul">*</button>
		<button class="btn" type="submit" name="operator" value="div">/</button>
		<button class="btn" type="submit" name="operator" value="mod">%</button><br><br>
	</form>

</div>
	<?php

	//Value
	//$v1 = $_GET['val1'];
	//$v2 = $_GET['val2'];

	$op = $_GET['operator'];

	if(isset($op)) {

	//Value and validate, or die(unknown command)
	$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('Write two numbers and choose an operator option');
	$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('Write two numbers and choose an operator option');



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
				  $res = $v1 % $v2;
				  $opchar = '%';
				  break;
			  default:
				  $res = 'Try the calculator with a valid operator';
				break;
		  }
 ?>

 </div>

 <div class="row">
 		<div class="col-md alert alert-primary">
<?php
	//Result of numbers in input
	echo 'The result of '.$v1.' '.$opchar.' '.$v2.' = '.$res;
		}
		  ?>
			</div>
			</div>

		</div>

</body>
</html>
