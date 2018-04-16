<?php

if(isset($_GET['id']) && $_GET['id'] == 100) {
    $prd_name = "Sample Product";
	$price = 10;
}
else {
	echo "Invalid Value";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Payment Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1><a href="index.php">Payment Demo</a></h1>
				<p class="lead">Written in PHP</p>
			</div>
			<p>
				<b>Product name : </b> <?php echo $prd_name; ?>
			</p>
			<p>
				<b>Price : </b> <?php echo $price; ?>
			</p>
			<h3>Details : </h3>
			<hr>
			<form action="pay.php" method="POST" accept-charset="utf-8">
				<input type="hidden" name="product_name" value="<?php echo $prd_name; ?>">
				<input type="hidden" name="product_price" value="<?php echo $price; ?>">
			<div class="form-group">
				<label>Your Name : </label>
				<input type="text" class="form-control" name="name" placeholder="Enter your name">	 <br/>
			</div>
			<div class="form-group">
				<label>Your Phone : </label>
				<input type="text" class="form-control" name="phone" placeholder="Enter your phone number"> <br/>
			</div>
			<div class="form-group">
				<label>Your Email : </label>
				<input type="email" class="form-control" name="email" placeholder="Enter you email"> <br/>
			</div>
			    <input type="submit" class="btn btn-success btn-lg" value="Click here to Pay Rs : <?php echo $price; ?> ">
			</form>
			<br/>
			<br/>
		</div>
	</body>
</html>
