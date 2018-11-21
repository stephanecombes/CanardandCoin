<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateurs extends Model{

	//attributs.
	private $idUtilisateur;
	private $nomUtilisateur;
	private $prenomUtilisateur;
	private $mailUtilisateur;
	private $ageUtilisateur;
	private $mdpUtilisateur;
	private $bloque;
	private $idRole;
	protected static $object = 'utilisateurs';
	protected static $primary = 'idUtilisateur';

	public function __construct($data1, $data2, $data3, $data4, $data5, $data6){
		/*
		foreach($data as $key => $values){
			$this->$key = $values;
		}
		*/
		$this->nomUtilisateur = $data1;
		$this->prenomUtilisateur = $data2;
		$this->mailUtilisateur = $data3;
		$this->ageUtilisateur = $data4;
		$this->mdpUtilisateur = $data5;
		$this->idRole = $data6;
	}

	public function get($attribute){
		return $this->$attribute;
	}
}
?>
