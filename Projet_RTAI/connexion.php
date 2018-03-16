<?php
	$server='localhost';
	$login='root';
	$mdp='';
	$db='projet_php_jsp';
   	try {
      $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    }
   	catch (Exception $e) {
      die('Erreur : '. $e->getMessage());
    }
?>
