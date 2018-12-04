<form method="post" action="index.php?controller=Images&action=created" enctype="multipart/form-data">
  <fieldset>
    <form action="">
      <p>
        <label for="image">Image</label> :
      </p>
      <p>
        <input type="file" name="image" id="image" accept="images/*">
      </p>
      <p>
        <label for="description_id">Description de l'image</label> :
      </p>
      <p>
        <input type="text" placeholder="Ex : une description" name="descriptionImage" id="descriptionImage_" required/>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </fieldset>
</form>
