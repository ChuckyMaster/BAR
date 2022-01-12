
<?php

$cocktail;

?>


<form method="post" >
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="nameEdit"
        class="form-control-plaintext"
        placeholder="enter name of cocktail"
        value="<?= $cocktail['name'] ?>"
      />
    </div>
    <label for="imageEdit" class="col-sm-2 col-form-label">image</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="imageEdit"
        class="form-control-plaintext"
        placeholder="url image ?"
        value="<?= $cocktail['image'] ?>"
      />
    </div>



  </div>

  <div class="form-group">
    <label for="ingredients" class="form-label mt-4">Ingredients</label>
    <textarea class="form-control" name="ingredientsEdit" rows="3"> <?= $cocktail['ingredients'] ?> </textarea>



  </div>



  <button class="btn btn-outline-warning mt-5" name="edit" action="editCocktail.php"> EDIT</button>
</form>
