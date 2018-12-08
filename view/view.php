<!doctype html>
<?php ControllerProduits::createPanier(); ?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php $pagetitle;?></title>
    <link rel="stylesheet" href="css/style11.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Maven+Pro" />
  </head>
  <header>
    <!-- Principal nav -->
    <ul class="principal_nav">
      <li><a href="index.php?controller=produits&action=viewPanier">Panier</a></li>
      <li><a href="index.php?controller=produits&action=readAll">Produits</a></li>
      <li><a href="index.php?controller=commandes&action=readAll">Commandes</a></li>
      <?php
      if (isset($_SESSION['idUtilisateur'])) {
        if(ModelUtilisateurs::select($_SESSION['idUtilisateur'])->get('idRole') == 0){
          echo '<li><a href="index.php?controller=utilisateurs&action=admin">Administration</a></li>';
        }
          echo '<li><a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a></li>';
      } else {
          echo '<li><a href="index.php?controller=Utilisateurs&action=create">Inscription</a></li>';
          echo '<li><a href="index.php?controller=Utilisateurs&action=connect">Connexion</a></li>';
      }
      ?>
      <li class="img_logo"><a href="index.php" ><img class="img_logo" src="images/logo.png" alt="logo"></a></li>
    </ul>
    <!-- secondary nav -->
    <div class="secondary_nav" id="secondary_nav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php?controller=produits&action=viewPanier">Panier</a>
      <a href="index.php?controller=produits&action=readAll">Produits</a>
      <a href="index.php?controller=commandes&action=readAll">Commandes</a>
      <?php
      if (isset($_SESSION['idUtilisateur'])) {
        if(ModelUtilisateurs::select($_SESSION['idUtilisateur'])->get('idRole') == 0){
          echo '<a href="index.php?controller=utilisateurs&action=admin">Administration</a>';
        }
          echo '<a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a>';
      } else {
          echo '<a href="index.php?controller=Utilisateurs&action=create">Inscription</a>';
          echo '<a href="index.php?controller=Utilisateurs&action=connect">Connexion</a>';
      }
      ?>
    </div>
    <span class="span_alt_menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <img class="img_back" src="images/back.png" alt="back">
  </header>
  <body class="body_class">
    <div class="div_body">
    <?php
      $filepath = File::build_path(array("view", static::$object, "$view.php"));
      require $filepath;
      ?>
    </div>
    <footer class="footer_class">
      <p>a footer</p>
    </footer>
  </body>
</html>
<script src="js/carousel.js"></script>
<script src="js/autoResize.js"></script>
<script src="js/alternativeNav.js"></script>
