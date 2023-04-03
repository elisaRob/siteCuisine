<?php

include('views/communs/menu.php');

if(isset($message))
{
    echo $message;
}  

$conservationId=$idUtilisateur;
?>

<h2 class="text-uppercase text-center mb-5">Choisir ce que vous voulez modifier</h2>
<p>Cliquez sur ce que vous voulez modifier</p>

<br>
<br>


<table class="table table-striped table-bordered "  >
    <thead class="table-danger">
        <tr>
            <th>Nom </th>
            <th>Prenom </th>
            <th>Mail </th>
            <th>si 0 non admin si 1 admin</th>
            <th>email valider ou pas(si 1 valider)</th>
            
        
       
        </tr>
    </thead>

<?php
$ligne = $resultatAfficherUnUtilisateur->fetchAll(PDO::FETCH_NUM);
echo "<tr>";
foreach($ligne as $valeur)
{ 
    echo " <td>$valeur[0]</td>";
    echo " <td>$valeur[1]</td>";
    echo " <td>$valeur[2]</td>";
    echo " <td>$valeur[3]</td>";
    echo " <td>$valeur[4]</td>";
	
   
   
   
?>
<tr>
            <td><button  type="button" class="btn btn-success "><a class="text-dark" href='controllerAdmin/pageModifierNom/<?=$conservationId?>'>Modifier le nom</a></button></td> 
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModifierPrenom/<?=$conservationId?>'>Modifier le Prenom</a></button></td> 
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModifierMail/<?=$conservationId?>'>Modifier le Mail </a></button></td>
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModifierAdmin/<?=$conservationId?>'>Modifier si admin ou non</a></button></td>
            <td><button  type="button" class="btn btn-success"><a class="text-dark" href='controllerAdmin/pageModifierValidation/<?=$conservationId?>'>Modifier etat de validation de l'email</a></button></td>
            
        
       
        </tr>


<!--<td><a href="controllerAdmin/pagemodifierUtilisateur/?=$valeur[0]?>">Modifier</a></td>
<td><a href="controllerAdmin/pagemodifierUtilisateur/?=$valeur[0]?>">Supprimer</a></td>-->

<?php

	echo "<tr>";
}
echo "</table></center>";

?>

<div> <a href='controllerEspaceMembre/pageAdmin' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
</div>

<br>

<div> <a href='controllerAdmin/afficherTousLesUtilisateurs' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la liste des utilisateurs</a>
</div>



<?php


require('views/communs/footer.php');

?>