<?php/** * Основной шаблон * =============== * $title - заголовок сраницы * $content - HTML страницы */?><!DOCTYPE html><html><head>	<title><?=$title?></title>	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	</head><body>	<div id="header">		<h1><?=$title?></h1>	</div>		<div id="menu">		<a href="index.php">Читать текст</a> |        <?php        if ($user) {            echo '<a href="index.php?c=user&act=info">Личный кабинет</a> |		<a href="index.php?c=page&act=edit">Редактировать текст</a> | <a href="index.php?c=user&act=logout">Выйти('. $user .')</a>';        } else {            echo '<a href="index.php?c=user&act=login">Войти</a> | <a href="index.php?c=user&act=reg">Регистрация</a>';        }        ?>	</div>		<div id="content">		<?=$content?>	</div>		<div id="footer">		Все права защищены. Адрес. Телефон.	</div></body></html>