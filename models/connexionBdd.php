<?php

function connexionBDD(){
	$host = "localhost";
	$db_name = "vosrecettes";
	$username = "root";
	$password = "";
	$connexion = False;


	if(!$connexion){
		try{
			$bddPDO = new PDO('mysql:host='.$host.';dbname='.$db_name.'', $username, $password);
			$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bddPDO;
			
		}
		catch(PDOExecption $exception){
			echo "Erreur de connexion: ".$exception->getMessage();
		}
	}
	
}


