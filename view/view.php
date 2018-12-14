<!doctype html>
<?php ControllerProduits::createPanier();?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php $pagetitle;?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Maven+Pro" />
  </head>
  <header>
    <!-- Principal nav -->
    <ul class="principal_nav">
	<?php
if (!Session::is_admin()) {
    echo '<li><a href="index.php?controller=produits&action=viewPanier">Panier</a></li>';
}
?>
      <?php
      if (isset($_SESSION['idUtilisateur'])) {
        if(Session::is_admin()){
			    echo '<li><a href="index.php?controller=utilisateurs&action=admin">Administration</a></li>';
        }else{
          echo '<li><a href="index.php?controller=commandes&action=readAll">Mes commandes</a></li>';
          echo '<li><a href="index.php?controller=produits&action=readAll">Nos produits</a></li>';
			    echo '<li><a href="index.php?controller=utilisateurs&action=readAll">Mon profil</a></li>';
		    }
		    echo '<li><a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a></li>';
      } else {
        echo '<li><a href="index.php?controller=Utilisateurs&action=create">Inscription</a></li>';
        echo '<li><a href="index.php?controller=Utilisateurs&action=connect">Connexion</a></li>';
        echo '<li><a href="index.php?controller=produits&action=readAll">Nos produits</a></li>';
      }
      ?>
      <li class="img_logo"><a href="index.php" ><img class="img_logo" src="images/logo.png" alt="logo"></a></li>
    </ul>
    <!-- secondary nav -->
    <div class="secondary_nav" id="secondary_nav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php
      if (isset($_SESSION['idUtilisateur'])) {
        if(Session::is_admin()){
			echo '<a href="index.php?controller=utilisateurs&action=admin">Administration</a>';
        }else{
          echo '<a href="index.php?controller=commandes&action=readAll">Mes commandes</a>';
      echo '<li><a href="index.php?controller=produits&action=readAll">Nos produits</a></li>';
			echo '<li><a href="index.php?controller=utilisateurs&action=readAll">Mon profil</a></li>';
		}
      echo '<a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a>';
      } else {
			echo '<a href="index.php?controller=Utilisateurs&action=create">Inscription</a>';
			echo '<a href="index.php?controller=Utilisateurs&action=connect">Connexion</a>';
      echo '<a href="index.php?controller=produits&action=readAll">Nos produits</a>';
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
      <hr>
      <p><h1>Société canard and coin</h1></p>
      <p>Tous droits presque réservés</p>
    </footer>
  </body>
</html>
<script src="js/carousel.js"></script>
<script src="js/autoResize.js"></script>
<script src="js/alternativeNav.js"></script>
