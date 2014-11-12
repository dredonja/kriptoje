<?php

/**
 * Login
 *
 * Ova klasa sadrzi metodu za proveru podataka
 * i omogucavanja logovanja na korisnicki nalog
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */

class Login {

/**
 * Pruza validaciju unetih parametara i omogucava logovanje na korisnicki nalog
 *
 * @param string $email uneti email
 * @param string $lozinka uneta lozinka
 * @param connection $conn konekcija sa bazom
 * @return string $error greska
 */

	public static function logovanje($email, $lozinka, $conn)
	{
			if (isset($email) && isset($lozinka)) {

			$stmt = $conn->prepare(" SELECT * FROM korisnici WHERE korisnici_email= :email AND korisnici_lozinka= :lozinka LIMIT 1 ");
			$stmt->execute( array('email' => $email, 'lozinka' => strtoupper("*@#".md5($lozinka) ) ) );

			if ( $stmt->rowCount() == 0 )

				$error =  "Pogresan e-mail ili lozinka";

			while ( $row = $stmt->fetch() ) {

				if (isset($row['korisnici_email']) == $email && isset($row['korisnici_lozinka']) == $lozinka)
					$_SESSION['ulogovan'] = 1;
					header("Location: nalog.php");

			} 
		}

		return $error;
	}
}