<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelImages extends Model
{
    //attributs.
    private $idImage;
    private $lienImage;
    private $descriptionImage;
    protected static $object = 'images';
    protected static $primary = 'idImage';

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->lienImage = $data['lienImage'];
            $this->descriptionImage = $data['descriptionImage'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }
}
