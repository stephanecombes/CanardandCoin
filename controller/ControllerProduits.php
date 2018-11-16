<?php

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
    $id = $_GET("primary_value");
    $produits_tab = ModelProduits::selectAll();
  }

  public static function create(){
    require File::build_path(array("view", "produits", "create.php"));
  }

  public static function created(){
    $produit = new ModelProduits($_POST['idProduit'], $_POST['nomProduit'], $_POST['idCategorie'], $_POST['couleurProduit'], $_POST['descriptionProduit'], $_POST['tailleProduit'], $_POST['poidsProduit'], $_POST['ageProduit']);
    $produit->save();
    ControllerProduits::readAll();
  }
}

?>
