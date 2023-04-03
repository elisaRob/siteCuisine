<?php

//include('controllerAdmin/pageConnexionBdd');
require_once('models/connexionBdd.php');



//requete table Utilisateur



function modelAjouterUnUtilisateur($nom,$prenom,$mail,$motDePasse,$estSuperAdmin,$aleatoire,$valida)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO utilisateur(Nom,Prenom,Mail,MotDePasse,EstSuperAdmin,Aleatoire,Valida) VALUES( :nom, :prenom , :mail , :motDePasse, :estSuperAdmin,:aleatoire, :valida)');
    $requete->bindvalue(':nom',$nom);
    $requete->bindvalue(':prenom',$prenom);
    $requete->bindvalue(':mail',$mail);
    $requete->bindvalue(':motDePasse',$motDePasse);
    $requete->bindvalue(':estSuperAdmin',$estSuperAdmin);
    $requete->bindvalue(':aleatoire',$aleatoire);
    $requete->bindvalue(':valida',$valida);
    //$requete->bindvalue(':idCout',$idCout);

   

    $resultat=$requete->execute();
    //$resultat=$bddPDO->lastInsertId();
    return $resultat;
    
}

function changerValidaSiAdminVrai($valida,$idUtilisateur)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('UPDATE vosrecettes.utilisateur SET Valida=:valida WHERE idUtilisateur=:idUtilisateur');
    $requete->bindvalue(':valida',$valida);
    $requete->bindvalue(':idUtilisateur',$idUtilisateur);

    $resultat=$requete->execute();
   
    return $resultat;
}


function selectionerTousEmail($mail)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('SELECT Mail FROM utilisateur WHERE Mail= ?') ;
    

    $requete->execute(array($mail));
    return $requete;
    //$requete->closeCursor();

}

function ModeleAfficherTousLesUtilisateurs()
{
    $bddPDO=connexionBDD();
    $requete='SELECT * FROM utilisateur ORDER BY Nom ASC';
   // $requete=$bddPDO->prepare('SELECT * FROM utilisateur ORDER BY Nom ASC');

    $resultatAfficherTousLesUtilisateurs = $bddPDO->query($requete);
	return $resultatAfficherTousLesUtilisateurs;
    $resultatAfficherTousLesUtilisateurs->closeCursor();
}

function modeleAfficherUnUtilisateur($idUtilisateur)
{
    $bddPDO=connexionBDD();
    $requete = "SELECT Nom,Prenom,Mail,EstSuperAdmin,Valida FROM utilisateur WHERE idUtilisateur = $idUtilisateur";
	$result = $bddPDO->query($requete);
	//$resultat = $result->fetch(PDO::FETCH_ASSOC);
   
    return $result;
}

function modeleModifierUtilisateurParSonNom($idUtilisateur,$nom)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET Nom=:nom WHERE idUtilisateur=:idUtilisateur' );
	$update->bindvalue(':nom',$nom);
    $update->bindvalue(':idUtilisateur',$idUtilisateur);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierUtilisateurParSonPrenom($idUtilisateur,$prenom)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET Prenom=:prenom WHERE idUtilisateur=:idUtilisateur' );
	$update->bindvalue(':prenom',$prenom);
    $update->bindvalue(':idUtilisateur',$idUtilisateur);
   

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierUtilisateurParSonMail($idUtilisateur,$mail)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET Mail=:mail WHERE idUtilisateur=:idUtilisateur' );
	$update->bindvalue(':mail',$mail);
    $update->bindvalue(':idUtilisateur',$idUtilisateur);
   

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierUtilisateurParSonAdmin($idUtilisateur,$admin)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET EstSuperAdmin=:estSuperAdmin WHERE idUtilisateur=:idUtilisateur' );
	$update->bindvalue(':estSuperAdmin',$admin);
    $update->bindvalue(':idUtilisateur',$idUtilisateur);
   

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierUtilisateurParSonValidation($idUtilisateur,$aleatoire,$validation)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET Valida=:valida, Aleatoire=:aleatoire  WHERE idUtilisateur=:idUtilisateur' );
	$update->bindvalue(':valida',$validation);
    $update->bindvalue(':aleatoire',$aleatoire);
    $update->bindvalue(':idUtilisateur',$idUtilisateur);
   

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleSupprimerUnUtilisateur($idUtilisateur)
{

	$bddPDO = connexionBDD();
	$requete = "DELETE  FROM utilisateur WHERE idUtilisateur = '$idUtilisateur' ";

	$result = $bddPDO->exec($requete);
	return $result;
}


