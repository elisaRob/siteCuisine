<?php
require_once('models/connexionBdd.php');


function insertionEtudiant($Nom, $Prenom, $Mail, $MotDePasse, $Aleatoire)
{
	$bddPDO = connexionBDD();


	$insertionBaseDeDonnees = $bddPDO->prepare('INSERT INTO utilisateur(Nom, Prenom, Mail,MotDePasse,Aleatoire) VALUES(:nom , :prenom , :mail , :motDePasse, :aleatoire )');
    $insertionBaseDeDonnees->bindvalue(':nom',$Nom);
    $insertionBaseDeDonnees->bindvalue(':prenom',$Prenom);
    $insertionBaseDeDonnees->bindvalue(':mail',$Mail);
    $insertionBaseDeDonnees->bindvalue(':motDePasse',$MotDePasse);
    $insertionBaseDeDonnees->bindvalue(':aleatoire',$Aleatoire);
    


	
	$result =$insertionBaseDeDonnees->execute();

	return $result;
}

function obtenirUtilisateurAvecSonMail($mail1)
{
	$bddPDO = connexionBDD();
	$requetemail=$bddPDO->prepare("SELECT * FROM utilisateur WHERE mail = ?");
	//$result = $bddPDO->query($requete);
	$requetemail->execute(array($mail1));

	
	return $requetemail;
}

/*function recupererIdUtilisateur($mail)
{
	$bddPDO=connexionBDD();
	$requete=$bddPDO->prepare("SELECT idUtilisateur FROM utilisateur WHERE mail='$mail'");
	
	$resultat=$bddPDO->query($requete);
	return $resultat;

}

function savoirSiUtilisateurExisteOuNonDansLaTableRecuperationMotDePasse($id)
{
	$bddPDO=connexionBDD();
	$requete=$bddPDO->prepare("SELECT email FROM recuperationmotdepasse WHERE id='$id'");

	$resultat=$bddPDO->query($requete);
	return $resultat;
}*/

function insererDansLaTableRecuperationMotDePasse($email,$token)
{
	$bddPDO = connexionBDD();
	$requete2=$bddPDO->prepare('INSERT INTO recuperationmotdepasse(email,token) VALUES(:email, :token)');
                  
    $requete2->bindvalue(':email', $email);
    $requete2->bindvalue(':token',$token);
                  
    $requete2->execute();
	return $requete2;
}

function updateDansLaBaseRecuperationMotDePasse($token,$email)
{
	$bddPDO = connexionBDD();
	$requete3= $bddPDO->prepare('UPDATE vosrecettes.recuperationmotdepasse SET token=:token WHERE email=:email');
    $requete3->bindvalue(':token', $token);
    $requete3->bindvalue(':email', $email);
    $requete3->execute();

	return $requete3;

}

function chercheASavoirSiUtilisateurAEteDansLeLienOuPas($email,$token)
{
	$requete = $bdd->prepare('SELECT * FROM vosrecettes.recuperationmotdepasse WHERE email=:email AND token=:token');
    
    $requete->bindvalue(':email', $email);
    $requete->bindvalue(':token', $token);

	$re=$requete->execute();
	return $re;
	
}

function obtenirUtilisateurAvecSonMail1($mail1)
{
	$bddPDO = connexionBDD();
	$requetemail=$bddPDO->prepare("SELECT * FROM recuperationmotdepasse WHERE email = ?");
	//$result = $bddPDO->query($requete);
	$requetemail->execute(array($mail1));

	
	return $requetemail;
}

function modeleVerificationMail($email,$aleatoire)
{
	$bddPDO=connexionBDD();
	//on s'assure que dans notre base de données il y a l'utilisateur en question 
    //c'est à dire l'utilisateur qui a demandé la confirmation du mail
	$req=$bddPDO->prepare('SELECT*FROM vosrecettes.utilisateur WHERE Mail=:email AND Aleatoire=:aleatoire');
	$req->bindvalue(':email',$email);
	$req->bindvalue(':aleatoire',$aleatoire);

	//cela permet d'excuter les requêtes quand on a affaire à des requêtes préparées
	$req->execute();

	return $req;

}

