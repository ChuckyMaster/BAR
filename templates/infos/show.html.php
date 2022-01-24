        <!-- DISPLAY ONE CARD START HERE -->
        <div class="card border-dark m-3 p-3 justify-content-center" style="max-width: 45rem">
          <div class="card-header text-center text-big"> </div>
          <div class="card-body d-flex flex-column justify-content-center
          ">
          
          <div class="justify-content-center">
          <p class="card-text m-3 text-center">
              Ingredients: 
             <?= $info['description']?>
            </p>
           
            </div>
            
          </div>


          <div class="buttons d-flex justify-content-center">



          <div class="d-flex mt-5"> 
          <form class="me-3" action="info.php"> 
            <button class="btn btn-primary ms-2" name="id" value="<?= $info['id'] ?>"> EDIT</button>
          </form>

<form action="deleteSandwich.php" method="post">
   <button class="btn btn-secondary" name="id" value="<?= $info['id'] ?>"> DELETE</button>
</form>    </div>
         
        
          </div>
        </div>
        <!-- END ONE CARD -->