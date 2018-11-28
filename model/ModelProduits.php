<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelProduits extends Model
{

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
            $this->nomProduit = $data['nomProduit'];
            $this->idCategorie = $data['idCategorie'];
            $this->couleurProduit = $data['couleurProduit'];
            $this->descriptionProduit = $data['descriptionProduit'];
            $this->tailleProduit = $data['tailleProduit'];
            $this->poidsProduit = $data['poidsProduit'];
            $this->ageProduit = $data['ageProduit'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
