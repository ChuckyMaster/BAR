<form method="post" >
  <div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Author</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="author"
        class="form-control-plaintext"
        placeholder="Your name"
      />
    </div>

    </div>



  </div>

  <div class="form-group">
    <label for="content" class="form-label mt-4">Write new info</label>
    <textarea class="form-control" name="content" rows="3"></textarea>



  </div>



  <button class="btn btn-outline-warning mt-5" type="submit"
  action="?type=info&action=new"> CREATE</button>
</form>