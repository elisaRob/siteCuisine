<?php
  
    //include("../../communs/fonctionUtile.php");
  
   
    include("views/communs/menu.php");
   
    $conservation=$idUtilisateur;
    
    ?>

<section class="vh-100 bg-image ">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier Admin de l'utilisateur</h2>

              <p>si l'utilisateur devient un admin il faut mettre 1 dans le champs admin autrement il faut mettre 1</p>
              <br>
              <form action="controllerAdmin/modifierUtilisateurParSonAdmin/<?=$conservation?>" method="post" >

                <div class="form-outline mb-4">
                  <input type="text" id="admin"name="admin" class="form-control form-control-lg" value=<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>>
                  <label class="form-label" for="admin">Admin ou pas (choix 0 ou 1)</label>
                </div>

               

                

                <div class="d-flex justify-content-center">
                  <button type="submit"name="mettreAJourAdmin"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Mettre à jour</button>
                </div>

                <br>

                <div> <a href='controllerEspaceMembre/pageAdmin' class="d-flex justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
                </div>

                <br>

              <div> <a href='controllerAdmin/afficherTousUtilisateurs' class=" d-flex  justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la liste des utilisateurs</a>
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