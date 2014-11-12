<?php 

session_start();

require "class/baza.php";
require "class/Login.class.php";

if (isset($_POST['email']) && isset($_POST['lozinka'])) {

	$error = Login::logovanje($_POST['email'],$_POST['lozinka'],$conn);
}
	

 ?>
 <!doctype html>
 <html>
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Log-in</title>
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

 	<!-- LOGIN -->
 <div class="container">
 	<?php 
		if (isset($error))
			echo 	"<div class='panel panel-danger'>
						<div class='panel-heading'>Greska!</div>
						<div class='panel-body' >{$error}</div>
					</div>";
	?> 
 <div class="col-lg-4 pull-left"></div>
	<div class="col-lg-4" id="login">
		<h4>Login</h4>
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
				<button type="submit" class="btn btn-dange">Uloguj se</button>
			</div>

		</form>
	</div> <!-- END #LOGIN -->
</div>
 </body>
 </html>