<?php

include('views/communs/menu.php');

?>
 
 <h2 class='text-danger text-center' id='HEntree'><?php echo $search2 ?></h2>  

 <?php
//Ceci ce sont les cartes les menus de la page principal
echo "<div id='gestionCarte'>";
if($resultatModelRequete->rowCount()!=0)
{
    foreach($resultatModelRequete->fetchAll(PDO::FETCH_ASSOC) as $valeur)
    {
    
    
   

    $resultatIdRecette=modelSelectionnerIdRecetteIngredients($valeur[('idIngredients')]);

    foreach($resultatIdRecette->fetchAll(PDO::FETCH_ASSOC) as $valeur1)
    {
        
        $resultatRechercheRecette=modelRecupererRecetteRecherche($valeur1['idRecette']);
        foreach($resultatRechercheRecette->fetchAll(PDO::FETCH_ASSOC) as $valeur2)
        {
            echo  "<div class='card' style='width: 18rem;'>";
            echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur2[idRecette]' class='classPagePrincipal'>";
            echo  "<img class='card-img-top' src=$valeur2[Photo] alt='Card image cap'>";
            echo "<h5 class='card-title center'>$valeur2[Nom]</h5>";
            echo  "<div class='card-body'>";
            echo  "<p class='card-text'>$valeur2[Decrire]</p>";
            echo "</a>";
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
            
            echo "</div>";
           
        }
   
    echo "<br>";
    }
    }
}
elseif ($resultatRechercheRecette->rowCount()!=0) 
 
{
    foreach($resultatRechercheRecette->fetchAll(PDO::FETCH_ASSOC) as $valeur2)
    {
        echo  "<div class='card' style='width: 18rem;'>";
        echo  "<a class='text-dark' href='controllerVisiteur/descriptionRecettePlusComplete/$valeur2[idRecette]' class='classPagePrincipal'>";
        echo  "<img class='card-img-top' src=$valeur2[Photo] alt='Card image cap'>";
        echo "<h5 class='card-title center'>$valeur2[Nom]</h5>";
        echo  "<div class='card-body'>";
        echo  "<p class='card-text'>$valeur2[Decrire]</p>";
        echo "</a>";
        echo "<br>";
        //echo "<i id='bouton1' onclick='changeIcon()' class='bi bi-heart btn '></i>";
        if(isset($_SESSION['Prenom']))
        {
            
            $idUtilisateur=modelRecupererIdDeSession($_SESSION['idUtilisateur']);
            foreach( $idUtilisateur->fetchAll(PDO::FETCH_NUM) as $valeur)
            {

              $valeuridUtilisateur= $valeur[0];
              $resultatSelectionnerSiFavorisActiveOuPas=modelSelectionnerSiFavorisActiveOuPas($valeur2['idRecette'],$_SESSION['idUtilisateur']);
              
              $nombrResultatSelectionnerSiFavorisActiveOuPase=$resultatSelectionnerSiFavorisActiveOuPas->rowCount();

              if($nombrResultatSelectionnerSiFavorisActiveOuPase==0)
              {
                    echo " <i data-idRecette='$valeur2[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' ></i>";
              }
              else
              {
                    echo " <i data-idRecette='$valeur2[idRecette]' data-idUtilisateur='$valeur[0]' class=' heart bi bi-heart btn ' style='background-color:#ff123f;' ></i>";
              }

            }
           
        }
        echo "</div>";
        //echo "</a>";
        echo "</div>";
    }
}

else
{
    ?>
    
    <script type="text/javascript">
        document.getElementById("HEntree").textContent="Aucun résultat à votre recherche";
    </script>

    <?php
}
    




?>
</div>
<br>

<?php


    include('views/communs/footer.php');
?>