function insertionDefinitiveUtilisateur($email)
{
	$bddPDO=connexionBDD();
	$update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET Valida=:validatio, Aleatoire=:aleatoire WHERE Mail=:email' );
	$update->bindvalue(':validatio',1);
    $update->bindvalue(':aleatoire','valide');
    $update->bindvalue(':email',$email);

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
}

function obtenirUtilisateurMailEtMotDePasse($email,$motDePasse)
{
	$bddPDO=connexionBDD();
	$requete1 = $bddPDO->prepare("SELECT * FROM utilisateur WHERE Mail = ? AND MotDePasse = ?");
    $requete1->execute(array($email, $motDePasse));

	return $requete1;
}

function obtenirUtilisateurMailEtMotDePasse1($email,$motDePasse)
{
	$bddPDO=connexionBDD();
	$update=$bddPDO->prepare('UPDATE vosrecettes.utilisateur  SET MotDePasse=:motDePasse WHERE Mail=:email' );
	$update->bindvalue(':motDePasse',$motDePasse);
    $update->bindvalue(':email',$email);

    $resultatUpdate=$update->execute();

	return $resultatUpdate;
}

function modelRecupererIdDeSession($idDeSession)
{
	$bddPDO=connexionBDD();
	$requete1 = $bddPDO->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ? ");
    $requete1->execute(array($idDeSession));

	return $requete1;
}

function modelRajouterIdRecetteEtIdUtilisateurDansFavoris($idRecette,$idUtilisateur,$idFavoris)
{
	$bddPDO=connexionBDD();
    $requete=$bddPDO->prepare('INSERT INTO utilisateur_recette(idUtilisateur,idRecette,favoris) VALUES(:idUtilisateur,:idRecette,:idFavoris)');
    $requete->bindvalue(':idUtilisateur',$idUtilisateur);
    $requete->bindvalue(':idRecette',$idRecette);
	$requete->bindvalue(':idFavoris',$idFavoris);
    $resultat=$requete->execute();

    return $resultat;
}

function modeleSupprimerIdRecetteEtIdUtilisateurEtIdFavoris($idUtilisateur,$idRecette)
{

	$bddPDO = connexionBDD();
	//$requete = "DELETE  FROM recette WHERE idUtilisateur = '$idUtilisateur' AND idRecette = '$idRecette' ";
	$requete = "DELETE  FROM utilisateur_recette WHERE idRecette = '$idRecette' AND idUtilisateur='$idUtilisateur' ";

	$result = $bddPDO->exec($requete);
	return $result;
}

function modelIdRecetteMonPanier($idUtilisateur)
{
	$bddPDO=connexionBDD();
    $requete="SELECT idRecette FROM utilisateur_recette WHERE idUtilisateur='$idUtilisateur'";
  

    $resultatRecupererIdRecetteMonPanier = $bddPDO->query($requete);
	return $resultatRecupererIdRecetteMonPanier;
    $resultatRecupererIdRecetteMonPanier->closeCursor();
}

function modelRecupererLesRecettesDeMonPanier($idRecette)
{
    $bddPDO=connexionBDD();
    $requete="SELECT Nom,Photo,Decrire,idRecette FROM recette WHERE idRecette=$idRecette";
  

    $resultatRecupererLesRecettesDeMonPanier = $bddPDO->query($requete);
	return $resultatRecupererLesRecettesDeMonPanier;
    $resultatRecupererLesRecettesDeMonPanier->closeCursor();
}

function modelSelectionnerSiFavorisActiveOuPas($idRecette,$idUtilisateur)
{
    $bddPDO=connexionBDD();
    $requete="SELECT idUtilisateurEtRecette FROM utilisateur_recette WHERE idRecette=$idRecette AND idUtilisateur=$idUtilisateur";
  

    $resultatRecupereridUtilisateurEtRecette = $bddPDO->query($requete);
	return $resultatRecupereridUtilisateurEtRecette;
    $resultatRecupereridUtilisateurEtRecette->closeCursor();
}