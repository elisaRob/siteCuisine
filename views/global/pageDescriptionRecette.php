<?php

include('views/communs/menu.php');

$conservation=$idRecette;

//echo "<div id='gestionCarte'>";
?>

<div style=' margin-left: 15%;
    margin-right: 15%;'>


<?php
foreach($resultatRecupererDescriptionPlusCompleteDeLaRecette->fetchAll(PDO::FETCH_ASSOC) as $valeur)
{
    echo  "<h2 class='text-danger text-center'id='HEntree' >$valeur[Nom]</h2>";
    echo "<br>";
    echo  "<img class='img-fluid  rounded mx-auto d-block' src=$valeur[Photo] alt='photo'>";

    echo "<br>";
               
}
?>
<br>


<div style='display:flex; justify-content:space-evenly;'>
<?php
    foreach($resultatPourForeach1 as $valeur)
    {
        $recupererNiveauDeDifficultesAPartirDeLIdNiveauDeDifficulte=modelSelectionnerNiveauDeDifficultes($valeur[0]);
        $resultatPourForeach4=$recupererNiveauDeDifficultesAPartirDeLIdNiveauDeDifficulte->fetchall(PDO::FETCH_NUM);
        foreach($resultatPourForeach4 as $nombre)
        {
            echo "<div>";
            echo "<p class='text-danger 'id='HEntree'>Niveau de difficultes: $nombre[0] </p>";
            echo "</div>";
        }
        
    }
    foreach($resultatTempsPreparationDeLaRecette->fetchall(PDO::FETCH_NUM) as $valeur)
    {
        echo "<div>";
        echo "<p class='text-danger' id='HEntree'>Temps de préparation: $valeur[0]<p>";
        echo "</div>";
    }

    $selectionerCoutDeLaRecette=modelSelectionnerCoutDeLaRecetteAvEcIdRecette($conservation);
    $res=$selectionerCoutDeLaRecette->fetchall(PDO::FETCH_NUM);
    foreach($res as $valeur)
    {
        echo "<div>";
        $val1=strtr($valeur[0],array('_'=>' '));
        
        echo "<p class='text-danger' id='HEntree'>Cout de la recette:$val1</p>";
        echo "</div>";
    }

   
?>
</div>
<br>
<h2 class='text-danger text-center'id='HEntree' >Ingredients</h2>


<?php
/*foreach($resultatPourForeach as $valeur)
{
    $resultatRecupererIngredientDescriptifRecette=modelRecupererIngredientDeLaRecetteEnQuestion($valeur[0]);
    $resultat1PourForeach=$resultatRecupererIngredientDescriptifRecette->fetchall(PDO::FETCH_NUM);
    foreach($resultat1PourForeach as $valeur2)
    {
        //ça c'est pour enlever le _ et le remplacer par espace vide
        $valeur3=strtr($valeur2[0],array('_'=>' '));
        
            echo "<div style='display:flexbox;'>";
            echo  $valeur3;
            echo "</div>";
        
        
    }
    
}*/



foreach($resultatPourForeach2 as $valeur)
{
    
    $val2=strtr($valeur['nomIngredients'],array('_'=>' '));
    echo $valeur['nombreIngredients'];
    echo " ";
    echo $val2;
    echo  "<br>";
 
 
}


?>

<h2 class='text-danger text-center' id='HEntree'>Ustensiles</h2>
<?php
foreach($resultatPourForeach3 as $valeur)
{
    $val2=strtr($valeur[0],array('_'=>' '));
    
    echo $val2;
    echo  "<br>";
}

?>

<h2 class='text-danger text-center'id='HEntree' >Etapes de la recette</h2>
<?php
$nombreEtape=1;
foreach($resultatRecupererDescriptionEtapeRecette->fetchAll(PDO::FETCH_NUM) as $valeur1)
{
    

    echo "<h5 class='text-danger '>Etape numero $nombreEtape</h5>";
    echo "<p >$valeur1[0]</p>";
    echo "<br>";
    $nombreEtape=$nombreEtape+1;
    echo "<br>";
}



?>

    
</div>

