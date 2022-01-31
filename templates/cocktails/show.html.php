<!-- AFFICHAGE D'UN COCKTAIL -->

<?php 






?>



   
  
        <!-- DISPLAY ONE CARD START HERE -->
        <div class="card border-dark m-3 p-3 justify-content-center" style="max-width: 45rem">
          <div class="card-header text-center text-big"> <?= $cocktail->getName() ?></div>
          <div class="card-body d-flex flex-column justify-content-center
          ">
          
          <div class="justify-content-center">
          <p class="card-text m-3 text-center">
              Ingredients: 
             <?= $cocktail->getIngredients()?>
            </p>

            <img 
              src="images/<?=$cocktail->getImage()?>"
              alt=""
            /> </div>
            
          </div>


          <div class="buttons d-flex justify-content-center">



          <div class="d-flex mt-5"> 
          <form class="me-3" action=""> 
            <button class="btn btn-primary ms-2" name="idToEdit" value="<?= $cocktail->getId()?>"> EDIT</button>
          </form>

<form action="" method="post">
   <button class="btn btn-secondary" name="id" value="<?= $cocktail->getId()?>"> DELETE</button>
</form>    </div>
         
        
          </div>
        </div>
        <!-- END ONE CARD -->


<!-- FORM AFFICHAGE COMMENTAIRE SPLIT  -->


<div class="container">

<div class="row"> 

<!-- PARTIE FORM GAUCHE -->
<div class="col-6">  
  
<form action="?type=comment&action=new" method="post">
<div class="form-group">
  <input type="text" name="author" placeholder="Your name" class="form-control-plaintext mb-5">
</div>
<div class="form-group">
  <textarea name="content" id="" cols="30" rows="10" placeholder="Your comment..." class="form-control"></textarea>
</div>
<div class="form-group mt-4">
<button value="<?=$cocktail->getId()?>" 
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
      <h4 class="mb-4 mt-4"> <?=  $comment->getAuthor()?></h4>
      <p> <?= $comment->getComment() ?>  </p>

      <p> ID : <?= $comment->getId()?></p>
    </div>
   </div>
   <form action="?type=comment&action=delete" method="post">




     <input type="hidden" name="idCoke" value="<?= $cocktail->getId() ?>">

     
                <button type="submit" class="btn btn-danger" name="id" value="<?= $comment->getId()?>">Supprimer</button>
            </form>
  </div>
</div>
<!-- fin un commentaire -->
<?php  endforeach ?>

<?php 
  if(!$comments) { ?>

    <h4 class="text-muted text-center mt-5"> Nobody comment yet....</h4>


<?php } ?>




</div>
</div>
</div>
