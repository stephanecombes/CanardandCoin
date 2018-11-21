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

	public function get($attribute){
		return $this->$attribute;
	}


	public function __construct($data){
		foreach($data as $key => $values){
			$this->$key = $values;
		}
		var_dump($data);
		}
}

?>
