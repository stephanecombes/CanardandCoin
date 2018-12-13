<h1>Changer le statut de la commande :</h1>
<a class="button" href="index.php?controller=commandes&action=actualiseStatut&idCommande=<?php echo $_GET['idCommande']; ?>&idStatut=1">En attente</a>
<a class="button" href="index.php?controller=commandes&action=actualiseStatut&idCommande=<?php echo $_GET['idCommande']; ?>&idStatut=2">Pris en charge</a>
<a class="button" href="index.php?controller=commandes&action=actualiseStatut&idCommande=<?php echo $_GET['idCommande']; ?>&idStatut=3">Terminé</a>
