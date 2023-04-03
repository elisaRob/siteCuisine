<?php 

    include('views/communs/menu.php');

?>

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier un utilisateur</h2>

              <!--<form action="../../../controllers/espaceAdmin/controllerAjouterUtilisateur.php?action=ajouterUnUtilisateur()" method="post">-->
              <!--<form action="index.php?action=controllerAjouterUtilisateur/ajouterUnUtilisateur" method="post">-->
              <!--<form action="controllerAjouterUtilisateur.php/ajouterUnUtilisateur()" method="post">-->
               <?php
                   
               ?>
              <form action="controllerAdmin/modifierUnUtilisateur/<?=$conservationId?>" method="post">

              

              <div class="form-outline mb-4">
                  <input type="text" id="nom5" class="form-control form-control-lg" name="nom"/>
                  <label class="form-label" for="nom5">Nom de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="prenom" class="form-control form-control-lg" name="prenom"/>
                  <label class="form-label" for="prenom">Prénom de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="mail"  name="mail" class="form-control form-control-lg"  />
                  <label class="form-label" for="mail" >Mail de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="admin" class="form-control form-control-lg" name="estSuperAdmin" />
                  <label class="form-label" for="admin">Utilisateur admin ou non(1 admin 0 non admin)</label>
                </div>

             
                <div class="form-outline mb-4">
                  <input type="text" id="motDePasse" class="form-control form-control-lg"name="valida" />
                  <label class="form-label" for="motDePasse">Si l'utilisateur a validé ou pas son adresse mail(écrire 1 si il a validé)</label>
                </div>

                <!--<div class="form-outline mb-4">
                  <input type="text" id="motDePasse" class="form-control form-control-lg"name="motDePasse" />
                  <label class="form-label" for="motDePasse">Si l'utilisateur a validé ou pas son adresse mail(écrire valide dans cette case si il a validé)</label>
                </div>-->

               

                <div class="d-flex justify-content-center">
                  <button type="reset"name="effacer"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Effacer</button>
                </div>
                <br>

                <div class="d-flex justify-content-center">
                  <button type="submit"name="mettreAJour"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Mettre à jour</button>
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
 //include("vues/communs/footer.php");
 include("views/communs/footer.php");
 ?>