//requete table Ingredient





function ModeleAfficherTousLesIngredients()
{
    $bddPDO=connexionBDD();
    $requete='SELECT * FROM ingredients ORDER BY nomIngredients ASC';
   // $requete=$bddPDO->prepare('SELECT * FROM utilisateur ORDER BY Nom ASC');

    $resultatAfficherTousLesIngredients = $bddPDO->query($requete);
	return $resultatAfficherTousLesIngredients;
    $resultatAfficherTousLesIngredients->closeCursor();
}

function modelAjouterIngredient($ingredient)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO ingredients(nomIngredients) VALUES(:nomIngredients)');
    $requete->bindvalue(':nomIngredients',$ingredient);
    $resultat=$requete->execute();
    return $resultat;
   
}

function modelRecupererIdIngredient($valeur)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM ingredients WHERE nomIngredients = '$valeur'";
    $result = $bddPDO->query($requete);
   
    return $result;
}



//requete table recette



function modelAjouterUneRecette($nom,$photo,$description,$idNiveauDeDifficultes,$tempsPreparation)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO recette(Nom,Photo,Decrire,idNiveauDeDifficultes,TempsPreparation) VALUES(:nom,:photo,:decrire,:idNiveauDeDifficultes,:tempsPreparation)');
    $requete->bindvalue(':nom',$nom);
    $requete->bindvalue(':photo',$photo);
    $requete->bindvalue(':decrire',$description);
    $requete->bindvalue(':idNiveauDeDifficultes',$idNiveauDeDifficultes);
    $requete->bindvalue(':tempsPreparation',$tempsPreparation);
    

    $resultat=$requete->execute();
    $resultat=$bddPDO->lastInsertId();
   
    return $resultat;
    $requete->closeCursor();
}

function ModeleAfficherToutesLesRecettes()
{
    $bddPDO=connexionBDD();
    $requete='SELECT * FROM recette ORDER BY Nom ASC';
  

    $resultatAfficherToutesLesRecettes = $bddPDO->query($requete);
	return $resultatAfficherToutesLesRecettes;
    $resultatAfficherToutesLesRecettes->closeCursor();
}

function modeleAfficherUneRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete = "SELECT Nom,Photo,Decrire,idNiveauDeDifficultes,TempsPreparation FROM recette WHERE idRecette = $idRecette";
	$result = $bddPDO->query($requete);

   
    return $result;
}

function modeleModifierRecetteParSonNom($idRecette,$nom)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.recette  SET Nom=:nom WHERE idRecette=:idRecette' );
	$update->bindvalue(':nom',$nom);
    $update->bindvalue(':idRecette',$idRecette);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierRecetteParSaDescription($idRecette,$description)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.recette  SET Decrire=:decrire WHERE idRecette=:idRecette' );
	$update->bindvalue(':decrire',$description);
    $update->bindvalue(':idRecette',$idRecette);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierRecetteParSonNIveauDeDifficultes($idRecette,$niveauDeDifficultes)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.recette  SET idNiveauDeDifficultes=:idNiveauDeDifficultes WHERE idRecette=:idRecette' );
	$update->bindvalue(':idNiveauDeDifficultes',$niveauDeDifficultes);
    $update->bindvalue(':idRecette',$idRecette);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleModifierRecetteParSaPhoto($idRecette,$photoRecette)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.recette  SET Photo=:photo WHERE idRecette=:idRecette' );
	$update->bindvalue(':photo',$photoRecette);
    $update->bindvalue(':idRecette',$idRecette);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modeleSupprimerUneRecette($idRecette)
{

	$bddPDO = connexionBDD();
	$requete = "DELETE  FROM recette WHERE idRecette = '$idRecette' ";

	$result = $bddPDO->exec($requete);
	return $result;
}

