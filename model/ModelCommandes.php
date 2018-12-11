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
    protected static $object = 'commandes';
    protected static $primary = 'idCommande';

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->dateCommande = $data['dateCommande'];
            $this->idUtilisateur = $data['idUtilisateur'];
            $this->idStatut = $data['idStatut'];
            $this->montantCommande = $data['montantCommande'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
