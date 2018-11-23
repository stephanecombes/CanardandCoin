<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Créer une commande </title>
    </head>
    <body>
		<form method="post" action="index.php?controller=commandes&action=created">
			<fieldset>
				<legend>Commande :</legend>
				<p>
					<label for="couleur_id">idUtilisateur</label> :
					<input type="text" placeholder="Ex : 1" name="idUtilisateur" id="idUtilisateur_id" required/>
				</p>
				<p>
					<label for="marque_id">dateCommande</label> :
					<input type="text" placeholder="Ex : 12/08/1980" name="dateCommande" id="dateCommande_id" required/>
				</p>
        <p>
          <label for="marque_id">idStatut</label> :
          <input type="text" placeholder="Ex : 2" name="idStatut" id="idStatut_id" required/>
        </p>
        <p>
          <label for="marque_id">montantCommande</label> :
          <input type="text" placeholder="Ex : 160" name="montantCommande" id="montantCommande_id" required/>
        </p>
        <p>
          <label for="marque_id">idAdresseLivraison</label> :
          <input type="text" placeholder="Ex : 1" name="idAdresseLivraison" id="idAdresseLivraison_id" required/>
        </p>
        <p>
          <label for="marque_id">idAdresseFacturation</label> :
          <input type="text" placeholder="Ex : 2" name="idAdresseFacturation" id="idAdresseFacturation_id" required/>
        </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	</body>
</html>
