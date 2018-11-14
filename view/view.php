<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<header>
  <nav>
    <ul>
      <li><a href="">Accueil</a></li>
      <li><a href="">Produits</a></li>
      <li><a href="">Commandes</a></li>
      <li><a href="">Utilisateurs</a></li>
    </ul>
  </nav>
</header>
<body>
  <?php
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
  ?>
</body>
<footer>
  <p>...</p>
</footer>
</html>
