<?php
  
 
  
   
    include("views/communs/menu.php");
   
    $conservation=$idRecette;
  
    
    
    ?>

<section class="vh-100 bg-image ">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier cout de la recette</h2>

            
              <br>
              <form action="controllerAdmin/modifierCoutDeLaRecette/<?=$conservation?>" method="post" >

                <div class="form-outline mb-4">
                 <label class="form-label" >Modification cout de la recette:</label>
                 <br>
                <input type="radio" id="coutDeLaRecette1" name="coutDeLaRecette1" value="Bon_marche">
                <label for="coutDeLaRecette1">Bon marché</label>
                   
                <input type="radio" id="coutDeLaRecette1"name="coutDeLaRecette1"value="Cout_moyen">
                <label for="coutDeLaRecette1">Coût moyen</label>

                <input type="radio" id="coutDeLaRecette1" name="coutDeLaRecette1" value="Assez_cher">
                <label for="coutDeLaRecette1">Assez cher</label>
                </div>

               

                

                <div class="d-flex justify-content-center">
                  <button type="submit"name="mettreAJourCoutDeLaRecette"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Mettre à jour</button>
                </div>

                <br>


                <br>

                <div> <a href='controllerEspaceMembre/pageAdmin' class="d-flex justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
                </div>

                <br>

              <div> <a href='controllerAdmin/afficherToutesRecettes' class=" d-flex  justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la liste des recettes</a>
              </div>

               

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
 include("views/communs/footer.php");
 ?>