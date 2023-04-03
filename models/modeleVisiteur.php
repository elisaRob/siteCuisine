<?php

require_once('models/connexionBdd.php');

function modelRecupererIdRecetteDesEntrees()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='1' LIMIT 3 ";
  

    $resultatRecupererIdRecetteDesEntrees = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDesEntrees;
    $resultatRecupererIdRecetteDesEntrees->closeCursor();
}

function modelRecupererLesTroisPremieresEntrees($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE idRecette=$idRecette";
  

    $resultatRecupererLesTroisPremieresEntrees = $bddPDO->query($requete);
	return $resultatRecupererLesTroisPremieresEntrees;
    $resultatRecupererLesTroisPremieresEntrees->closeCursor();
}

function modelRecupererIdRecetteDesPlatsPrincipaux()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='2' LIMIT 3 ";
  

    $resultatRecupererIdRecetteDesPlatsPrincipaux = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDesPlatsPrincipaux;
    $resultatRecupererIdRecetteDesPlatsPrincipaux->closeCursor();
}

function modelRecupererLesTroisPremiersPlatsPrincipaux($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE idRecette=$idRecette";
  

    $resultatRecupererLesTroisPremiersPlatsPrincipaux = $bddPDO->query($requete);
	return $resultatRecupererLesTroisPremiersPlatsPrincipaux;
    $resultatRecupererLesTroisPremiersPlatsPrincipaux->closeCursor();
}



function modelRecupererIdRecetteDesTroisPremiersDessert()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='3' LIMIT 3 ";
  

    $resultatRecupererIdRecetteDesTroisPremiersDessert = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDesTroisPremiersDessert;
    $resultatRecupererIdRecetteDesTroisPremiersDessert->closeCursor();
}

function modelRecupererLesTroisPremiersDessert($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE idRecette=$idRecette";
  

    $resultatRecupererLesTroisPremiersDessert = $bddPDO->query($requete);
	return $resultatRecupererLesTroisPremiersDessert;
    $resultatRecupererLesTroisPremiersDessert->closeCursor();
}

function modelRecupererIdRecetteDeToutesLesEntrees()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='1'";
  

    $resultatRecupererIdRecetteDesEntrees = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDesEntrees;
    $resultatRecupererIdRecetteDesEntrees->closeCursor();
}

function modelRecupererIdRecetteDeTousLesPlatsPrincipaux()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='2'";
  

    $resultatRecupererIdRecetteDeTousLesPlatsPrincipaux = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDeTousLesPlatsPrincipaux;
    $resultatRecupererIdRecetteDeTousLesPlatsPrincipaux->closeCursor();
}

function modelRecupererIdRecetteDeTousLesDessert()
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_typesdeplats WHERE idTypesDePlats='3'";
  

    $resultatRecupererIdRecetteDeTousLesDessert = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteDeTousLesDessert;
    $resultatRecupererIdRecetteDeTousLesDessert->closeCursor();
}

function modelchercherIngredient($search)
{
    $bddPDO=connexionBDD();
    $requete='SELECT idIngredients FROM ingredients WHERE nomIngredients LIKE "'.$search.'"';
    //$requete="SELECT idIngredients FROM ingredients WHERE nomIngredients LIKE $search ";

    $resultatChercherIngredient = $bddPDO->query($requete);
	return $resultatChercherIngredient;
    $resultatChercherIngredient->closeCursor();
}

function modelSelectionnerIdRecetteIngredients($resultatRecherche)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM recette_ingredients WHERE idIngredients=$resultatRecherche" ;

    $resultatChercherIdRecette = $bddPDO->query($requete);
	return $resultatChercherIdRecette;
    $resultatChercherIdRecette->closeCursor();
}

function modelRecupererRecetteRecherche($idRecette1)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE idRecette='$idRecette1'";
  

    $resultatRecupererLesRecherche = $bddPDO->query($requete);
	return $resultatRecupererLesRecherche;
    $resultatRecupererLesRecherche->closeCursor();
}

function modelrechercherRecette($search)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE lower(Nom) LIKE '$search%'";

    $resultatRecetteIngredient = $bddPDO->query($requete);
	return $resultatRecetteIngredient;
    $resultatRecetteIngredient->closeCursor();
}

function modelAfficherRecetteSelectionner($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire FROM recette WHERE idRecette='$idRecette'";

    $resultatRecetteSelectionerPourAfficherPage=$bddPDO->query($requete);
    return $resultatRecetteSelectionerPourAfficherPage;
    $resultatRecetteSelectionerPourAfficherPage->closeCursor();
}

function modelAfficherRecetteSelectionnerDansLeTableauEtapse($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT descriptif FROM etape WHERE idRecette=$idRecette";

    $resultatRequeteSelectionDescriptif=$bddPDO->query($requete);
    return $resultatRequeteSelectionDescriptif;
    $resultatRequeteSelectionDescriptif->closeCursor();
}

function modelSelectionnerNiveauDeDifficultes($idNiveauDeDifficultes)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Niveau FROM niveaudedifficultes WHERE idNiveauDeDifficultes='$idNiveauDeDifficultes'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();

}

function modelSelectionnerIdNiveauDeDifficultesAPartirDeIdRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT IdNiveauDeDifficultes FROM recette WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();
}

function modelRecupererTempsPreparationAPartirDeLIdRecette($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT TempsPreparation FROM recette WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;
    $resultat->closeCursor();
}

function modelSelectionNomIngredientsEtNombreIngredients($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT ingredients.nomIngredients,recette_ingredients.nombreIngredients
    FROM recette_ingredients INNER JOIN ingredients 
    ON recette_ingredients.idIngredients=ingredients.idIngredients
    WHERE idRecette='$idRecette'";

    $resultat=$bddPDO->query($requete);
    return $resultat;

    $resultat->closeCursor(); 
}