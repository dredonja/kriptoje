
<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle Navigation</span>

								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>

							</button>

							
							<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="Logo of Tree House" ></a>
						</div>

						<div class="navbar-collapse collapse" id="logok">

							<ul class="nav navbar-nav navbar-right">
								<li><a href="dekriptuj.php">Dekriptovanje</a></li>
								<li><?php if (isset ($_SESSION['ulogovan'])) echo ""; else echo "<a href='login.php'>log-in</a>" ;?></li>
								<li><a href="<?php if (isset ($_SESSION['ulogovan'])) echo 'nalog.php'; else echo'registracija.php';?>"><?php if (isset ($_SESSION['ulogovan'])) echo 'moj nalog'; else echo'registracija';?></a></li>
							</ul>

						</div>

					</nav>

				</div>
			</div>
		</div>
	</header>