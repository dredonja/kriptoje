<?php 

require_once 'Model_2.class.php';

/**
 * Validator_dekriptor
 *
 * Ova klasa sadrzi metodu za validaciju 
 * i dekriptovanje unetog kriptovanog teksta
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */

class Validator_dekriptor extends Model_2 {

/**
 * Pruza validaciju koda i njegovo dekriptovanje ukoliko je kod prosao validaciju
 * koristi metode kod_u_tekst1() i kod_u_tekst2() iz klasa Model_1 i Model_2
 *
 * @param string $kod kriptovani tekst
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena_rev asocijativni niz $promena kome su kljucevi i vrednosti zamenili mesta
 * @return array ($error, $prevod) greska i dekriptovan tekst
 */
	public static function validate_decript($kod, $recnik, $recnik2, $promena_rev)
	{
		$data = str_split($kod);

		if (strlen($kod) == 1) {

			$error = "Kod nije validan.";
			$prevod = '';
		}

		else if (($data[0] !== '/') && ($data[1] !== '/') && (strlen($kod) == 40)) {
		
			$error = "Morate biti ulogovani da biste preveli ovaj kod.";
			$prevod = '';
		} 

		else if ($data[1] == '/') {
			
			$error = '';
			$prevod = self::kod_u_tekst2($kod, $recnik2, $promena_rev);
		} 

		else if (($data[0] !== '/') && ($data[1] !== '/')) {

			$error =  "Kod nije validan.";
			$prevod = '';
		}

		else if ($data[0] == '/') {
			
			$error = '';
			$prevod = self::kod_u_tekst1($kod, $recnik, $promena_rev);
		} 

		return array($error, $prevod);
	}
}

 ?>