function modelModifierEtapeDUNERecette($idRecette,$idEtape,$descriptif)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.etape SET descriptif=:descriptif WHERE idEtape=:idEtape AND idRecette=:idRecette ');
    $update->bindvalue(':descriptif',$descriptif);
    $update->bindvalue(':idEtape',$idEtape);
    $update->bindvalue(':idRecette',$idRecette);

    $resultatUpdate=$update->execute();
    return $resultatUpdate;

    $resultatUpdate->closeCursor();
}

function modelModifierTempsDePreparationDeLaRecette($idRecette,$tempsPreparation)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("UPDATE vosrecettes.recette SET TempsPreparation=:tempsPreparation WHERE idRecette=:idRecette");
    $requete->bindvalue('tempsPreparation',$tempsPreparation);
    $requete->bindvalue('idRecette',$idRecette);

    $resultat=$requete->execute();
    return $resultat;
    
}

function modelInsererIdCoutDansIdRecetteSpecifique($idCout,$idRecette)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('UPDATE vosrecettes.recette SET idCout=:idCout WHERE idRecette=:idRecette');
    $requete->bindvalue('idCout',$idCout);
    $requete->bindvalue('idRecette',$idRecette);
    
   
   
    $resultat=$requete->execute();

    return $resultat;
    $requete->closeCursor();
}





//requete table recette_ingredient


function modelInsererIdIngredienEtIdRecettetDansLaTableRecetteIngredient($valeur,$idRecette)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO recette_ingredients(idIngredients,idRecette) VALUES(:idIngredients,:idRecette)');
    $requete->bindvalue(':idIngredients',$valeur);
    $requete->bindvalue(':idRecette',$idRecette);
    $resultat=$requete->execute();

    return $resultat;


}

function modeleSupprimerIdRecettePourLaTableRecetteIngredient($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM recette_ingredients WHERE idRecette='$idRecette'";

    $result=$bddPDO->exec($requete);
    return $result;
}


function modelRecupererIdIngredientDeLaRecetteIngredient($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM recette_ingredients WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();
}


function modelSupprimerIngredientDeLaRecetteEnQuestion($idIngredients)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM recette_ingredients WHERE idIngredients='$idIngredients'";

    $resultatRequete=$bddPDO->exec($requete);
    return $resultatRequete;
    $resultatRequete->closeCursor();
}

function ajouterIngredientDeLaRecetteSelectionner($idIngredient,$idRecette)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("INSERT INTO recette_ingredients(idIngredients,idRecette) VALUES( :idIngredients,:idRecette)");
    $requete->bindvalue(':idIngredients',$idIngredient);
    $requete->bindvalue(':idRecette',$idRecette);
    $resultat=$requete->execute();
    return $resultat;

}

function modelModifierNombreIngredients($idRecette,$nombreIngredients,$idIngredients)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("UPDATE recette_ingredients SET nombreIngredients=:nombreIngredients  WHERE idRecette=:idRecette AND idIngredients=:idIngredients  ");

    $requete->bindvalue(':nombreIngredients',$nombreIngredients);
    $requete->bindvalue(':idRecette',$idRecette);
    $requete->bindvalue('idIngredients',$idIngredients);

    $resultat=$requete->execute();
    return $resultat;
}

