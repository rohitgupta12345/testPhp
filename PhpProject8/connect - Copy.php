<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$link = mysql_connect($hostname,$username, $password);
mysql_select_db('element', $link);
?>