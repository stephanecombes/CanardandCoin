<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelProduits extends Model{

	//attributs.
	private $idProduit;
	private $nomProduit;
	private $idCategorie;
	private $couleurProduit;
	private $descriptionProduit;
	private $tailleProduit;
	private $poidsProduit;
	private $ageProduit;
	protected static $object = 'produits';
	protected static $primary = 'idProduit';

	public function __construct($data = null)
	{
			if (!is_null($data)) {
					$this->nomProduit = $data['nomUtilisateur'];
					$this->idCategorie = $data['prenomUtilisateur'];
					$this->couleurProduit = $data['mailUtilisateur'];
					$this->descriptionProduit = $data['ageUtilisateur'];
					$this->tailleProduit = $data['mdpUtilisateur'];
					$this->poidsProduit = $data['mdpUtilisateur'];
					$this->ageProduit = $data['mdpUtilisateur'];
			}
	}

	public function get($attribute)
	{
			return $this->$attribute;
	}
}

?>
