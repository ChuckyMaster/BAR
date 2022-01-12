<!-- AFFICHAGE D'UN COCKTAIL -->

<?php 
$cocktail;





?>



   
  
        <!-- DISPLAY ONE CARD START HERE -->
        <div class="card border-dark m-3 p-3 justify-content-center" style="max-width: 45rem">
          <div class="card-header text-center text-big"> <?= $cocktail['name'] ?></div>
          <div class="card-body d-flex flex-column justify-content-center
          ">
          
          <div class="justify-content-center">
          <p class="card-text m-3 text-center">
              Ingredients: 
             <?= $cocktail['ingredients']?>
            </p>

            <img 
              src="images/<?=$cocktail['image'] ?>"
              alt=""
            /> </div>
            
          </div>


          <div class="buttons d-flex justify-content-center">



          <div class="d-flex mt-5"> 
          <form class="me-3" action="editCocktail.php"> 
            <button class="btn btn-primary ms-2" name="idToEdit" value="<?= $cocktail['id'] ?>"> EDIT</button>
          </form>

<form action="deleteCocktail.php" method="post">
   <button class="btn btn-secondary" name="id" value="<?= $cocktail['id'] ?>"> DELETE</button>
</form>    </div>
         
        
          </div>
        </div>
        <!-- END ONE CARD -->


