<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <header>
    <nav class="genericNav_class">
      <a class="active" href="../index.php?controller=produits&action=readAll">Accueil</a>
      <a href="../index.php?controller=produits&action=readAll">Produits</a>
      <a href="../index.php?controller=commandes&action=readAll">Commandes</a>
      <a href="../index.php?controller=Utilisateurs&action=readAll">Utilisateurs</a>
      <a href="../index.php?controller=Utilisateurs&action=create">Inscription</a>
      <a href="">Connexion</a>
    </nav>
  </header>
  <body>

    <?php/*
      $filepath = File::build_path(array("view", $controller, "$view.php"));
      require $filepath;
    */?>

  </body>
  <footer class="footer_class">
    <p>a footer</p>
  </footer>
</html>
