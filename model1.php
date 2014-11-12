<?php 

require_once 'recnik/recnik.php';
require_once 'recnik/promena.php';
require_once 'class/Model_1.class.php';

if (isset($_POST['tekst'])) {
	$prevod = Model_1::tekst_u_kod1($_POST['tekst'], $recnik, $promena);
} 

 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>M1</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- The Famous html Shiv or Shim -->
	<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>

	<?php include 'include/header.php'; ?>

	
		<div class="container">
			<div class="row">
				<div class="col-md-12">

				<form action="" method="POST" role="form">
						<textarea name="tekst" 
						id="" cols="" 
						class="form-control" 
						rows="19" placeholder="Upiši tekst koji zeliš da kriptuješ"><?php if (isset($_POST['tekst']) && !empty($_POST['tekst'])) echo $prevod; ?></textarea>
							<br>
						<button type="submit" class="btn">Kriptuj</button>

					</form>

				</div>
			</div>
		</div>


	<?php include 'include/servisi.php'; ?>
	
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

