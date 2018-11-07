<?php

class Model {
	public static $pdo;

	public static function Init(){
	    //Récupération des données nécéssaires à la connexion à la base de données.
	    $hostname = Conf::gethostname();
	    $database_name = Conf::getDatabase();
	    $login = Conf::getLogin();
	    $password = Conf::getPassword();
	    
	    try{
	    	//création du PDO.
	    	new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password);
		}catch(PDOException $e) {
			//affiche un message d'erreur.
	 		echo $e->getMessage();
	  		die();
	  	}

	  	//connexion à la base de données.
	    self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	   
		//On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreurs.
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	//getter générique.
	public function get($nomAttribut){
		$class_name = 'Model' . ucfirst(static::$object);
		return $class_name->$nomAttribut;
	}

	//setter générique.
	public function set($nomAttribut, $valeur){
		$class_name = 'Model' . ucfirst(static::$object);
		$class_name->$nomAttribut = $valeur;
	}

	public function create(){

	}

	public function select(){
		
	}

	public function selectAll(){
		
	}

	public function update(){
		
	}

	public function delete(){
		
	}



















}

//initialisation du Model.
Model::Init();

?>