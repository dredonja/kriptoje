<div class="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="services-title">
						<h1>Zaštitite Vaše poruke</h1>
						<br><br>
						<p>Izaberite jedan od ključeva </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="services-features">
					<div class="services-features-col col-md-4">
						<a href="model1.php"><img src="img/1.png" alt=""></a>
						<h3>M1</h3>
						<p>Ovaj ključ Vam omogućuje da vršite kriptovanje prema vec utvrđenom "rečniku", pretvarajući vašu poruku u nešto što ni sam Bog ne bi umeo da skonta.</p>
					</div><!-- End .col-md-4 -->

					<div class="services-features-col col-md-4">
						<a href="model2.php"><img src="img/2.png" alt=""></a>
						<h3>M2</h3>
						<p>Ovaj ključ Vam omogućuje da vršite kriptovanje prema vec utvrđenom "rečniku", pretvarajući vašu poruku u nešto još manje očigledno nego sto je ključ M1. U svakom slučaju, Bože me sačuvaj.</p>
					</div>

					<div class="services-features-col col-md-4">
						<a href="<?php if (isset ($_SESSION['ulogovan'])) echo 'nalog.php'; else echo'login.php';?>"><img src="img/3.png" alt=""></a>
						<h3>Premium</h3>
						<p>Kriptografi, neka vam je Bog u pomoći. Sa ovim ključem vršite kriptovanje tako da svaku Vašu poruku pretvara u kombinaciju od 40 slova i brojeva. Za njegovo korišćenje potrebna je <a href="<?php if (isset ($_SESSION['ulogovan'])) echo '#'; else echo'registracija.php';?>">registracija</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>