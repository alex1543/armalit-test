<?php		
////////////////////////////////////
///// класс для работы с базой данных

include "defines.php";

class LibUP {

// Подключаемся к базе данных.
// Если таблица armalit не создана, то пытаемся создать таблицу с одной записью.
function NewOpenBaseDataMySQL($pdoSet) {

// блок подключения к базе данных
	try {
		$pdoSet = new PDO(DTBASE_TYPE.':host='.DTBASE_SERVER, DTBASE_USER, DTBASE_PASSWORD);	  
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
		return false;
 	}

	$pdoSet->query('SET NAMES utf8;');
// блок инициализации
	$stmt = $pdoSet->query('USE ' . DTBASE_NAME . ';');
	if (!$stmt) {
		$query="CREATE DATABASE IF NOT EXISTS " . DTBASE_NAME . " DEFAULT CHARACTER SET utf8;
				USE " . DTBASE_NAME . ";";
		$pdoSet->query($query);
	}
	$stmt = $pdoSet->query('SELECT * FROM armalit;');
	if ((!$stmt) || ($stmt->rowCount() == 0)) {	
		$query="CREATE TABLE IF NOT EXISTS armalit (id int(5) NOT NULL AUTO_INCREMENT, product VARCHAR(50) NOT NULL, drawing_number_of_product VARCHAR(50) NOT NULL, sheet_number int(5) NOT NULL, node VARCHAR(50) NOT NULL, drawing_number_of_node VARCHAR(50) NOT NULL, sheet_all int(5) NOT NULL, number_node_of_product VARCHAR(50) NOT NULL, data DATE NOT NULL, number_of_product_code VARCHAR(50) NOT NULL, number_of_product VARCHAR(50) NOT NULL, PRIMARY KEY(id));
				INSERT INTO armalit (product, drawing_number_of_product, sheet_number, node, drawing_number_of_node, sheet_all, number_node_of_product, data, number_of_product_code, number_of_product) VALUES ('Кран винтовой', '', '1', 'Шпиндель', '75.10.34.007.034 Сб', '2', '1шт.', '', 'Винт.', '5834');
				";
		$pdoSet->query($query);
	}
	return $pdoSet;
}

}

class DataBaseManager extends LibUP {

public $pdo;
	
function __construct() {
	$this->pdo = $this->NewOpenBaseDataMySQL($this->pdo);
}

function __destruct() {
	unset($this->pdo);
}


function GetPassword($auth_id) {
	$query = "SELECT password FROM auth2 WHERE auth_id='".$auth_id."';";
	@ $stmt = $this->pdo->query($query);
	if ($stmt) {
		$row = $stmt->fetch();
		return $row['password'];
		
	}
}

function GetUser(){
if (isset($_COOKIE["ved_php"])) {
		
	$query = "SELECT * FROM auth2 WHERE auth_id='".$_COOKIE["ved_php"]."';";
	@ $stmt = $this->pdo->query($query);
	if ($stmt) {
		$row = $stmt->fetch();

			$worker_out = $row["first_name"];
			if ($row["last_name"] != '') {
				$worker_out .= " ".substr(trim($row["last_name"]), 0, 2).".";
			}
			if ($row["double_last_name"] != '') {
				$worker_out .= substr(trim($row["double_last_name"]), 0, 2).".";
			}
		return $worker_out;
	}
	
		
}

}


}

$db = new DataBaseManager;

	
?>