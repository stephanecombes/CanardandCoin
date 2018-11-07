<?php

class ModelUtilisateurs {

	//attributs.
	private $idUtilisateur;
	private $nomUtilisateur;
	private $prenomUtilisateur;
	private $mailUtilisateur;
	private $ageUtilisateur;
	private $mdpUtilisateur;
	private $bloqué;
	private $idRole;
	protected static $object = 'utilisateurs';
	protected static $primary = 'idUtilisateur';

}

?>