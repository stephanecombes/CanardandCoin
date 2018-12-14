<?php

if (isset($_GET['idCategorie'])) {
    $c = ModelCategories::select($_GET['idCategorie']);
    $cChamp = 'updated';
    $cIdCategorie = htmlspecialchars($c->get('idCategorie'));
    $cNomCategorie = htmlspecialchars($c->get('nomCategorie'));
    $cLabel = 'Mettre à jour';
} else {
    $cChamp = 'created';
    $cLabel = 'Créer';
    $cNomCategorie = '""';
    $cPrenom = '""';
}
?>

<?php
echo '<form method="post" action="index.php?controller=categories&action=' . $cChamp . '">';
?>
	<fieldset>
		<legend>Categorie :</legend>
<?php
if ($cChamp == 'updated') {
    echo <<< EOT
		<p>
			<label for="idCategorie_id">Id Categorie</label> :
			<input type="text" placeholder="Ex : 1" name="idCategorie" id="idCategorie_id" value= $cIdCategorie readonly/>
		</p>
EOT;
}
?>
		<p>
			<label for="nomCategorie_id">Nom Categorie</label> :
<?php
echo '<input type="text" placeholder="Ex : Canard..." name="nomCategorie" id="nomCategorie_id" value=' . $cNomCategorie . ' required/>';
?>
		</p>
		<p>
<?php
echo '<input type="submit" value=' . $cLabel . '>';
?>
		</p>
	</fieldset>
</form>
