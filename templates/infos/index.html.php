
<div class="container">
  <div class="row ">
    <div class="col-12 d-flex justify-content-center"> 
      <a href="createInfo.php" class="btn btn-info"> Create Flash News!</a>
    </div>
  </div>
</div>


<?php foreach($infos as $info){ ?>
      
      <!-- DISPLAY ONE CARD START HERE -->
      <div class="col-3 card border-dark m-3 p-3" style="max-width: 20rem">
        <div class="card-header text-center"></div>
        <div class="card-body d-flex flex-column ">
         
          <p class="card-text text-center m-2">
           Info FLASH NEWS: <?= $info['description'] ?>
          </p>
        </div>

        <div class="buttons d-flex justify-content-center"> 

        <a href="info.php?id=<?= $info['id']?>" class="btn btn-primary me-2"> VIEW  </a>


        <form method="post" action="deleteInfo.php">
          <button class="btn btn-warning" name="id" value="<?=$info['id'] ?>"> Delete</button>
      
      
      </form>  
      
      </div>
       
      </div>
      <!-- END ONE CARD -->



<?php   } ?>