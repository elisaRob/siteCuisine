<?php

include('views/communs/menu.php');

/*if(isset($message))
{
    echo $message;
}  */

$convsertionId=$idRecette;
?>

<h2 class="text-uppercase text-center mb-5">Choisir ce que vous voulez modifier</h2>
<p>Cliquez sur ce que vous voulez modifier</p>

<br>
<br>


<table class="table table-striped table-bordered "  >
    <thead class="table-danger">
        <tr>
            <th>Nom </th>
            <th>Photo </th>
            <th>Description </th>
            <th>Niveau de difficultés</th>
            <th>Temps de préparation</th>
            <th>Types de plats</th>
            <th>Cout de la Recette</th>
            <!--<th>Etapes de la recette</th>
            <th>Modifier les ingrédients</th>-->

            
         
            
        </tr>
    </thead>

<?php
/*$ligne = $resultat->fetchAll(PDO::FETCH_NUM);
echo "<tr>";
foreach($ligne as $valeur)
{ 
 
    echo " <td>$valeur[0]</td>";
    //echo " <td>$valeur[1]</td>";
    echo "<td><img src=$valeur[1] height='100' width='200'></td>";
    echo " <td>$valeur[2]</td>";
	
   
   
   */

   $ligne = $resultatAfficherUneRecette->fetchAll(PDO::FETCH_ASSOC);
echo "<tr>";
foreach($ligne as $valeur)
{ 
 
    echo " <td>$valeur[Nom]</td>";
    //echo " <td>$valeur[1]</td>";
    echo "<td><img src=$valeur[Photo] height='100' width='200'></td>";
    echo " <td>$valeur[Decrire]</td>";
	echo " <td>$valeur[idNiveauDeDifficultes]<br><br><br> (rappel:niveau 1:facile  niveau2:moyen  niveau3:difficile)</td>";
    echo "<td>$valeur[TempsPreparation]</td>";
}

$pourUnForeach=$resultatRecupererTypesDePlats->fetchall(PDO::FETCH_NUM);

foreach($pourUnForeach as $valeur)
{
    $resultatAfficherTypeDePlat=modelAfficherTypesDePlats($valeur[0]);
    $pourDeuxForeach=$resultatAfficherTypeDePlat->fetchall(PDO::FETCH_ASSOC);
    foreach($pourDeuxForeach as $valeur1)
    {
        echo "<td>$valeur1[categorie]</td>";
    }
}

$resultatAfficherCoutDeLaRecette=modelSelectionnerCoutDeLaRecetteAvEcIdRecette($convsertionId);
foreach($resultatAfficherCoutDeLaRecette->fetchall(PDO::FETCH_ASSOC) as $valeur)
{
    echo "<td>$valeur[budget]</td>";
}

/*$resultatAfficherEtapeRecette=afficherEtapeAvecIdRecette($convsertionId);
$pourTroisForeach=$resultatAfficherEtapeRecette->fetchall(PDO::FETCH_NUM);
foreach($pourTroisForeach as $valeur)
{
    echo "<td>$valeur[0]</td>";
}*/
   
?>

</tr>



<tr>
            <td><button  type="button" class="btn btn-success "><a class="text-dark" href='controllerAdmin/pageModificationNomRecette/<?=$convsertionId?>'>Modifier le nom</a></button></td> 
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModificationPhotoRecette/<?=$convsertionId?>'>Modifier la Photo</a></button></td> 
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModificationDescriptionRecette/<?=$convsertionId?>'>Modifier la Description </a></button></td>
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModificationNiveauDeDifficultesRecette/<?=$convsertionId?>'>Modifier le niveau de difficultés </a></button></td>
            <td><button type="button" class="btn btn-success"><a class="text-dark"href="controllerAdmin/pageModificationTempsDePreparation/<?=$convsertionId?>">Modifier le temps de préparation de la recette</a></button></td>
            <td><button  type="button" class="btn btn-success "><a class="text-dark" href='controllerAdmin/pageModificationTypesDePlat/<?=$convsertionId?>'>Pour modifier le types de plats de la recette cliquez ici</a></button></td>
            <td><button  type="button" class="btn btn-success "><a class="text-dark" href='controllerAdmin/pageModificationCoutDeLaRecette/<?=$convsertionId?>'>Pour modifier le cout de la recette cliquez ici</a></button></td>  

            
        
       
        </tr>



<?php

	echo "<tr>";
//}
echo "</table></center>";



?>

<br>
<br>
<td><button type='button' class='btn btn-success'><a class='text-dark' href="controllerAdmin/recupererEtapeRecette/<?=$conservationId?>">Pour modifier les étapes cliquez ici</a></button></td>
<br>
<br>
<td><button type='button' class='btn btn-success' ><a class='text-dark' href='controllerAdmin/recupereridIngredientDeLaRecette/<?=$conservationId?>'>Pour modifier les ingrédients cliquez ici</a></button></td>
<br>
<br>
<td><button type='button' class='btn btn-success'><a class='text-dark' href="controllerAdmin/recupererNombreIngredient/<?=$conservationId?>">Pour modifier le nombre d'ingrédients cliquez ici</a></button></td>
<br>
<br>
<td><button type='button' class='btn btn-success'><a class='text-dark' href="controllerAdmin/recupererUstensileDeLaRecette/<?=$conservationId?>">Pour modifier les ustensiles cliquez ici</a></button></td>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div> <a href='controllerEspaceMembre/pageAdmin' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
</div>

<br>

<div> <a href='controllerAdmin/afficherToutesLesRecettes' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la liste des recettes</a>
</div>



<?php


require('views/communs/footer.php');

?>