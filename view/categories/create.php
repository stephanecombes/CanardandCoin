<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Créer une categorie </title>
    </head>
    <body>
		<form method="post" action="index.php?controller=categories&action=created">
			<fieldset>
				<legend>Categorie :</legend>
				<p>
					<label for="couleur_id">nomCategorie</label> :
					<input type="text" placeholder="Ex : canard" name="nomCategorie" id="nomCategorie_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	</body>
</html>
