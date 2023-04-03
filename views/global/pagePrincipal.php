


<h2 class='text-danger text-center' id='HEntree'>Les entrées</h2>




<?php
//Ceci ce sont les cartes les menus de la page principal
echo "<div id='gestionCarte'>";

foreach($resultatRecupererIdRecetteDesEntrees->fetchAll(PDO::FETCH_NUM) as $valeur)
{
    //echo $valeur[0];
    //echo '<br>';
  
    //echo $valeur[1];
    $resultatRecupererLesTroisPremieresRecetteDesEntrees=modelRecupererLesTroisPremieresEntrees($valeur[0]);
    $resultatR=$resultatRecupererLesTroisPremieresRecetteDesEntrees->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultatR as $valeur1)
    {
         //echo $valeur1['Nom'];
         //echo "<img src=$valeur1[Photo] height='100' width='200'>";
        echo  "<div class='card ' style='width: 18rem;'>";
        echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur1[idRecette]' class='classPagePrincipal'>";
        echo  "<img class='card-img-top' src=$valeur1[Photo] alt='Card image cap'>";
        echo "<h5 class='card-title center'>$valeur1[Nom]</h5>";
        echo  "<div class='card-body'>";
        echo  "<p class='card-text'>$valeur1[Decrire]</p>";
        //echo " <i id='' onclick='changeIcon()' class='bi bi-heart btn ' ></i>";
        echo "</a>";
        echo "<br>";
        if(isset($_SESSION['Prenom']))
        {
            
            $idUtilisateur=modelRecupererIdDeSession($_SESSION['idUtilisateur']);
            foreach( $idUtilisateur->fetchAll(PDO::FETCH_NUM) as $valeur)
            {

              $valeuridUtilisateur= $valeur[0];
              $resultatSelectionnerSiFavorisActiveOuPas=modelSelectionnerSiFavorisActiveOuPas($valeur1['idRecette'],$_SESSION['idUtilisateur']);
              
              $nombrResultatSelectionnerSiFavorisActiveOuPase=$resultatSelectionnerSiFavorisActiveOuPas->rowCount();

              if($nombrResultatSelectionnerSiFavorisActiveOuPase==0)
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' ></i>";
              }
              else
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' style='background-color:#ff123f;' ></i>";
              }
              

            }
           
        }
       

        //<i class='bi bi-heart btn ' id="php echo $valeur1['idRecette']"  ></i>
   
        echo "</div>";
        
        echo "</div>";
      
    }
    //echo $resultatRecupererLesTroisPremieresRecetteDesEntree=modelRecupererLesTroisPremieresEntrees($valeur);

}
?>


</div>
<a href='controllerVisiteur/affichagePageEntree'class='btn text-danger classMenu'>pour voir plus d'entrée cliquez ici</a>
<hr>
<br>
<h2 class='text-danger text-center' id='HEntree'>Plats Principaux</h2>

<?php

echo "<div id='gestionCarte'>";

foreach($modelRecupererLesTroisPremiersPlatsPrincipaux->fetchAll(PDO::FETCH_NUM) as $valeur)
{
  
    $modelRecupererIdRecetteDesPlatsPrincipaux=modelRecupererLesTroisPremiersPlatsPrincipaux($valeur[0]);
    $resultatT=$modelRecupererIdRecetteDesPlatsPrincipaux->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultatT as $valeur1)
    {
        
        echo  "<div class='card' style='width: 18rem;'>";
        echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur1[idRecette]' class='classPagePrincipal'>";
        echo  "<img class='card-img-top' src=$valeur1[Photo] alt='Card image cap'>";
        echo "<h5 class='card-title center'>$valeur1[Nom]</h5>";
        echo  "<div class='card-body'>";
        echo  "<p class='card-text'>$valeur1[Decrire]</p>";
        echo "</a>";
        echo "<br>";
        if(isset($_SESSION['Prenom']))
        {
            
            $idUtilisateur=modelRecupererIdDeSession($_SESSION['idUtilisateur']);
            foreach( $idUtilisateur->fetchAll(PDO::FETCH_NUM) as $valeur)
            {

              $valeuridUtilisateur= $valeur[0];
              $resultatSelectionnerSiFavorisActiveOuPas=modelSelectionnerSiFavorisActiveOuPas($valeur1['idRecette'],$_SESSION['idUtilisateur']);
              
              $nombrResultatSelectionnerSiFavorisActiveOuPase=$resultatSelectionnerSiFavorisActiveOuPas->rowCount();

              if($nombrResultatSelectionnerSiFavorisActiveOuPase==0)
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' ></i>";
              }
              else
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' style='background-color:#ff123f;' ></i>";
              }

            }
           
        }
        echo "</div>";
        //echo "</a>";
        echo "</div>";
      
    }
 

}
?>


</div>
<a href="controllerVisiteur/affichagePagePlatsPrincipaux"class='btn text-danger classMenu'>pour voir plus de plats principaux cliquez ici</a>

<hr>
<br>
<h2 class='text-danger text-center' id='HEntree'>Dessert</h2>

<?php

echo "<div id='gestionCarte'>";

foreach($resultatRecupererIdRecetteDesTroisPremiersDessert->fetchAll(PDO::FETCH_NUM) as $valeur)
{
    
    $resultatRecupererLesTroisPremieresDessert=modelRecupererLesTroisPremiersDessert($valeur[0]);
    $resultatU=$resultatRecupererLesTroisPremieresDessert->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultatU as $valeur1)
    {

        echo  "<div class='card' style='width: 18rem;'>";
        echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur1[idRecette]' class='classPagePrincipal'>";
        echo  "<img class='card-img-top' src=$valeur1[Photo] alt='Card image cap'>";
        echo "<h5 class='card-title center'>$valeur1[Nom]</h5>";
        echo  "<div class='card-body'>";
        echo  "<p class='card-text'>$valeur1[Decrire]</p>";
        echo "</a>";
        echo "<br>";
        if(isset($_SESSION['Prenom']))
        {
            
            $idUtilisateur=modelRecupererIdDeSession($_SESSION['idUtilisateur']);
            foreach( $idUtilisateur->fetchAll(PDO::FETCH_NUM) as $valeur)
            {

              $valeuridUtilisateur= $valeur[0];
              $resultatSelectionnerSiFavorisActiveOuPas=modelSelectionnerSiFavorisActiveOuPas($valeur1['idRecette'],$_SESSION['idUtilisateur']);
              
              $nombrResultatSelectionnerSiFavorisActiveOuPase=$resultatSelectionnerSiFavorisActiveOuPas->rowCount();

              if($nombrResultatSelectionnerSiFavorisActiveOuPase==0)
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' ></i>";
              }
              else
              {
                    echo " <i data-idRecette='$valeur1[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' style='background-color:#ff123f;' ></i>";
              }

            }
           
        }
        echo "</div>";
        //echo "</a>";
        echo "</div>";
      
    }
  

}

?>

</div>
<a href="controllerVisiteur/affichagePageDessert" class='btn text-danger classMenu'>pour voir plus de dessert cliquez ici</a>




    