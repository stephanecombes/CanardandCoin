<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php $pagetitle;?></title>
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Maven+Pro" />
  </head>
  <header>
    <nav class="genericNav_class">
      <img class="img_logo" src="images/logo.png" alt="logo">
      <a class="active" href="index.php">Accueil</a>
      <a href="index.php?controller=produits&action=readAll">Produits</a>
      <a href="index.php?controller=commandes&action=readAll">Commandes</a>
      <a href="index.php?controller=Utilisateurs&action=readAll">Utilisateurs</a>
      <a href="index.php?controller=Utilisateurs&action=create">Inscription</a>
      <?php
if (isset($_SESSION['idUtilisateur'])) {
    echo '<a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a>';
} else {
    echo '<a href="index.php?controller=Utilisateurs&action=connect">Connexion</a>';
}
?>

    </nav>
    <nav class="burgerNav_class">
      <img id="logo_Burger" src="images/logo_burger.png" alt="logo burger">
      <div id="menuB">
        <div><a class="active" href="index.php">Accueil</a></div>
        <div><a href="index.php?controller=produits&action=readAll">Produits</a></div>
        <div><a href="index.php?controller=commandes&action=readAll">Commandes</a></div>
        <div><a href="index.php?controller=Utilisateurs&action=readAll">Utilisateurs</a></div>
        <div><a href="index.php?controller=Utilisateurs&action=create">Inscription</a></div>
        <?php
          if (isset($_SESSION['idUtilisateur'])) {
            echo '<a href="index.php?controller=Utilisateurs&action=disconnected">Déconnexion</a>';
          } else {
            echo '<a href="index.php?controller=Utilisateurs&action=connect">Connexion</a>';
          }
        ?>
      </div>
    </nav>
    <img class="img_back" src="images/back.png" alt="back">

  </header>
  <body class="body_class">
    <div class="div_body">

    <?php
      $filepath = File::build_path(array("view", static::$object, "$view.php"));
      require $filepath;
      ?>
    </div>
  </body>
  <footer class="footer_class">
    <p>a footer</p>
  </footer>
</html>
