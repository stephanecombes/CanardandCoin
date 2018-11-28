<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelCategories extends Model
{

    //attributs.
    private $idCategorie;
    private $nomCategorie;
    protected static $object = 'categories';
    protected static $primary = 'idCategorie';

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->nomCategorie = $data['nomCategorie'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
