<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Créer un produit </title>
    </head>
    <body>
		<form method="post" action="index.php?action=created">
			<fieldset>
				<legend>Produit :</legend>
				<p>
					<label for="couleur_id">nomProduit</label> :
					<input type="text" placeholder="Ex : canard" name="nomProduit" id="nomProduit_id" required/>
				</p>
				<p>
					<label for="marque_id">idCategorie</label> :
					<input type="text" placeholder="Ex : 1" name="idCategorie" id="idCategorie_id" required/>
				</p>
        <p>
          <label for="marque_id">couleurProduit</label> :
          <input type="text" placeholder="Ex : rouge" name="couleurProduit" id="couleurProduit_id" required/>
        </p>
        <p>
          <label for="marque_id">descriptionProduit</label> :
          <input type="text" placeholder="Ex : une description" name="descriptionProduit" id="descriptionProduit_id" required/>
        </p>
        <p>
          <label for="marque_id">tailleProduit</label> :
          <input type="text" placeholder="Ex : 15" name="tailleProduit" id="tailleProduit_id" required/>
        </p>
        <p>
          <label for="marque_id">poidsProduit</label> :
          <input type="text" placeholder="Ex : 10" name="poidsProduit" id="poidsProduit_id" required/>
        </p>
        <p>
          <label for="marque_id">ageProduit</label> :
          <input type="text" placeholder="Ex : 12" name="ageProduit" id="ageProduit_id" required/>
        </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	</body>
</html>
