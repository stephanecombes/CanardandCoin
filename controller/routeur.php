<?php
  require_once FILE::build_path(array(controller, ControllerCommandes.php));
  require_once FILE::build_path(array(controller, ControllerUtilisateurs.php));
  require_once FILE::build_path(array(controller, ControllerProduits.php));
  // On recupère l'action passée dans l'URL
  $controller = $_GET['controller'];
  $action = $_GET['action'];
  //test controller vide
  if(isset($_GET['controller'])){//si le controller n'est pas vide
    //on construit le controller
    $controller = $_GET['controller'];

  }else{//si le controller est vide
    //on affiche une page par défaut
    $controller = 'produits'
  }

  //On créer le nom du controller
  $controller_class = 'Controller' . ucFirst($controller);

  if(class_exists($controller_class)){//si le controller existe
    //on récupère les méthodes du controller
    $controllerMethods = get_class_methods($controller_class);
  }else{//si le controller n'existe pas
    //on renvoit la view erreur

    /// A FAIRE
    /// A FAIRE
    /// A FAIRE
    /// A FAIRE
    /// A FAIRE

    die();
  }

  if(in_array($action, $controllerMethods)){//si la fonction appelée existe
    //on execute l'action
    $controller_class::$action();

  }else{//si la fonction appelée n'existe pas
    //on renvoit la viex erreur

        /// A FAIRE
        /// A FAIRE
        /// A FAIRE
        /// A FAIRE
        /// A FAIRE

    die();
  }
?>
