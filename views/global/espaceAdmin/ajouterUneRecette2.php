<?php


include('views/communs/menu.php');

$conservationId=$idRecette;

?>

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter un le nombre d'ingrédients</h2>

              <!--<form action="../../../controllers/espaceAdmin/controllerAjouterUtilisateur.php?action=ajouterUnUtilisateur()" method="post">-->
              <!--<form action="index.php?action=controllerAjouterUtilisateur/ajouterUnUtilisateur" method="post">-->
              <!--<form action="controllerAjouterUtilisateur.php/ajouterUnUtilisateur()" method="post">-->
              <form action="controllerAdmin/nombreIngredient/<?= $conservationId ?>" method="post" enctype="multipart/form-data">

              <?php

              $resultat=recupererIngredientsDeLaRecetteAdequate($conservationId);
              $result=$resultat->fetchall(PDO::FETCH_NUM);

              foreach($result as $valeur)
              {
                echo "<input type='text' id='nombreIngredients' name='nombreIngredients[]'>";
                echo "<label for='nombreIngredients'>$valeur[0]</label>";
                echo "<input type='hidden' name='result[]' value='$valeur[0]'>";
                echo "<br>";
                echo "<br>";

                
              }
              echo "<br>"; 

              ?>

              <br>

                <div class="d-flex justify-content-center">
                    <button type="submit"name="ajouterNombreIngredient"
                     class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ajouter une recette</button>
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