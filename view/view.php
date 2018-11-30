<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php $pagetitle;?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <header>
    <nav class="genericNav_class">
      <a class="active" href="index.php">Accueil</a>
      <a href="index.php?controller=produits&action=readAll">Produits</a>
      <a href="index.php?controller=commandes&action=readAll">Commandes</a>
      <a href="index.php?controller=Utilisateurs&action=readAll">Utilisateurs</a>
      <a href="index.php?controller=Utilisateurs&action=create">Inscription</a>
      <a href="index.php?controller=Utilisateurs&action=connect">Connexion</a>
    </nav>
  </header>
  <body>

    <?php
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>

  </body>
  <footer class="footer_class">
    <p>a footer</p>
  </footer>
</html>
