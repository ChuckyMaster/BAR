<?php foreach($glaces as $glace){ ?>
      
      <!-- DISPLAY ONE CARD START HERE -->
      <div class="col-3 card border-dark m-3 p-3" style="max-width: 20rem">
        <div class="card-header text-center"></div>
        <div class="card-body d-flex flex-column ">
         
          <p class="card-text text-center m-2">
           Glace description: <?= $glace['description'] ?>
          </p>
        </div>
        <form action=" post"><button class="btn btn-warning"> Delete</button></form>
      </div>
      <!-- END ONE CARD -->



<?php   } ?>