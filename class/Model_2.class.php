<?php 

require 'Model_1.class.php';

/**
 * Model_2
 *
 * Ova klasa sadrzi metode za jednostavno kriptovanje i dekriptovanje teksta,
 * koje pronalazenjem vrednosti svakog unetog karaktera u vec
 * definisanom "recniku" vrse kripciju/dekripciju i vracaju rezultat u vidu stringa.
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */

class Model_2 extends Model_1 {

/**
 * Generise slucajni karakter iz niza
 *
 * @param array $delimiter niz sa karakterima
 * @return string $spc slucajno izabrani karakter
 */	
	public static function delimiter($delimiter)
	{
		$spc_gen = rand(0,count($delimiter)-1);

		for ($i=0; $i <count($delimiter) ; $i++) {
			switch ($spc_gen) {
				case $i:
					$spc = $delimiter[$i];
					break;
				}
			}

		return $spc;	
	}

/**
 * Svakoj vrednosti iz $recnik dodaje slucajno izabrani karakter,
 * zatim se kripcija nastavlja metodom tekst_u_kod1() iz class Model_1 
 *
 * @param string $tekst tekst koji se kriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena asocijativni niz po principu cirilicni/latinicni karakter => nova vrednost
 * @param string $spc slucajno izabrani karakter koji predstavlja jedan od delimitera
 * @return string $prevod kriptovani tekst
 */
	public static function tekst_u_kod2($tekst, $recnik, $promena, $spc)
	{	
		foreach ($recnik as $key => $value) {
			$recnik_spc[$key] = $spc.$value;
		}

		return $prevod = self::tekst_u_kod1($tekst, $recnik_spc, $promena);
	}

/**
 * Dekriptovani tekst se prevodi u niz, a prvi clan predstavlja
 * delimiter po kome se kriptovani tekst prevodi u niz, zatim se
 * svakom setu kriptovanih karaktera trazi vrednost u $recnik_mark
 * sto predstavlja modifikovan $recnik tako da je na svaki $value
 * dodat $spc. Dobijeni niz se prevodi u string.
 *
 * Nakon toga se karakteri menjaju sa svojim vrednostima u nizu $promena_rev,
 * na kraju se ceo string izbacuje na izlaz. 
 *
 * @param string $kod2 tekst koji se kriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena_rev asocijativni niz $promena kome su kljucevi i vrednosti zamenili mesta
 * @return string $prevod dekriptovani tekst
 */
	public static function kod_u_tekst2($kod2, $recnik, $promena_rev)
	{
		$nesto = str_split($kod2);
		$mark = $nesto[0];
		$dataArr = explode($mark, $kod2);

		foreach ($recnik as $key => $value) {
			$recnik_mark[$key] = $mark.$value;
		}

		foreach ($dataArr as $kod) {
			$prevod[] = array_search($mark.$kod, $recnik_mark);
		}

		$prevod = implode($prevod);

		return $prevod = strtr($prevod,$promena_rev);
	}
}

 ?>