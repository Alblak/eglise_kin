<?php
try {
session_start();	
$connexion=new PDO('mysql:dbname=eglise_kin; host=localhost', 'root', '');
} catch (Exception $e) {
	echo $e;
	
}


?>