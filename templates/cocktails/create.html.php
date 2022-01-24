<form method="post" >
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="name"
        class="form-control-plaintext"
        placeholder="enter name of cocktail"
      />
    </div>
    <label for="image" class="col-sm-2 col-form-label">image</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="image"
        class="form-control-plaintext"
        placeholder="url image ?"
      />
    </div>



  </div>

  <div class="form-group">
    <label for="composition" class="form-label mt-4">Composition</label>
    <textarea class="form-control" name="composition" rows="3"></textarea>



  </div>



  <button class="btn btn-outline-warning mt-5" name="create" action="http://localhost/bistrot/cocktail.php?id=<?= $cocktail['id'] ?>"> CREATE</button>
</form>
