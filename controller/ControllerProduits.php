<?php
require_once File::build_path(array('model', 'ModelProduits.php'));

class ControllerProduits{
  protected static $object = 'produits';

  public static function read(){
    $id = $_GET("primary_value");
    if(ModelProduits::select($id) != false){
      require File::build_path(array("view", "produits", "details.php"));
    }else{
      require File::build_path(array("view", "produits", "error.php"));
    }
  }

  public static function readAll(){
    $produits_tab = ModelProduits::selectAll();
  }

  public static function create(){
    require File::build_path(array("view", "produits", "create.php"));
  }

  public static function created(){
    $produit = new ModelProduits($_POST);
    $produit->save();
    ControllerProduits::readAll();
  }
}

?>
