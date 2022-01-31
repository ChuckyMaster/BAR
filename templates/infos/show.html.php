<div class="card border-dark m-3 p-3 justify-content-center" style="max-width: 45rem">
          <div class="card-header text-center text-big"> </div>
          <div class="card-body d-flex flex-column justify-content-center
          ">
          
          <div class="justify-content-center">
          <p class="card-text m-3 text-center">
            New info number:  <?= $info->id?>
             <?= $info->description?>
            </p>

            
          </div>


         
        </div>
        <!-- END ONE CARD -->

        <!-- FORM AFFICHAGE COMMENTAIRE SPLIT  -->


<div class="container">

<div class="row"> 

<!-- PARTIE FORM GAUCHE -->

<!-- Ajout Reaction

POST

string 'author'
string 'content'
-->

<div class="col-6">  
  
<form action="?type=reaction&action=new" method="post">
<div class="form-group">
  <input type="text" name="author" placeholder="Your name" class="form-control-plaintext mb-5">
</div>
<div class="form-group">
  
  <textarea name="content" id="" cols="30" rows="10" placeholder="Your reaction..." class="form-control"></textarea>
</div>
<div class="form-group mt-4">
<button value="<?=$info->id?>" 
class="btn btn-outline-secondary" 
name="infoId">POST</button>


</div>


</form></div>


<!-- PARTIE FORM DROITE -->

<div class="col-6"> 

<!-- int 'infoReact_Id' pour suppression -->
<?php foreach($reactions as $reaction) :?>
<!-- UN COMMENTAIRE -->
<div class="container mb-3">
  <div class="row d-flex flex-column">
    <div class="col-12">
      <div class="comment">
      <h4 class="mb-4 mt-4"> <?=  $reaction->author?></h4>
      <p> <?= $reaction->content ?>  </p>

      <p> ID : <?= $reaction->id?></p>
    </div>
   </div>
   <form action="?type=reaction&action=delete" method="post">
   <input type="hidden" name="idInfo" value="<?= $info->id ?>">
                <button type="submit" class="btn btn-danger" name="idReact" value="<?= $reaction->id?>">Supprimer</button>
            </form>
  </div>
</div>
<!-- fin un commentaire -->
<?php  endforeach ?>

<?php 
  if(!$reactions) { ?>

    <h4 class="text-muted text-center mt-5"> Nobody comment yet....</h4>


<?php  }?>

</div>
</div>
</div>