<?php		
////////////////////////////////////
///// класс для отображения HTML

class LibHTML {

// формирование заголовка HTML страницы
function Header() {
?>
	<!doctype html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<title>Тестовое задание АО &laquo;Армалит&raquo;</title>
		<meta name="description" content="Тестовое задание АО &laquo;Армалит&raquo;" />
		<meta name="Keywords" content="Тестовое задание АО &laquo;Армалит&raquo;" />
		<meta http-equiv="Cache-Control" content="no-cache" />
		<meta http-equiv="Cache-Control" content="max-age=30, must-revalidate" />
		
		<link rel="stylesheet" href="css/style.css" type="text/css" />

	</head>
	<body>

	<div id="conteiner">
	<div><h3>Тестовое задание АО &laquo;Армалит&raquo;</h3></div>
<?php
}

// формирование "подвала" HTML страницы
function Footer($modeDivCont) {

	// Copyright - по выбору при значении переменной: 1 - показывать и люб. - не показывать
	if ($modeDivCont == 1) {
		?>
		</div>
		<div id="footer">
		Copyright © 2015<br />
		Тестовое задание АО &laquo;Армалит&raquo;.<br />
		All Rights Reserved.
		</div>
		<?php
	}

?>	
	<link rel="stylesheet" href="css/scrollup.css">
	<div id="scrollup">
	<img src="img/up.png" class="up" alt="Прокрутить вверх" />
	<script src="js/scrollup.js"></script>
	</div>
	</body>
	</html>
<?php
}

// формирование "шапки" таблицы
function TableBegin() {
?>
	<h2>ФАЙЛОВАЯ ТАБЛИЦА</h2>
	<table style="width:70%;text-align:left;margin:auto;">
	<tr class='headerTable'><td>Путь к классу</td><td>Имя файла</td><td>Сам класс</td><td>Методы</td><td>Параметры</td></tr>
<?php
}

// формирование окончания таблицы
function TableEnd() {
?>
	</table>
	<p>Для доступа в базу данных, необходимо настроить параметры в defines.php</p>
<?php
}

}
$HTML = new LibHTML;
	
?>