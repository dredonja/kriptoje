<?php 

require 'Model_2.class.php';

/**
 * Model_premium
 *
 * Ova klasa sadrzi metode za generisanje hash koda, njegovo implementiranje
 * u vec definisani "recnik", kriptovanje/dekriptovanje teksta na osnovu ovog
 * recnika i smestanje/pozivanje kriptovanih fajlova u/iz odredjene foldere/a.
 * 
 * @author Vladimir Terescenko <vterescenko@gmail.com>
 * @copyright 2014
 * @license http://php.net/license/3_01.txt PHP License 3.01
 */

class Model_premium extends Model_2 {

/**
 * public static variable
 *
 * @var string $folder_keys ime foldera u koji se ubacuju kljucevi za desifrovanje
 */
	public static $folder_keys = 'kljucevi';

/**
 * public static variable
 *
 * @var string $folder_messages ime foldera u koji se ubacuju sifrovane poruke
 */
	public static $folder_messages = 'poruke';

/**
 * public static variable
 *
 * @var int $folder_name_limit broj karaktera u imenu fajlova u folderu za kljuceve
 */
	public static $folder_name_limit = '26';

/**
 * public static variable
 *
 * @var string $extension_keys extenzija fajlova u folderu za kljuceve
 */
	public static $extension_keys = '.kpt';

/**
 * public static variable
 *
 * @var string $extension_messages extenzija fajlova u folderu za poruke
 */
	public static $extension_messages = '.mpt';

/**
 * Generise hash duzine 40 karaktera isecen je tako da vraca samo 4 karaktera
 * ta 4 karaktera dodaje svakom clanu $recnik-a stvarajuci grugaciji recnik 
 * svaki put kada se metoda pozove.
 *
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param string $spc slucajno izabrani karakter koji predstavlja jedan od delimitera
 * @param string $spc2 slucajno izabrani karakter koji predstavlja jedan od delimitera
 * @return array $hash predstavlja recnik na osnovu koga se vrsi kripcija
 */
	public static function hash_generator($recnik, $spc, $spc2)
	{
		$seed = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890~!@#$ %^&*()_+`-=[]\{}|;'':\"\",./<>?";
		
		foreach ($recnik as $key => $value) {
			$hash[$key] = $spc2.$spc.substr(sha1(uniqid($seed.mt_rand(),true)),10,4);
		}

		return $hash;
	}

/**
 * Metodom tekst_u_kod1() iz class Model_1 se vrsi primarna kripcija koja se
 * nastavlja tako sto svakom karakteru iz stringa dobijenom primarnom kripcijom
 * se dodeljuje nova vrednost koristeci "hash recnik".
 * 
 *
 * @param string $tekst tekst koji se kriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param array $promena asocijativni niz po principu cirilicni/latinicni karakter => nova vrednost
 * @param array $hash predstavlja recnik na osnovu koga se vrsi kripcija
 * @return string $hashPrevod kriptovani tekst
 */
	public static function tekst_u_hash_kod($tekst, $recnik, $promena, $hash)
	{
		$prevod = self::tekst_u_kod1($tekst, $recnik, $promena);
		$hashData = str_split($prevod);

		foreach($hashData as $slovo) {
		 	$hashPrevod[] = $hash[$slovo];
		}

		return $hashPrevod = implode($hashPrevod);
	}

/**
 * Dekriptuje tekst kriptovan pomocu "hash recnika", pomazuci se metodama
 * kod_u_tekst1() iz class Model_1 i kod_u_tekst2 iz class Model_2
 *
 * @param string $hash_fajl tekst u kome je smesten recnik na osnovu koga se dekriptuje
 * @param array $recnik asocijativni niz po principu karakter => kriptovana vrednost
 * @param string $kod kriptovani tekst
 * @param array $promena_rev asocijativni niz $promena kome su kljucevi i vrednosti zamenili mesta
 * @return string $nesto dekriptovani tekst
 */
	public static function hash_kod_u_tekst($hash_fajl, $recnik, $kod, $promena_rev)
	{
		$hash_niz = str_split($hash_fajl);
		$delimiter = $hash_niz[0];
		$file_to_niz = explode($delimiter, $hash_fajl);
		$elementi_niza = array_slice($file_to_niz, 1, count($file_to_niz));
		$obrnuti_recnik = array_flip($recnik);
		$recnik_za_defifrovanje = array_combine($obrnuti_recnik,$elementi_niza);
		$prevod = self::kod_u_tekst2($kod, $recnik_za_defifrovanje, $promena_rev);

		return $nesto = self::kod_u_tekst1($prevod, $recnik, $promena_rev);	
	}

/**
 * Na slucajan nacin generise ime fajla duzine $limit karaktera 
 * koristeci karaktere iz niza $file_name_niz
 * 
 * @param array $file_name_niz niz sa karakterima
 * @return string $file_name ime fajla
 */
	public static function file_name_generator($file_name_niz)
	{
		$limit = self::$folder_name_limit;
		shuffle($file_name_niz);

		for ($i = 0; $i < $limit; $i++) {
		    $r[] = $file_name_niz[$i];
		}

		return $file_name = implode($r);
	}

/**
 * Vraca ime fajla u kome se nalazi recnik za desifrovanje
 * koje se nalazi na kraju kriptovanog teksta
 * 
 * @param string $kod kriptovani tekst
 * @param int $limit broj karaktera se odseca sa kraja $kod-a
 * @return string $file_name ime fajla
 */
	public static function get_file_name($kod,$limit)
	{
		$limit = -self::$folder_name_limit;

		return $file_name = substr($kod, $limit);
	}

/**
 * Pravi folder $folder_keys i u njega smesta fajlove sa "recnikom" na osnovu koga se vrsi dekripcija,
 * pravi folder $folder_messages i u njega smesta fajlove sa kriptovanim porukama,
 * dodaje odgovarajuce ekstenzije $extension_keys i $extension_messages.
 *
 * @param string $file_name ime fajla koji se smesta u folder
 * @param array $hash predstavlja recnik na osnovu koga se vrsi kripcija
 * @param string $hashPrevod kriptovani tekst
 */
	public static function put_file_content($file_name, $hash, $hashPrevod)
	{	
		$ext_keys = self::$extension_keys;
		$ext_msg = self::$extension_messages;

		$folder1 = self::$folder_keys;
		$folder2 = self::$folder_messages;

		$sha = sha1($hashPrevod);

		if (!file_exists($folder1) && !file_exists($folder2)) {

			mkdir($folder1);

			file_put_contents("{$folder1}/{$file_name}{$ext_keys}", $hash);
			file_put_contents("{$folder1}/index.html", "");

			mkdir($folder2);

			file_put_contents("{$folder2}/{$sha}{$ext_msg}", $hashPrevod);
			file_put_contents("{$folder2}/index.html", "");

		} else {

			file_put_contents("{$folder1}/{$file_name}{$ext_keys}", $hash);
			file_put_contents("{$folder2}/{$sha}{$ext_msg}", $hashPrevod);
		}
	}

/**
 * Preuzima sadrzaj fajlova odredjenog imena i extenzije.
 *
 * @param string $file_name ime fajla koji se preuzima
 * @param string $folder ime foldera odakle se preuzima fajl
 * @param string $extension ekstenzija fajla koji se preuzima
 * @return string sadrzaj trazenog fajla
 */
	public static function get_file_content($file_name, $folder, $extension)
	{	
		return file_get_contents("{$folder}/{$file_name}{$extension}");
	}

/**
 * Odstranjuje deo stringa koji se nalazi na kraju kriptovanog teksta.
 *
 * @param string $file_name ime fajla koji se preuzima
 * @param string $kod kriptovani tekst sa cijeg kraja se odstranjuje deo teksta
 *
 * @return string cista kriptovana poruka
 */
	// odstranjuje deo stringa koji se nalazi na kraju
	// kriptovane poruke koji predstavlja ime fajla
	// u kome je smesten kljuc za dekriptovanje 
	public static function clear_code($kod, $file_name)
	{
		return chop($kod, $file_name);
	}

}

 ?>