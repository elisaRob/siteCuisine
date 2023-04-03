<?php

  
    //include("../../communs/fonctionUtile.php");
  
   
    include("views/communs/menu.php");
   
  

    ?>

<section  class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter un ingrédient</h2>

            
              <br>
              <form action="controllerAdmin/ajouterUnIngredient" method="post" >

                <div class="form-outline mb-4">
                  <input type="text" id="ingredient"name="ingredient" class="form-control form-control-lg" >
                  <label class="form-label" for="ingredient">Ajouter un ingrédient</label>
                </div>

               

                

                <div class="d-flex justify-content-center">
                  <button type="submit"name="ajouterUnIngredient"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ajouter</button>
                </div>

                <br>

                <a class="d-flex justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body"  href="controllerAdmin/pageAjouterUneRecette">Revenir à la page d'ajout de recette</a>

               

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

