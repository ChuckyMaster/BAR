

 <div class="container">
  <div class="row ">
    <div class="col-12 d-flex justify-content-center"> 
      <a href="createGlace.php" class="btn btn-info"> Create Glace</a>
    </div>
  </div>
</div>

<?php foreach($glaces as $glace){ ?>
      
      <!-- DISPLAY ONE CARD START HERE -->

      
      <div class="col-3 card border-dark m-3 p-3" style="max-width: 20rem">
        <div class="card-header text-center"></div>
        <div class="card-body d-flex flex-column ">
         
          <p class="card-text text-center m-2">
           Glace description: <?= $glace['description'] ?>
          </p>
        </div>
        <div class="buttons d-flex justify-content-center"> 
        <form method="post" action="deleteGlace.php"
        ><button class="btn btn-warning me-2" name="id" value="<?= $glace['id'] ?>"> Delete</button></form>
        <a href="glace.php?id=<?= $glace['id']?>" class="btn btn-success">See</a>

        </div>
      </div>
      <!-- END ONE CARD -->



<?php   } ?>