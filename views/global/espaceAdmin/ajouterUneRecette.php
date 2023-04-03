<?php

//include("vues/communs/menu.php");
//include('models/espaceAdmin/connexionBdd.php');
include('views/communs/menu.php');




?>
<section  class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter une Recette</h2>

            
              <br>
              <!--<form action="controllerAdmin/recupererIdIngredient" method="post" enctype="multipart/form-data" >-->
             <!--<form action="" method="post" enctype="multipart/form-data" >-->
              <form action="controllerAdmin/ajouterUneRecette" onsubmit="return validationFormulaire()" method="post" enctype="multipart/form-data" >
              
             

                <div class="form-outline mb-4">
                  <input type="text" id="nomRecette" name="nomRecette" class="form-control form-control-lg" >
                  <label class="form-label" for="nomRecette">Nom de la Recette</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="file" id="photoRecette" name="img" class="form-control form-control-lg" >
                  <label class="form-label" for="photoRecette">Photo de la Recette</label>
                </div>

                <div class="form-outline mb-4">
                  <textarea type="textarea" id="descriptionRecette" name="descriptionRecette" class="form-control form-control-lg" rows="10" cols="30" ></textarea>
                  <label class="form-label" for="descriptionRecette">Description de la Recette</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="number" id="niveauDeDifficultes" value="required" min="1" max="3" name="niveauDeDifficultes" class="form-control form-control-lg" >
                  <label class="form-label" for="niveauDeDifficultes">Choisir niveau de difficultes de la Recette (mettre 1 pour Facile  2:Moyen  3:Difficile</label>
                </div>

                
                <?php

                $resultAfficherTousLesIngredients = ModeleAfficherTousLesIngredients();

                //$ligne = $resultAfficherTousLesIngredients->fetchAll(PDO::FETCH_NUM);
                $ligne = $resultAfficherTousLesIngredients->fetchAll(PDO::FETCH_ASSOC);

                echo "<label for=''>Ajouter les ingrédients de la recette</label>";
                echo "<br>";
                echo "<br>";
                echo "<br>";

                echo "<div id='ajoutIngredient'>";


                foreach($ligne as $valeur)
                {
                    echo  "<input type='checkbox' id='ingredient'  name='ingredientsRecette[]' value=$valeur[nomIngredients]>";
                    echo" <label for='ingredient'>$valeur[nomIngredients]</label>";
                    echo "<br>";
                }
                echo "</div>";
                ?>
                <br>

                <div class='form-outline mb-4'>
                  <label class="form-label" for='ingredient1'>Ajouter votre ingrédient si il ne se trouve pas sur la liste</label>
                  <input type='text' id='ingredient1' name='ingredient1' value=''><button onclick='ajoutIngredient()' type='button'>ok</button></input>
                </div>
                <br>

                
                  
                  <?php
                    echo "<label>Dites moi les ustensiles utilisés pour votre recette</label>";
                    echo "<br>";
                    echo "<br>";

                    echo "<div id='pourRecupererJavascript'>";
                    $resultatAfficherUstensile=modelAfficherUstensile();
                    $deuxiemeResultatAfficherUstensile=$resultatAfficherUstensile->fetchall(PDO::FETCH_NUM);
                    foreach($deuxiemeResultatAfficherUstensile as $valeur)
                    {
                      echo "<input type='checkbox' id='ustensile' name='ustensileAfficher[]' value='$valeur[0]'>";
                      echo "<label>$valeur[0]</label>";
                      echo "<br>";
                    }
                    echo "</div>";
                    echo "<br>"; 

                    echo "<label class='form-label' for='rajouterUstensiles'>Si l'ustensile ne se trouve pas dans la liste vous pouvez le rajouter ici,l'ustensile apparaitra en fin de liste.Pour les ustensiles à nom composés mettez un underscore exemple:presse_ail</label>";
                    echo "<input type='text' id='rajouterUstensiles'><button type='button' onclick='ajouterUstensiles()'>ok</button>";
                    

                  ?>
                
                <br>
                <br>
           
                

                <!--<div class="form-outline mb-4">
                    
                  <label class="form-label text-danger btn"><a href="controllerAdmin/pageAjouterIngredient">Cliquez ici pour ajouter de nouveaux ingrédients</a></label>
                </div>-->

                <label class="form-label" for="niveauDeDifficultes">A quelle catégorie de plat la recette appartient</label>
                <br>
                  <input type="radio" id="entree" name="categorieRecette" value="Entree"  >
                  <label class="form-label" for="entree">Entrée</label>
              
                  <input type="radio" id="menuPrincipal" name="categorieRecette" value="Menu_Principal" >
                  <label class="form-label" for="menuPrincipal">Menu Principal</label>

                  <input type="radio" id="dessert" name="categorieRecette" value="Dessert" >
                  <label class="form-label" for="dessert">Dessert</label>

                  <br>
                  <br>

                 <label for="nombreDeTemps">Combien de temps pour faire la recette</label>
                 <input type="text" id='nombreDeTemps' name='nombreDeTemps'>   

                 <br>
                 <br>

                 <label class="form-label" for="coutDeLaRecette">Quel est le coût de la recette:</label>
                 <br>
                 <input type="radio" id='bonMarche' name='coutDeLaRecette' value="Bon_marche">
                 <label class="form-label" for="bonMarche">Bon marché</label>

                 <input type="radio" id='coutMoyen' name='coutDeLaRecette' value="Cout_moyen">
                 <label class="form-label" for="coutMoyen">Coût moyen</label>

                 <input type="radio" id="assezCher" name='coutDeLaRecette' value="Assez_cher">
                 <label class="form-label" for="assezCher">Assez cher</label>

                 <br>
                 <br>
    
                  <div id='idParentPourJavascript'>
                  <label for="combienDeEtapes">Dites combien la recette comporte d'étapes(Mettez un nombre et cliquez sur ok pour faire apparaitre le nombre d'étape)</label>
                  <input id="combienDeEtapes"  type="text"><button type="button" onclick='recuperationDuNombreDetapes()'>ok</button>

                  <br>
                  
                  

                  </div>
                  

                  

                  <br>
                  <br>
                

             

               

                

                <!--<div class="d-flex justify-content-center">
                  <button type="submit"name="ajouterUneRecette"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ajouter</button>
                </div>-->

                <div class="d-flex justify-content-center">
                  <button type="submit"name="ajouterUneRecette"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Passez à l'étape suivante</button>
                </div>

                <br>

                <a class="d-flex justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body"  href="controllerAdmin/pageAccueil">Revenir à la page d'accueil admin</a>

               

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--
  <div class="form-outline mb-4">
    <textarea type="textarea" id="descriptionRecette" name="descriptionRecette" class="form-control form-control-lg" rows="10" cols="30" ></textarea>
     <label class="form-label" for="descriptionRecette">Description de la Recette</label>
  </div>
