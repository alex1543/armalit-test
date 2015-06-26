<?php
////////////////////////////////////
///// основной класс

include "files.php";			
include "db.php";
class Main extends LibUP {

private $pdo;
	
function __construct() {
	// подключаемся к базе данных, согласно настройкам в Defines.php
	$this->pdo = $this->NewOpenBaseDataMySQL($this->pdo);
}

function __destruct() {
	unset($this->pdo);
}

//  основной метод для формирования таблицы
function ViewTable(){

	$fileOperation = new Files;
	$dir = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];	
	$odir = opendir($dir);
	 
	while (($file = readdir($odir)) !== FALSE)
	{
	   if ($file != '.' && $file != '..' && !is_dir($file))
	   {
			echo "<tr>";
	
			echo '<td>'.$dir.'</td>';
			echo '<td>'.$file.'</td>';
			echo '<td>'.$fileOperation->GetNameClasses($dir.$file).'</td>';
			echo '<td>'.$fileOperation->GetNameFunction($dir.$file).'</td>';
			echo '<td>'.$fileOperation->GetNameParams($dir.$file).'</td>';
			
			echo "</tr>";
	   }
	}
	 
	closedir($odir);
	
}


}

///////////////////////////////////////////////////
////  основной блок
	include "html.php";
	$HTML->Header();

	$MyIndex = new Main;
	$HTML->TableBegin();
	$MyIndex->ViewTable();
	$HTML->TableEnd();
	
	$HTML->Footer(1);
?>