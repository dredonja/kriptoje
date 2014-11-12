<?php 
session_start();

if (!isset($_SESSION['ulogovan']))
	header("Location: index.php");


require_once 'class/Model_premium.class.php';
require_once 'recnik/recnik.php';
require_once 'recnik/promena.php';
require_once 'recnik/delimiter.php';

	$folder_keys = Model_premium::$folder_keys;
	$folder_messages = Model_premium::$folder_messages;
	$ext_keys = Model_premium::$extension_keys;
	$ext_msg = Model_premium::$extension_messages;

/* prevodjenje u teksta u hash */

if (isset($_POST['tekst']) && !empty($_POST['tekst'])) {
	$spc = Model_2::delimiter($delimiter);
	$spc2 = Model_2::delimiter($delimiter2);
	$hash = Model_premium::hash_generator($recnik, $spc, $spc2);
	$file_name = Model_premium::file_name_generator($file_name_niz);
	$hashPrevod = Model_premium::tekst_u_hash_kod($_POST['tekst'], $recnik, $promena, $hash).$file_name;

	Model_premium::put_file_content($file_name, $hash, $hashPrevod);

	$sha1Prevod = sha1($hashPrevod);
} 

/* prevodjenje hasha u tekst */

if (isset($_POST['kod']) && !empty($_POST['kod']) && !file_exists("{$folder_messages}/{$_POST['kod']}{$ext_msg}")) 

	$error_kod = "Uneli ste pogresan kod";

else if (isset($_POST['kod']) && !empty($_POST['kod'])) {
	$kod_get = Model_premium::get_file_content($_POST['kod'], $folder_messages, $ext_msg);
	$file_name = Model_premium::get_file_name($kod_get, $file_name_niz);
	$kod = Model_premium::clear_code($kod_get, $file_name);
	$hash_fajl = Model_premium::get_file_content($file_name, $folder_keys, $ext_keys);
	$nesto = Model_premium::hash_kod_u_tekst($hash_fajl, $recnik, $kod, $promena_rev);
} 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Moj nalog</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
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
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle Navigation</span>
								
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="index.php" class="navbar-brand"><img src="img/logo.png"></a>
						</div>
						<div class="collapse navbar-collapse" id="logok">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="dekriptuj.php">dekriptovanje</a></li>
								<li></li>
								<li><a href="index.php?logout">Log-out</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	
<div class="container">
	<div class="row">
		<div class="col-md-12">
				
<?php 
	if (isset($_POST['kod']) && !empty($_POST['kod']) && !file_exists("{$folder_messages}/{$_POST['kod']}{$ext_msg}")) 
	  echo 	"<div class='panel panel-danger'>
				<div class='panel-heading'>Greška!</div>
					<div class='panel-body' >{$error_kod}</div>
			</div>";
?>

<form action="" method="POST" role="form">
	<textarea name="tekst" id="" cols="" class="form-control" rows="15" placeholder="Upiši tekst koji želiš da kriptuješ"><?php	if(isset($_POST['tekst']) && !empty($_POST['tekst'])) echo $sha1Prevod; ?></textarea>
<br>
	<button type="submit" class="btn">Kriptuj</button>
</form>
<br><br>



<form action="" method="POST" role="form">
	<textarea name="kod" id="" cols="" class="form-control" rows="15" placeholder="Upiši tekst koji želiš da dekriptuješ"><?php	if(isset($_POST['kod']) && !empty($_POST['kod']) && file_exists("{$folder_messages}/{$_POST['kod']}{$ext_msg}")) echo $nesto; ?></textarea>
<br>
	<button type="submit" class="btn">Dekriptuj</button>

</form>
	<br><br>
		</div>
	</div>
</div>


	
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