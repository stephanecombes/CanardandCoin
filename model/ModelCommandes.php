<?php

class ModelCommandes {

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