function modelRecupereridRecetteEtIdIngredient($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM recette_ingredients WHERE idRecette='$idRecette' ";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}






//requete table etape



function modelInsereIdRecetteEtDescriptifDansLaTableEtape($idRecette,$descriptif)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO etape(idRecette,descriptif) VALUES(:idRecette,:descriptif)');
    $requete->bindvalue(':descriptif',$descriptif);
    $requete->bindvalue(':idRecette',$idRecette);
    $resultat=$requete->execute();

    return $resultat;


}

function modelRecupererEtapeRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idEtape,descriptif FROM etape WHERE idRecette = $idRecette ";
    $result=$bddPDO->query($requete);

    return $result;
}

function modeleSupprimerEtapeRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM etape WHERE idRecette= '$idRecette'";

    $result=$bddPDO->exec($requete);
    return $result;
}

function modelSupprimerEtapeRecette($idRecette,$idEtape)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM etape WHERE idRecette='$idRecette' AND idEtape='$idEtape'";

    $resultat=$bddPDO->exec($requete);
    return $resultat;

}



//requere table typesDePlats


function modelRecupererIdCategorie($categorieRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idTypesDePlats FROM typesdeplats WHERE categorie = '$categorieRecette'";
    $result = $bddPDO->query($requete);
 
    return $result;
}

function modelAfficherTypesDePlats($idTypesDePlats)
{
    $bddPDO=connexionBdd();
    $requete="SELECT categorie FROM typesdeplats WHERE idTypesDePlats='$idTypesDePlats'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();
}



//requete table recette_typesDePlats


function modelInsererIdTypeDePlatEtIdRecettetDansLaTableRecetteIngredient($typeDePlat,$idRecette)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO recette_typesdeplats(idRecette,idTypesDePlats) VALUES(:idRecette,:idTypesDePlats)');
    $requete->bindvalue(':idRecette',$idRecette);
    $requete->bindvalue(':idTypesDePlats',$typeDePlat);
    $resultat=$requete->execute();

    return $resultat;
}

function modeleSupprimerRecettePourLaTableRectteTypePlat($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM recette_typesdeplats WHERE idRecette='$idRecette'";
    
    $resultat=$bddPDO->exec($requete);
    return $resultat;
}


function modeleModifierRecetteParSonTypesDePlats($idRecette,$typesDePlats)
{
    $bddPDO=connexionBDD();
    $update=$bddPDO->prepare('UPDATE vosrecettes.recette_typesdeplats  SET idTypesDePlats=:idTypesDePlats WHERE idRecette=:idRecette' );
	$update->bindvalue(':idTypesDePlats',$typesDePlats);
    $update->bindvalue(':idRecette',$idRecette);
   

    $resultatUpdate=$update->execute();
	return $resultatUpdate;
    $resultatUpdate->closeCursor();
}

function modelRecupererIdTypesDePlats($idRecette)
{
    $bddPDO=connexionBdd();
    $requete="SELECT idTypesDePlats FROM recette_typesdeplats WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();
}




//requete table utilisateur_recette

function modelSupprimeridUtilisateurDansLaTableUtilisateurRecette($idUtilisateur)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM utilisateur_recette WHERE idUtilisateur='$idUtilisateur'";

    $resultat=$bddPDO->exec($requete);
    return $resultat;
}


//reque table ingrédient

function modelInsertionNouvelleAlimentDansLaBaseDeDonnees($nomIngredients)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("INSERT INTO ingredients(nomIngredients) VALUES (:nomIngredients) ");
    $requete->bindvalue(':nomIngredients',$nomIngredients);

    $result=$requete->execute();
   
}

function modelSelectionIngredientQueJeViensAjouter($nomIngredients)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM ingredients WHERE nomIngredients='$nomIngredients'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    closeCursor();

}


function modelRecupererIngredientDeLaRecetteEnQuestion($idIngredient)
{
    $bddPDO=connexionBDD();
    $requete="SELECT nomIngredients FROM ingredients WHERE idIngredients='$idIngredient'";

    $resultatRequete=$bddPDO->query($requete);
    return $resultatRequete;

    $resultatRequete->closeCursor();

}


