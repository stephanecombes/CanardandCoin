<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateurs extends Model
{

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

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            if (isset($data['idUtilisateur'])) {
                $this->$idUtilisateur = $data['idUtilisateur'];
            }
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->prenomUtilisateur = $data['prenomUtilisateur'];
            $this->mailUtilisateur = $data['mailUtilisateur'];
            $this->ageUtilisateur = $data['ageUtilisateur'];
            $this->mdpUtilisateur = $data['mdpUtilisateur'];
            $this->idRole = $data['idRole'];
            $this->bloque = 0;
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
