<?php
  
 
  
   
    include("views/communs/menu.php");
   
    $conservation=$idRecette;//conservation IdRecette
    $conservationIdEtape=$idEtape;
    
    
    ?>

<section class="vh-100 bg-image ">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier les étape de la recette</h2>

            
              <br>
              <form action="controllerAdmin/modifierRecetteParEtape/<?=$conservation?>/<?=$conservationIdEtape?>" method="post" >

                <div class="form-outline mb-4">
                 <label class="form-label" for="etapeRecette">Modifier cette étape de la recette</label>
                  <textarea type="textarea" id="etapeRecette"name="etapeRecette" class="form-control form-control-lg" cols='10' rows='10'></textarea>
                   
                </div>

               

                

                <div class="d-flex justify-content-center">
                  <button type="submit"name="mettreAJourEtapeRecette"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Mettre à jour</button>
                </div>

                <br>

                <div class="d-flex justify-content-center">
                  <button type='submit' name="SupprimerEtapeRecette" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Supprimer cette étape

                  </button>
                </div>

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