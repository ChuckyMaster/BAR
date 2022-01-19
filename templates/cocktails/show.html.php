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


<!-- FORM AFFICHAGE COMMENTAIRE SPLIT  -->


<div class="container">

<div class="row"> 

<!-- PARTIE FORM GAUCHE -->
<div class="col-6">  
  
<form action="createComment.php" method="post">
<div class="form-group">
  <input type="text" name="author" placeholder="Your name" class="form-control-plaintext mb-5">
</div>
<div class="form-group">
  <textarea name="content" id="" cols="30" rows="10" placeholder="Your comment..." class="form-control"></textarea>
</div>
<div class="form-group mt-4">
<button value="<?=$cocktail['id']?>" 
class="btn btn-outline-secondary" 
name="cocktailId">POST</button>


</div>


</form></div>


<!-- PARTIE FORM DROITE -->

<div class="col-6"> 


<?php foreach($comments as $comment) :?>
<!-- UN COMMENTAIRE -->
<div class="container mb-3">
  <div class="row d-flex flex-column">
    <div class="col-12">
      <div class="comment">
      <h4 class="mb-4 mt-4"> <?=  $comment['author']?></h4>
      <p> <?= $comment['comment'] ?>  </p>

      <p> ID : <?= $comment['id']?></p>
    </div>
   </div>
   <form action="deleteComment.php" method="post">
                <button type="submit" class="btn btn-danger" name="idComment" value="<?= $comment['id']?>">Supprimer</button>
            </form>
  </div>
</div>
<!-- fin un commentaire -->
<?php  endforeach ?>

<?php 
  if(!$comments) { ?>

    <h4 class="text-muted text-center mt-5"> Nobody comment yet....</h4>


<?php  }?>




</div>
</div>
</div>