-->

<script>
  
  function recuperationDuNombreDetapes()
  {
    
   
    var recupererNombre=document.getElementById('combienDeEtapes').value;
    var indexationPourLeWhileEtAfficherEtapes =1;
    var recupererNombre1=parseInt(recupererNombre);
    
    while(recupererNombre1>=indexationPourLeWhileEtAfficherEtapes)
    {
      
      var idParent=document.getElementById('idParentPourJavascript');
      var creationNouveauDiv=document.createElement('div');
      var creationNouveauTextArea=document.createElement('textarea');
      var creationNouveauBr=document.createElement('br');
      var creationNouveauLabel=document.createElement('label');
    
      //var descriptionRecette

      creationNouveauDiv.appendChild(creationNouveauBr);
      creationNouveauLabel.appendChild(document.createTextNode('Etape'+' '+indexationPourLeWhileEtAfficherEtapes));
      idParent.appendChild(creationNouveauDiv);
      creationNouveauDiv.appendChild(creationNouveauLabel);
      creationNouveauDiv.appendChild(creationNouveauBr);
      creationNouveauDiv.appendChild(creationNouveauTextArea);
    
      creationNouveauTextArea.rows='10';
      creationNouveauTextArea.cols='50';
      creationNouveauTextArea.type='textarea';
      creationNouveauTextArea.name='etape[]';
      indexationPourLeWhileEtAfficherEtapes=indexationPourLeWhileEtAfficherEtapes+1;
    }
    

  }

  function ajoutIngredient()
  {
    var idDuDiv=document.getElementById('ajoutIngredient');
    var nouveauInput=document.createElement('input');
    var nouveauLabel=document.createElement('label');
    var recupererValeurInput=document.getElementById('ingredient1').value;
    var nouveauSautDeLigne=document.createElement('br');

    idDuDiv.appendChild(nouveauInput);
    idDuDiv.appendChild(nouveauLabel);
    nouveauLabel.appendChild(document.createTextNode(recupererValeurInput));
    idDuDiv.appendChild(nouveauSautDeLigne);

    nouveauInput.type='checkbox';
    nouveauInput.id='ingredientAjout';
    nouveauInput.name='ingredientAjout[]';
    nouveauInput.value=recupererValeurInput;

    nouveauLabel.for='ingredientAjout';
  }

  function validationFormulaire()
  {
    var recupererNom=document.getElementById('nomRecette').value;
    var recupererDescription=document.getElementById('descriptionRecette').value;
    var recupererDifficulte=document.getElementById('niveauDeDifficultes');
    var recupererDifficulteValue=recupererDifficulte.value;
    
    if(recupererNom=="")
    {
      alert('Entrez le nom s\'il vous plait');
      return false;
    }

    if(recupererDescription=="")
    {
      alert("Entrez quelque chose dans la description s'il vous plait");
      return false;
    }

    
  }
   
  function ajouterUstensiles()
  {
    var nouveauInputUstensiles=document.createElement('input');
    var nouveauLabelUstensiles=document.createElement('label');
    var recupererDivIdUstensiles=document.getElementById('pourRecupererJavascript');
    var recupererValueInput=document.getElementById('rajouterUstensiles').value;
    var nouveauSautALaLigne=document.createElement('br');

    recupererDivIdUstensiles.appendChild(nouveauInputUstensiles);
    recupererDivIdUstensiles.appendChild(nouveauLabelUstensiles);
    nouveauLabelUstensiles.appendChild(document.createTextNode(recupererValueInput));
    recupererDivIdUstensiles.appendChild(nouveauSautALaLigne);

    nouveauInputUstensiles.type='checkbox';
    nouveauInputUstensiles.id='rajouterUstensiles1';
    nouveauInputUstensiles.name='rajouterUstensiles1[]';
    nouveauInputUstensiles.value=recupererValueInput;

    nouveauLabelUstensiles.for='rajouterUstensiles1';

  }
   
</script>





