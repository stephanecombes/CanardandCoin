<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelCommandes extends Model
{
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

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->dateCommande = $data['nomUtilisateur'];
            $this->idStatut = $data['prenomUtilisateur'];
            $this->montantCommande = $data['mailUtilisateur'];
            $this->idAdresseLivraison = $data['ageUtilisateur'];
            $this->idAdresseFacturation = $data['mdpUtilisateur'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
