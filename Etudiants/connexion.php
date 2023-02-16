<?php
	
	if(!isset($_SESSION)){
		session_start();
	}
	
	try {

      $bdd = new PDO('mysql:host=localhost;dbname=ges_note', 'root' , '');


    } catch (Exception $e) {

       die('Erreur : '.$e->getMessage());

    }
?>