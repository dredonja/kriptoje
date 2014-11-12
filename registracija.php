<?php 

require "class/baza.php";
require "class/Registracija.class.php";

if (isset($_POST['email']) || isset($_POST['lozinka']) || isset($_POST['relozinka']))
$rez = Registracija::regovanje($_POST['email'], $_POST['lozinka'], $_POST['relozinka'], $conn);

 ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Registracija</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- The Famous html Shiv or Shim -->
	<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<header>
	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="Logo of Tree House"></a>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<?php 
		if (isset($rez[0]) && !empty($rez[0]))
			echo 	"<div class='panel panel-danger'>
						<div class='panel-heading'>Greska!</div>
						<div class='panel-body' >{$rez[0]}</div>
					</div>";

		if (isset($rez[1]) && !empty($rez[1]))
		 	echo 	"<div class='panel panel-success'>
						<div class='panel-heading'>Uspeh!</div>
						<div class='panel-body' >{$rez[1]} Sada mozete da se <a href='login.php'>ulogujete</a> na svoj nalog</div>
					</div>";

	?> 
		<!-- REGISTRACIJA -->
 <div class="col-lg-4 pull-left"></div>
	<div class="col-lg-4" id="registracija">
		<h4>Registracija</h4>
		<form role="form" action="" method="POST">

			<div class="form-group">
		    	<label for="email"></label>
		    	<input type="text" class="form-control" id="email" name="email" placeholder="e-mail">
			</div>

		  	<div class="form-group">
		    	<label for="lozinka"></label>
		    	<input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="lozinka">
		  	</div>

		  	<div class="form-group">
		    	<label for="lozinka"></label>
		    	<input type="password" class="form-control" id="relozinka" name="relozinka" placeholder="re-lozinka">
		  	</div>

		 	<div class="form-group">
		  		<button type="submit" class="btn btn-dange">Registruj se</button>
		 	</div>

		</form>
	</div> <!-- END #REGISTRACIJA -->
</div> <!-- END .CONTAINER -->
</body>
</html>