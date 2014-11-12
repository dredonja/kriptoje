<?php 
session_start();

require_once 'class/Model_2.class.php';
require_once 'class/Validator_dekriptor.class.php';
require_once 'recnik/recnik.php';
require_once 'recnik/recnik2.php';
require_once 'recnik/promena.php';

if (isset($_POST['kod']) && !empty($_POST['kod'])) {

	$prevod	= Validator_dekriptor::validate_decript($_POST['kod'], $recnik, $recnik2, $promena_rev);
}



 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Dekriptovanje</title>
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
				
				<?php 

				if (isset($_POST['kod']) && !empty($_POST['kod']) && !empty($prevod[0])) 
					echo "<div class='panel panel-danger'>
							<div class='panel-heading'>Greška!</div>
							<div class='panel-body' >{$prevod[0]}</div>
						  </div>";
				?> 

				<form action="" method="POST" role="form">
						<textarea name="kod" 
						id="" cols="" 
						class="form-control" 
						rows="19" placeholder="Upiši tekst koji zeliš da dekriptuješ"><?php if (isset($_POST['kod']) && !empty($_POST['kod'])) echo $prevod[1]; ?></textarea>
							<br>
						<button type="submit" class="btn">Dekriptuj</button>
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

