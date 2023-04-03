<?php

//include("vues/communs/menu.php");
//include('models/espaceAdmin/connexionBdd.php');
include('views/communs/menu.php');




?>


<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter un Utilisateur</h2>

              <!--<form action="../../../controllers/espaceAdmin/controllerAjouterUtilisateur.php?action=ajouterUnUtilisateur()" method="post">-->
              <!--<form action="index.php?action=controllerAjouterUtilisateur/ajouterUnUtilisateur" method="post">-->
              <!--<form action="controllerAjouterUtilisateur.php/ajouterUnUtilisateur()" method="post">-->
              <form action="controllerAdmin/ajouterUneRecette1" method="post" enctype="multipart/form-data">

              

              <input type="file" name="img" />
              <input type="submit" name="Envoyer">

               
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
 //include("vues/communs/footer.php");
 include("views/communs/footer.php");
 ?>