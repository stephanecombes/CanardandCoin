<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelCommandes extends Model{

	//attributs.
	private $idCommande;
	private $idUtilisateur;
	private $dateCommande;
	private $idStatut;
	private $montantCommande;
	private $idAdresseLivraison;
	private $idAdresseFacturation;
	protected static $object = 'commandes';
	protected static $primary = 'idCommande';
}

?>
