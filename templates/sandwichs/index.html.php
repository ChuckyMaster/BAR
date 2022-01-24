<div class="container">
  <div class="row ">
    <div class="col-12 d-flex justify-content-center"> 
      <a href="createSandwich.php" class="btn btn-info"> Create casse-dalle</a>
    </div>
  </div>
</div>



<?php foreach($sandwichs as $sandwich){ ?>
      
      <!-- DISPLAY ONE CARD START HERE -->
      <div class="col-3 card border-dark m-3 p-3" style="max-width: 20rem">
        <div class="card-header text-center"></div>
        <div class="card-body d-flex flex-column ">
         
          <p class="card-text text-center m-2">
           description: <?= $sandwich['description'] ?>
          </p>


          <p> Prix: <?= $sandwich['prix'] ?> €</p>
          <div class="buttons d-flex justify-content-center">  
          <a href="sandwich.php?id=<?= $sandwich['id']?>" class="btn btn-primary"> VIEW  </a>
          
          
          <form action="deleteSandwich.php" method="post" class="ms-2">
               <button class="btn btn-secondary " name="id" value="<?= $sandwich['id'] ?>"> DELETE</button>
            </form>   </div>
           
        
        
        </div>
      </div>
      <!-- END ONE CARD -->



<?php   } ?>