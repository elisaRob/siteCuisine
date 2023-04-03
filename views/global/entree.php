<?php

include('views/communs/menu.php');

?>
 
 <h2 class='text-danger text-center' id='HEntree'>Les entrées</h2>

<?php
//Ceci ce sont les cartes les menus de la page principal
echo "<div id='gestionCarte'>";

foreach($resultatRecupererIdRecetteDeToutesLesEntrees->fetchAll(PDO::FETCH_NUM) as $valeur)
{
    //echo $valeur[0];
    //echo '<br>';
  
    //echo $valeur[1];
    $resultatRecupererRecetteDeToutesLesEntrees=modelRecupererLesTroisPremieresEntrees($valeur[0]);
    $resultatV=$resultatRecupererRecetteDeToutesLesEntrees->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultatV as $valeur1)  
    {
         //echo $valeur1['Nom'];
         //echo "<img src=$valeur1[Photo] height='100' width='200'>";
        echo  "<div class='card' style='width: 18rem;'>";
        echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur1[idRecette]' class='classPagePrincipal'>";
        echo  "<img class='card-img-top' src=$valeur1[Photo] alt='photo'>";
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
        echo "</a>";
        echo "</div>";
      
    }
    //echo $resultatRecupererLesTroisPremieresRecetteDesEntree=modelRecupererLesTroisPremieresEntrees($valeur);

}

?>
</div>
<br>

 <?php
    include('views/communs/footer.php');
?>


