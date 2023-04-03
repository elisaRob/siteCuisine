<?php

    include('views/communs/menu.php');
   

?>
<section  class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Supprimer les ingrédients de la Recette</h2>
                <form action='controllerAdmin/supprimerOuAjouterIngredientDeLaRecetteEnQuestion/<?=$conservationId?>' method='post' >
                    <?php

                        $listeIngredientDeLaRecette=$selectionnerIngredientsDeLaRecette->fetchAll(PDO::FETCH_NUM);
                        foreach($listeIngredientDeLaRecette as $valeur)
                        {   
                            $afficherIngredientDeLaRecette=modelRecupererIngredientDeLaRecetteEnQuestion($valeur[0]);
                            $afficherIngredientDeLaRecette1=$afficherIngredientDeLaRecette->fetchAll(PDO::FETCH_ASSOC);
                            foreach($afficherIngredientDeLaRecette1 as $autre)
                            {
                                echo  "<input type='checkbox' id='ingredientASupprimer'  name='ingredientASupprimer[]' value=$autre[nomIngredients]>";
                                echo" <label for='ingredient'>$autre[nomIngredients]</label>";
                                echo "<br>";
                            }

                     
                        }
                        
                        ?>
                        <br>

                        <h2 class="text-uppercase text-center mb-5">Ajouter Ingredient de la Recette</h2>
                        <?php

                        echo "<div id='ajout'>";

                        $resultAfficherTousLesIngredients1 = ModeleAfficherTousLesIngredients();
                        $resultatAffichage=$resultAfficherTousLesIngredients1->fetchAll(PDO::FETCH_ASSOC);
                        foreach($resultatAffichage as $valeur1)
                        {
                            echo  "<input type='checkbox' id='ingredientAAjouter'  name='ingredientAAjouter[]' value=$valeur1[nomIngredients]>";
                            echo" <label for='ingredient'>$valeur1[nomIngredients]</label>";
                            echo "<br>";
                        }

                        ?>
                        </div>

                        <br>
                        <br>
                        <div  class="form-outline mb-4">
                          <label class="form-label" for="ingredient">Si vous souhaitez ajouter un ingrédient</label>
                          <input type="text" id="ingredient"name="ingredient"value=''  ><button onclick='ajouterIngredient()' type='button'>ok</button>
                        </div>

                  

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4" name="mettreAJourIngredientDeLaRecetteEnQuestion">Mettre à jour</button>
                        </div>


                  
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<script>
  function ajouterIngredient()
  {
    var recuperationId=document.getElementById('ajout');
    var creationNouveauInput=document.createElement('input');
    var creationNouveauLabel=document.createElement('label');
    var recupererValeurInput=document.getElementById('ingredient').value;
    var creationNouveauRetourALaLigne=document.createElement('br');

    recuperationId.appendChild(creationNouveauInput);
    recuperationId.appendChild(creationNouveauLabel);
    creationNouveauLabel.appendChild(document.createTextNode(recupererValeurInput));
    recuperationId.appendChild(creationNouveauRetourALaLigne);

    

    creationNouveauInput.type='checkbox';
    creationNouveauInput.id='idIngredientAAjoute';
    creationNouveauInput.name='ingredientAAjoute[]';
    creationNouveauInput.value=recupererValeurInput;

    

    creationNouveauLabel.for='idIngredientAAjoute';
  }
</script>