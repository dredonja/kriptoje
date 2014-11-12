<?php 

/**
 * Model_1
 *
 * Ova klasa sadrzi metode za jednostavno kriptovanje i dekriptovanje teksta,
 * koje pronalazenjem vrednosti svakog unetog karaktera u vec
 * definisanom "recniku" vrse kripciju/dekripciju i vracaju rezultat u vidu stringa.
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */

class Model_1 {

/**
 * Oslobadja tekst eventualnih nepotrebnih "space"-ova
 * zatim tekst provodi kroz niz $promena koji svim karakterima
 * koji su pisani cirilicom ili latinicom daje nove vrednosti.
 * 
 * Nakon toga se karakteri menjaju sa svojim vrednostima u nizu $recnik,
 * niz se prevodi u string i salje ga na izlaz.
 *
 * @param string $tekst tekst koji se kriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena asocijativni niz po principu cirilicni/latinicni karakter => nova vrednost
 * @return string $prevod kriptovani tekst
 */
	public static function tekst_u_kod1($tekst, $recnik, $promena)
	{
		$data = trim(strtr($tekst, $promena));
		$dataArr = str_split($data);

		foreach($dataArr as $slovo) {
			$prevod[] = $recnik[$slovo];
		}

		return $prevod = implode($prevod);
	}

/**
 * Kriptovani tekst prevodi u niz koristeci delimiter '/'
 * zatim trazi vrednost svake grupe karaktera u $recnik.
 * Dobijeni niz se prevodi u string.
 * 
 * Nakon toga se karakteri menjaju sa svojim vrednostima u nizu $promena_rev,
 * na kraju se ceo string izbacuje na izlaz.
 *
 * @param string $kod1 tekst koji se dekriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena_rev asocijativni niz $promena kome su kljucevi i vrednosti zamenili mesta
 * @return string $prevod dekriptovani tekst
 */
	public static function kod_u_tekst1($kod1, $recnik, $promena_rev)
	{
		$dataArr = explode('/', $kod1);

		foreach ($dataArr as $kod) {
			$prevod[] = array_search('/'.$kod, $recnik);
		}

		$prevod = implode($prevod);

		return $prevod = strtr($prevod, $promena_rev);
	}

}

 ?>