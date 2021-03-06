<div class="container">
  <div class="row ">
    <div class="col-12 d-flex justify-content-center"> 
      <a href="" class="btn btn-info"> Create Cocktail</a>
    </div>
  </div>
</div>





<?php foreach($cocktails as $cocktail){ ?>


      
        <!-- DISPLAY ONE CARD START HERE -->
        <div class="col-3 card border-dark m-3 p-3" style="max-width: 20rem">
          <div class="card-header text-center"><?= $cocktail->getName()?></div>
          <div class="card-body d-flex flex-column ">
            <img style="max-width: 15rem" class="justify-content-center"
              src="images/<?=$cocktail->getImage()?>"
              alt=""
            />
            <p class="card-text text-center m-2">
             Ingredients: <?= $cocktail->getIngredients() ?>
            </p>
          </div>


          <div class="buttons d-flex justify-content-center">



          <div>  
          <a href="?type=cocktail&action=show&id=<?= $cocktail->getId()?>" class="btn btn-primary"> VIEW  </a>
          </div>
          
      <form action="" method="post" class="ms-2">
   <button class="btn btn-secondary " name="id" value="<?= $cocktail->getId() ?>"> DELETE</button>
          </form>  </div>
          
        </div>
        <!-- END ONE CARD -->



 <?php   } ?>