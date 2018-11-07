<?php

class ModelProduits {

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