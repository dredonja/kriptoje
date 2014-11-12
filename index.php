<?php 
session_start();

if (isset($_GET['logout'])) {
	unset($_SESSION['ulogovan']);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Kriptoje</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- The Famous html Shiv or Shim -->
	<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>

	<?php include "include/header.php"; ?>

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="img/Kriptoje.PNG" alt="kriptoje">
					<br><br>
					<h2>"Kao mali puno sam jeo Lorem Ipsum i postao sam jak..."</h2>
				</div>
			</div>
		</div>
	</div>

	<?php include "include/servisi.php"; ?>
	
<footer>
	<p class="text-muted text-center">
		<small> copyright &copy; 2014</small>
	</p>
</footer>

	<!-- jQuery Script -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 

	<!-- Bootatrap Javascript -->
	<script src="js/bootstrap.min.js"></script>
</body>

