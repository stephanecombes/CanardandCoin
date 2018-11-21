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
}

?>
