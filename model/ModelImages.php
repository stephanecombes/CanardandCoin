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

    public static function delete($primary_value)
    {
        $lien = "SELECT lienImage FROM $table_name WHERE $primary_key = :id_tag";
        $rep_prep = Model::$PDO->prepare($lien);
        $values = array('id_tag' => $primary_value);
        $rep_prep->execute($values);
        if (file_exists($lien)) {
            unlink($lien);
        }
        parent::delete($primary_value);
    }
}