function modelRecupererIdIngredientDesIngredientsDeLaRecetteSelectionner($idIngredient)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM ingredients WHERE nomIngredients='$idIngredient'";

    $result=$bddPDO->query($requete);
    return $result;

    $result->closeCursor();
}

function modelRecuperationIdIngredientAPartirDuNomIngredient($nomIngredients)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idIngredients FROM ingredients WHERE nomIngredients='$nomIngredients'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}



//requete table coutdelaRecette


function modelRecupererIdCoutDeLaRecette($cout)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idCout FROM coutdelarecette WHERE budget='$cout'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

//requete recette et coutdelarecette

function modelSelectionnerCoutDeLaRecetteAvEcIdRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT budget FROM coutdelarecette INNER JOIN recette ON recette.idCout=coutdelarecette.idCout WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

   
}

//requete ingredients et recette_ingredients

function recupererIngredientsDeLaRecetteAdequate($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT nomIngredients FROM ingredients INNER JOIN recette_ingredients ON ingredients.idIngredients=recette_ingredients.idIngredients WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

function modelSelectionerNombreIngredientIdIngredientEtIngredientAPartirDeLidRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT recette_ingredients.nombreIngredients,recette_ingredients.idIngredients,ingredients.nomIngredients FROM recette_ingredients INNER JOIN ingredients ON recette_ingredients.idIngredients=ingredients.idIngredients WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

function modelRecupererNombreIngredientsAModifier($idRecette,$idIngredients)
{
    $bddPDO=connexionBDD();
    $requete="SELECT recette_ingredients.nombreIngredients,recette_ingredients.idIngredients,ingredients.nomIngredients
    FROM recette_ingredients INNER JOIN ingredients
    WHERE idRecette='$idRecette' AND idIngredients='$idIngredients'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

//table ustensile


function modelAfficherUstensile()
{
    $bddPDO=connexionBDD();
    $requete="SELECT nomUstensiles FROM ustensiles ORDER BY nomUstensiles ASC";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

function modelInsertionUstensileDansTableUstensile($noUstensiles)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("INSERT INTO ustensiles(nomUstensiles) VALUES (:nUstensiles)  ");
    $requete->bindvalue(':nUstensiles',$noUstensiles);
   

    $resultat=$requete->execute();
}

function modelRecupererIdUstensiles($nomUstensiles)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idUstensiles FROM ustensiles  WHERE nomUstensiles='$nomUstensiles'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

//recette_ustensiles

function modelRecupererIdUstensileAPartirIdRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idUstensiles FROM recette_ustensiles WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}

function modelInsertionDansLaTableRecetteUstensiles($idRecette,$idUstensiles)
{
    $bddPDO=connexionBDD();
    $requete=$bddPDO->prepare("INSERT INTO recette_ustensiles(idRecette,idUstensiles) VALUES(:idRecette,:idUstensiles) ");
    $requete->bindvalue(':idRecette',$idRecette);
    $requete->bindvalue(':idUstensiles',$idUstensiles);

    $resultat=$requete->execute();

    
    return $resultat;

    $resultat->closeCursor();
}

function supprimerUstensileRecetteEnQuestion($idRecette,$idUstensiles)
{
    $bddPDO=connexionBDD();
    $requete="DELETE FROM recette_ustensiles WHERE idRecette='$idRecette' AND idUstensiles='$idUstensiles'";

    $resultat=$bddPDO->exec($requete);
   
}



//table ustensile et recette_ustensiles

function recupererNomUstensilesAPartirDeLidRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT ustensiles.nomUstensiles 
    FROM ustensiles 
    INNER JOIN recette_ustensiles
    ON recette_ustensiles.idUstensiles=ustensiles.idUstensiles 
    WHERE recette_ustensiles.idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor();
}













