
<?php



?>


<form method="post" action="" >
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="nameEdit"
        class="form-control-plaintext"
        placeholder="enter name of cocktail"
        value="<?= $cocktail->getName() ?>"
      />
    </div>
    <label for="imageEdit" class="col-sm-2 col-form-label">image</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="imageEdit"
        class="form-control-plaintext"
        placeholder="url image ?"
        value="<?= $cocktail->getImage()?>"
      />
    </div>



  </div>

  <div class="form-group">
    <label for="ingredients" class="form-label mt-4">Ingredients</label>
    <textarea class="form-control" name="idEdit" rows="3"> <?= $cocktail->getIngredients() ?> </textarea>



  </div>



  <button class="btn btn-outline-warning mt-5" name="edit" value="<?=$cocktail->getid() ?>" action="" type="submit" > EDIT</button>
</form>
