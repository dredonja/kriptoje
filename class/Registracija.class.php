<?php 

/**
 * Registracija
 *
 * Ova klasa sadrzi metodu za validaciju parametara
 * pri registrovanju novih korisnika i upisivanje 
 * novih korisnika u bazu
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */


class Registracija {

/**
 * Pruza validaciju unetih parametara i upisivanje u bazu
 *
 * @param string $email uneti email
 * @param string $lozinka uneta lozinka
 * @param string $relozinka ponovljena lozinka
 * @param connection $conn konekcija sa bazom
 * @return array ($error, $success) greska i obavestenje o uspesnom registrovanju(upisivanju u bazu)
 */

	public static function regovanje($email, $lozinka, $relozinka, $conn)
	{	
		$error = '';
		$success = '';

			$email = trim(strip_tags(html_entity_decode($email)));
			$lozinka = trim(strip_tags(html_entity_decode($lozinka)));
			$relozinka = trim(strip_tags(html_entity_decode($relozinka)));

			$check = $conn->prepare(" SELECT * FROM korisnici WHERE korisnici_email= :email LIMIT 1 ");
			$check->execute( array( 'email' => $email ) );

			if ( $check->rowCount() == 1 )

				$error = "Nalog sa ovim e-mailom vec postoji";

			else if (isset($email) && empty($email) ||
				 	 isset($lozinka) && empty($lozinka) ||
				 	 isset($relozinka) && empty($relozinka))
					
				$error = "Morate popuniti sva polja! ";

			else if (!empty($email) && preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^", $email) == false )
				
				$error = "Niste uneli ispravan e-mail ";

			else if (!empty($lozinka) && strlen($lozinka) < 6)

				$error = "Lozinka mora biti bar 6 karaktera dugacka! ";
				
			else if (!empty($lozinka) && !empty($relozinka) && $lozinka !== $relozinka )
					
				$error = "Lozinke moraju biti iste! ";

			else if (isset($email) && !empty($email) && 
				preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^", $email) == true &&
				isset($lozinka) && !empty($lozinka) &&
				isset($relozinka) && !empty($relozinka)) {

				$stmt = $conn->prepare(" INSERT INTO korisnici VALUES('', :email, :lozinka ) ");

				if ($lozinka === $relozinka) {

					$stmt->execute( array('email' => $email, 'lozinka' => strtoupper("*@#".md5($lozinka) ) ) );
				 	$success = "Uspesno ste se registrovali!";
				}	
			} 
		

		return array($error, $success);
	}
}

 ?>