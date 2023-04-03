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
                <form action='controllerAdmin/supprimerOuAjouterUstensileDeLaRecetteEnQuestion/<?=$conservationId?>' method='post' >
                    <?php

                        $listeUstensilesDeLaRecette=$resultatListeUstensileDeLaRecette->fetchAll(PDO::FETCH_ASSOC);
                        foreach($listeUstensilesDeLaRecette as $valeur)
                        {   
                            
                                echo  "<input type='checkbox' id='ustensileASupprimer'  name='ustensileASupprimer[]' value=$valeur[nomUstensiles]>";
                                echo" <label for='ustensileASupprimer'>$valeur[nomUstensiles]</label>";
                                echo "<br>";
                            

                     
                        }
                        
                        ?>
                        <br>

                        <h2 class="text-uppercase text-center mb-5">Ajouter Ustensile à la Recette</h2>
                        <?php

                        echo "<div id='ajoutUstensile'>";

                        $resultAfficherTousLesUstensiles = modelAfficherUstensile();
                        $resultatAffichageUstensiles=$resultAfficherTousLesUstensiles->fetchAll(PDO::FETCH_ASSOC);
                        foreach($resultatAffichageUstensiles as $valeur1)
                        {
                            echo  "<input type='checkbox' id='ustensilesAAjouter'  name='ustensilesAAjouter[]' value=$valeur1[nomUstensiles]>";
                            echo" <label for='ustensilesAAjouter'>$valeur1[nomUstensiles]</label>";
                            echo "<br>";
                        }

                        ?>
                        </div>

                        <br>
                        <br>
                        <div  class="form-outline mb-4">
                          <label class="form-label" for="ustensile">Si vous souhaitez ajouter un ustensile(cliquez sur ok cela apparaitra en fin de liste)</label>
                          <input type="text" id="ustensile"name="ustensile"value=''  ><button onclick='ajouterUnUstensile()' type='button'>ok</button>
                        </div>

                  

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4" name="mettreAJourUstensileDeLaRecetteEnQuestion">Mettre à jour</button>
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
  function ajouterUnUstensile()
  {
    var recuperationDiv=document.getElementById('ajoutUstensile');
    var nouveauLabel=document.createElement('label');
    var nouveauInput=document.createElement('input');
    var recupererValueInput=document.getElementById('ustensile').value;
    var nouveauRetour=document.createElement('br');

    recuperationDiv.appendChild(nouveauInput);
    recuperationDiv.appendChild(nouveauLabel);
    nouveauLabel.appendChild(document.createTextNode(recupererValueInput));
    recuperationDiv.appendChild(nouveauRetour);

    nouveauInput.type='checkbox';
    nouveauInput.id='ustensileAAjouter';
    nouveauInput.name='ustensileAjout[]';
    nouveauInput.value=recupererValueInput;

    nouveauLabel.for='ustensileAAjouter';
  }
</script>