<?php		
////////////////////////////////////
///// класс для работы с файлами

class Files {
	
// получение имени класса с параметром имени файла
function GetNameClasses($fileName) {
	$strReturn = '';
	$f = fopen($fileName, "r");
	while(!feof($f)) { 
		$haystack = fgets($f);
		$needle = 'class ';
		if ((strripos($haystack, $needle) !== false) && (strripos($haystack, '=') === false)) {
			$strCut = substr($haystack, strlen($needle), strlen($haystack));
			$strCut = substr($strCut, 0, strpos($strCut, ' '));
			$strReturn = $strReturn.$strCut.'</br>';
		}
	}

	fclose($f);
	return $strReturn;
}

// получение имени функции
function GetNameFunction($fileName) {
	$strReturn = '';
	$f = fopen($fileName, "r");
	while(!feof($f)) { 
		$haystack = fgets($f);
		$needle = 'function ';
		if ((strripos($haystack, $needle) !== false) && (strripos($haystack, '=') === false)) {
			$strCut = substr($haystack, strlen($needle), strlen($haystack));
			$strCut = substr($strCut, 0, strpos($strCut, '('));
			$strReturn = $strReturn.$strCut.'</br>';
		}
	}

	fclose($f);
	return $strReturn;
} 

// получение параметров
function GetNameParams($fileName) {
	$strReturn = '';
	$f = fopen($fileName, "r");
	while(!feof($f)) { 
		$haystack = fgets($f);
		$needle = 'function ';
		if ((strripos($haystack, $needle) !== false) && (strripos($haystack, '=') === false)) {
			$strCut = substr($haystack, strpos($haystack, '(')+1, strlen($haystack));
			$strCut = substr($strCut, 0, strpos($strCut, ')'));
			$strReturn = $strReturn.$strCut.'</br>';
		}
	}

	fclose($f);
	return $strReturn;
}

}

	
?>