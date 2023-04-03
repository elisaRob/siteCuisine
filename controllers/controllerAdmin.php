<?php

include('models/modeleAdmin.php');

function pageModifierAdmin($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
    include('views/global/espaceAdmin/modification/modifierAdmin.php');
}

function pageModifierMail($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
    include('views/global/espaceAdmin/modification/modifierMail.php');
}

function pagemodifierNom($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
    include('views/global/espaceAdmin/modification/modifierNom.php');
}

function pageModifierPrenom($idUtilisateur)
{
    $conservation=$idUtilisateur;
    include('views/global/espaceAdmin/modification/modifierPrenom.php');
}

function pageModifierValidation($idUtilisateur)
{
    $conservation=$idUtilisateur;
    include('views/global/espaceAdmin/modification/modifierValidation.php');
}


function pageAfficherToutesLesRecettes()
{
    include('views/global/espaceAdmin/modificationRecette/afficherToutesLesRecettes.php');
}

function pageAfficherUneRecette()
{
    include('views/global/espaceAdmin/modificationRecette/afficherUneRecette.php');
}

function pageModificationDescriptionRecette($idRecette)
{
    $conservationId=$idRecette; 
    include('views/global/espaceAdmin/modificationRecette/modificationDescriptionRecette.php');
}

function pageModificationNiveauDeDifficultesRecette($idRecette)
{
    $conservationId=$idRecette; 
    include('views/global/espaceAdmin/modificationRecette/modificationNiveauDeDifficultes.php');
}

function pageModificationNomRecette($idRecette)
{
    $conservationId=$idRecette; 
    include('views/global/espaceAdmin/modificationRecette/modificationNomRecette.php');
}

function  pageModificationPhotoRecette($idRecette)
{
    $conservationId=$idRecette; 
    include('views/global/espaceAdmin/modificationRecette/modificationPhotoRecette.php');
}

function pageModificationTypesDePlat($idRecette)
{
    $conservationId=$idRecette; 
    include('views/global/espaceAdmin/modificationRecette/modificationTypesDePlatsRecette.php');
}

/*function pageModificationEtape($idRecette)
{
    $conservationId=$idRecette;
    include('views/global/espaceAdmin/modificationRecette/modificationEtape.php');
}*/

function pageAccueil()
{
    include('views/global/espaceAdmin/accueil.php');
}

function pageAfficherTousLesUtilisateurs()
{
    include('views/global/espaceAdmin/afficherTousLesUtilisateurs.php');
}

function pageAfficherUnUtilisateur()
{
    include('views/global/espaceAdmin/afficherUnUtilisateur.php');
}

function pageAjouterIngredient()
{
    include('views/global/espaceAdmin/ajouterIngredient.php');
}

function pageAjouterUneRecette()
{
    include('views/global/espaceAdmin/ajouterUneRecette.php');
}

function pageAjouterUnUtilisateur()
{
    include('views/global/espaceAdmin/ajouterUnUtilisateur.php');
}

function pageModifierUnUtilisateur()
{
    include('views/global/espaceAdmin/modifierUnUtilisateur.php');
}

function pageConnexionBdd()
{
    include('models/connexionBdd.php');
}

function pageModificationBienAboutit()
{
    include('views/global/espaceAdmin/modificationBienAboutit.php');
}

function pageModificationTempsDePreparation($idRecette)
{
    $conservationId=$idRecette;
    include('views/global/espaceAdmin/modificationRecette/modificationTempsDePreparation.php');
}

function pageModifierEtape($idRecette,$idEtape)
{
    $conservationIdRecette=$idRecette;
    $conservationIdEtape=$idEtape;
    include('views/global/espaceAdmin/modificationRecette/modificationEtape.php');
}

function pageModificationEtape1($idRecette)
{
    $conservationIdRecette=$idRecette;
    include('views/global/espaceAdmin/modificationRecette/modificationEtape1.php');
}

function pageModificationCoutDeLaRecette($idRecette)
{
    $conservationId=$idRecette;
    include('views/global/espaceAdmin/modificationRecette/modificationCoutDeLaRecette.php');
}

function pageAjouterRecetteSuivante($idRecette)
{
    $conservationId=$idRecette;
    include('views/global/espaceAdmin/ajouterUneRecette2.php');
}

function ajouterUnUtilisateur()
{
    if(isset($_POST['ajouterUtilisateur']))
    {
        $selectionerTousEmail=selectionerTousEmail($_POST['mail']);
        $nombreMail = $selectionerTousEmail->rowCount();
        
        if($nombreMail==0)
        {
            $motDePasse=sha1($_POST['motDePasse']);
            if(!empty($_POST['nom5']) && !empty($_POST['prenom']) && !empty($motDePasse))
            {
                $resultat=modelAjouterUnUtilisateur($_POST['nom5'],$_POST['prenom'],$_POST['mail'],$motDePasse,$_POST['admin'],'valide',1);
               
                pageModificationBienAboutit();
            }
            else
            {
                echo 'Veuillez remplir tous les champs';
            }
        }
        else
        {
            echo ' email est déjà enregistrée';
        }
        
    }
}


function afficherTousLesUtilisateurs()
{

	$resultAfficherTousLesUtilisateurs = ModeleAfficherTousLesUtilisateurs();
	if(!$resultAfficherTousLesUtilisateurs)
    {
		$message = "La récuperation des utilisateurs n'a pas aboutie !";
	}
     else
     {
		$nombreUtilisateur = $resultAfficherTousLesUtilisateurs->rowCount();
		if($nombreUtilisateur == 0){
			$message = "Il n'y a aucun utilisateur pour le moment!";
			
		}
        else
        {
            include('views/global/espaceAdmin/afficherTousLesUtilisateurs.php');
		}
	}
    if(isset($message))
    {
        echo $message;
    }

	
}

function afficherUnUtilisateur($idUtilisateur)
{
    $conservationId=$idUtilisateur;
    $resultatAfficherUnUtilisateur=modeleAfficherUnUtilisateur($conservationId);
    if(!$resultatAfficherUnUtilisateur)
    {
        $message= "La récuperation des utilisateurs n'a pas aboutie !";
    }
    else
    {
        include('views/global/espaceAdmin/afficherUnUtilisateur.php');
    }
}

function modifierUtilisateurParSonNom($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
   
    if(isset($_POST['mettreAJourNom']))
    {
        if(!empty($_POST['nom']))
        {
            $modierUtilisateurParSonNom=modeleModifierUtilisateurParSonNom($idUtilisateur,$_POST['nom']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
    
}

function modifierUtilisateurParSonPrenom($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
   
    if(isset($_POST['mettreAJourPrenom']))
    {
        if(!empty($_POST['prenom']))
        {
            $modierUtilisateurParSonPrenom=modeleModifierUtilisateurParSonPrenom($idUtilisateur,$_POST['prenom']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }
    }
}

function modifierUtilisateurParSonMail($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
   
    if(isset($_POST['mettreAJourMail']))
    {
        if(!empty($_POST['mail']))
        {
            $modierUtilisateurParSonMail=modeleModifierUtilisateurParSonMail($idUtilisateur,$_POST['mail']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }
    }
}

function modifierUtilisateurParSonAdmin($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
   
    if(isset($_POST['mettreAJourAdmin']))
    {
       
        
            
            $modierUtilisateurParSonAdmin=modeleModifierUtilisateurParSonAdmin($idUtilisateur,$_POST['admin']);
            pageModificationBienAboutit();
        

        
    }
}

function modifierUtilisateurParSonValidation($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
   
    if(isset($_POST['mettreAJourValidation']))
    {
        
            $modierUtilisateurParSonValidation=modeleModifierUtilisateurParSonValidation($idUtilisateur,'valide',$_POST['validation']);
            pageModificationBienAboutit();
        
    }
}

function ajouterUnIngredient()
{
    if(isset($_POST['ajouterUnIngredient']))
    {
        if(!empty($_POST['ingredient']))
        {
            $ajouterIngredient=modelAjouterIngredient($_POST['ingredient']);
            pageAjouterIngredient();
        }
        else
        {
            echo "Veuillez remplir le champs ou retourner à l'ajout de la recette";
        }
        
    }
}

function ajouterUneRecette()
{
    if(isset($_POST['ajouterUneRecette']))
    {
        if(!empty($_FILES['img']))
        {
            $img=$_FILES['img'];
            $ext=strtolower(substr($img['name'],-3));
            $allow_ext=array("jpg","png","gif");
            if(in_array($ext,$allow_ext))
            { 
                move_uploaded_file($img['tmp_name'],"assets/images/".$img['name']);
                $lienImage="assets/images/".$img['name'];
                if(!empty($_POST['nomRecette']) && !empty($_POST['descriptionRecette']) && !empty($_POST['niveauDeDifficultes']))
                {
                    //$coutDeLaRecette=$_POST['coutDeLaRecette'];
                    //$resultat=modelRecupererIdCoutDeLaRecette($coutDeLaRecette);
                    //$resultat=$result->fetch(PDO::FETCH_NUM);
                    $resultat=modelAjouterUneRecette($_POST['nomRecette'],$lienImage,$_POST['descriptionRecette'],$_POST['niveauDeDifficultes'],$_POST['nombreDeTemps']);
                    $insererNouveauIngredient=$_POST['ingredientAjout'];
                    foreach($insererNouveauIngredient as $valeur)
                    {
                        $insererIngredient=modelInsertionNouvelleAlimentDansLaBaseDeDonnees($valeur);
                        $recuperatIonIdIngredient=modelRecuperationIdIngredientAPartirDuNomIngredient($valeur);
                        foreach($recuperatIonIdIngredient->fetchall(PDO::FETCH_NUM) as $valeur1)
                        {
                            modelInsererIdIngredienEtIdRecettetDansLaTableRecetteIngredient($valeur1[0],$resultat);
                        }
                    }
                    $insererNouveauUstensile=$_POST['rajouterUstensiles1'];
                    foreach($insererNouveauUstensile as $valeur1)
                    {
                        $insererUstensile=modelInsertionUstensileDansTableUstensile($valeur1);
                        $recupererIdUstensiles=modelRecupererIdUstensiles($valeur1);
                        foreach($recupererIdUstensiles->fetchall(PDO::FETCH_NUM) as $valeur2)
                        {
                            $resultatInsererIdUstensileDansLaTableUstensileRecette=modelInsertionDansLaTableRecetteUstensiles($resultat,$valeur2[0]);
                        }

                    }
                    recupererIdUstensiles($idResultat);
                    recupererIdIngredient($resultat);
                    recupererIdTypesDePlats($resultat);
                    recupererIdCoutDeLaRecette($resultat);
                    insertionIdRecetteDescriptifDansLaTableEtape($resultat);
                    //pageModificationBienAboutit();
                    pageAjouterRecetteSuivante($resultat);
                   
                    
                   
                }
                else
                {
                    echo 'Veuillez remplir tous les champs s\'il vous plaît';
                }
            }
         }
         else
         {
            echo "Veuillez charger une image s'il vous plait";
         }

    }
    
   
}
   


    function insertionIdRecetteDescriptifDansLaTableEtape($idRecette)
    {
        $recuperationEtape = $_POST['etape']; 
        foreach($recuperationEtape as $recuperationRecette2)
        {
            $resultat=modelInsereIdRecetteEtDescriptifDansLaTableEtape($idRecette,$recuperationRecette2);
        }
    }
    

    function recupererIdIngredient($idRecette)
    {
        if(isset($_POST['ingredientsRecette']))
        {
            foreach($_POST['ingredientsRecette'] as $valeur)
            { 
                $result=modelRecupererIdIngredient($valeur);
                $resultat=$result->fetch(PDO::FETCH_NUM);
                foreach($resultat as $valeur)
                {     
                    $resultat=modelInsererIdIngredienEtIdRecettetDansLaTableRecetteIngredient($valeur,$idRecette);
                   
                   
                    
                }
            }
        }
        else
        {
            echo "Veuillez sélectionner les ingrédients de la recette";
        }
        
    }

    function recupererIdUstensiles($idRecette)
    {
        if(isset($_POST['ustensileAfficher']))
        {
            $ustensile=$_POST['ustensileAfficher'];
            foreach($ustensile as $valeur)
            {
                $resultatRecuperationIdUstensiles=modelRecupererIdUstensiles($valeur);
                foreach($resultatRecuperationIdUstensiles->fetchall(PDO::FETCH_NUM) as $valeur1)
                {
                    modelInsertionDansLaTableRecetteUstensiles($idRecette,$valeur1[0]);
                }

            }
        }
    }

    function recupererIdTypesDePlats($idRecette)
    {
        if(isset($_POST['categorieRecette']))
        {
            $categorieRecette= $_POST['categorieRecette'];
            $result=modelRecupererIdCategorie($categorieRecette);
            $resultat=$result->fetch(PDO::FETCH_NUM);

            foreach($resultat as $valeur)
            {
                
                $resultat=modelInsererIdTypeDePlatEtIdRecettetDansLaTableRecetteIngredient($valeur,$idRecette);
            }
        }

    }

    

    function recupererIdCoutDeLaRecette($idRecette)
    {
        if(isset($_POST['coutDeLaRecette']))
        {
            $coutDeLaRecette=$_POST['coutDeLaRecette'];
            $resultat=modelRecupererIdCoutDeLaRecette($coutDeLaRecette);
            foreach($resultat->fetchall(PDO::FETCH_NUM) as $valeur1)
            {
                $resultat=modelInsererIdCoutDansIdRecetteSpecifique($valeur1[0],$idRecette);
            }
        }
    }

    function afficherToutesLesRecettes()
{

	$resultAfficherToutesLesRecettes = ModeleAfficherToutesLesRecettes();
	if(!$resultAfficherToutesLesRecettes)
    {
		$message = "La récuperation des recettes n'a pas aboutie !";
	}
     else
     {
		$nombreRecette = $resultAfficherToutesLesRecettes->rowCount();
		if($nombreRecette == 0){
			$message = "Il n'y a aucune recette pour le moment!";
			
		}
        else
        {
            include('views/global/espaceAdmin/modificationRecette/afficherToutesLesRecettes.php');
		}
	}
    if(isset($message))
    {
        echo $message;
    }

	
}

function afficherUneRecette($idRecette)
{
    $conservationId=$idRecette;
    $resultatAfficherUneRecette=modeleAfficherUneRecette($conservationId);
    $resultatRecupererTypesDePlats=modelRecupererIdTypesDePlats($conservationId);
    
    if(!$resultatAfficherUneRecette)
    {
        $message= "La récuperation des utilisateurs n'a pas aboutie !";
    }
    else
    {
        include('views/global/espaceAdmin/modificationRecette/afficherUneRecette.php');
    }
}

function modifierRecetteParSonNom($idRecette)
{
    $conservationId=$idRecette; 
   
    if(isset($_POST['mettreAJourNomRecette']))
    {
        if(!empty($_POST['nomRecette']))
        {
            $modierRecetteParSonNom=modeleModifierRecetteParSonNom($idRecette,$_POST['nomRecette']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
    
}

function modifierRecetteParSaDescription($idRecette)
{
    $conservationId=$idRecette; 
   
    if(isset($_POST['mettreAJourDescriptionDeLaRecette']) )
    {
        if(!empty($_POST['descriptionRecette']) )
        {
            $modierRecetteParSaDescription=modeleModifierRecetteParSaDescription($idRecette,$_POST['descriptionRecette']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
    
}

function modifierRecetteParSonNiveauDeDifficultes($idRecette)
{
    $conservationId=$idRecette; 
   
    if(isset($_POST['mettreAJourNiveauDeDifficultesDeLaRecette']))
    {
        if(!empty($_POST['niveauDeDifficultes']))
        {
            $modierRecetteParSonNiveauDeDifficultes=modeleModifierRecetteParSonNiveauDeDifficultes($idRecette,$_POST['niveauDeDifficultes']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
    
}

function modifierRecetteParSaPhoto($idRecette)
{
    $conservationId=$idRecette; 
    
        if(!empty($_FILES['photoRecette']))
        {
            $img=$_FILES['photoRecette'];
            $ext=strtolower(substr($img['name'],-3));
            $allow_ext=array("jpg","png","gif");
            if(in_array($ext,$allow_ext))
            { 
                move_uploaded_file($img['tmp_name'],"assets/images/".$img['name']);
                $lienImage="assets/images/".$img['name'];
                $modierRecetteParSaPhoto=modeleModifierRecetteParSaPhoto($idRecette,$lienImage);
                pageModificationBienAboutit();
            }
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }
    
}

function modifierRecetteParSonTypesDePlat($idRecette)
{
    $conservationId=$idRecette; 
   
    if(isset($_POST['mettreAJourTypesDePlatsRecette']))
    {
        if(!empty($_POST['typesDePlatsRecette']))
        {
            $modierRecetteParSonTypesDePlats=modeleModifierRecetteParSonTypesDePlats($idRecette,$_POST['typesDePlatsRecette']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
    
}

/*function modifierRecetteParEtape($idRecette)
{
    $conservationId=$idRecette; 

    if(isset($_POST['mettreAJourEtapeRecette']))
    {
        if(!empty($_POST['etapeRecette']))
        {
            $modierRecetteParEtape=modeleModifierRecetteParEtape($idRecette,$_POST['etapeRecette']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }

    }
}*/

function recupererEtapeRecette($idRecette)
{
    $conservationId=$idRecette;

    $resultatRecupererEtapeRecette = modelRecupererEtapeRecette($conservationId);
    if(!$resultatRecupererEtapeRecette)
    {
		echo "La récuperation n'a pas aboutie !";
	}
    else
    {
	
        include('views/global/espaceAdmin/modificationRecette/afficherEtapeAModifier.php');
      
	}
}

function supprimerUtilisateur($idUtilisateur)
{
    $conservationId=$idUtilisateur; 
    supprimerUtilisateurDansLaTableUtilisateurRecette($idUtilisateur);
    $resultatSupprimerUnUtilisateur=modeleSupprimerUnUtilisateur($conservationId);
    if(!$resultatSupprimerUnUtilisateur)
    {
        echo  "La suppression de l' utilisateur n'a pas aboutie !";
    }
    else
    {
        pageModificationBienAboutit();
    }

}

function supprimerUtilisateurDansLaTableUtilisateurRecette($idUtilisateur)
{
    $conservationId=$idUtilisateur;
    $resultatsupprimerUtilisateurDansLaTableUtilisateurRecette=modelSupprimeridUtilisateurDansLaTableUtilisateurRecette($idUtilisateur);

}

function supprimerUneRecette($idRecette)
{
    $conservationId=$idRecette; 
    supprimerEtapeUneRecette($conservationId);
    supprimerRecettePourLaTableRecetteIngredient($conservationId);
    supprimerRecettePourLaTableRecetteTypeDePlat($conservationId);
    //$resultatSupprimerEtapeRecette=modeleSupprimerEtapeRecette($conservationId);
    $resultatSupprimerUneRecette=modeleSupprimerUneRecette($conservationId);
    if(!$resultatSupprimerUneRecette)
    {
        echo  "La suppression de la recette n'a pas aboutie !";
    }
    else
    {
        pageModificationBienAboutit();
    }

}

function supprimerRecettePourLaTableRecetteTypeDePlat($idRecette)
{
    $conservationId=$idRecette;
    $resultatSupprimerRecetteTypeDePlat=modeleSupprimerRecettePourLaTableRectteTypePlat($idRecette);
}

function supprimerEtapeUneRecette($idRecette)
{
    $conservationId=$idRecette; 
    $resultatSupprimerEtapeRecette=modeleSupprimerEtapeRecette($conservationId);
   

}

function supprimerRecettePourLaTableRecetteIngredient($idRecette)
{
    $conservationId=$idRecette; 
    $resultatSupprimerTableRecetteIngredient=modeleSupprimerIdRecettePourLaTableRecetteIngredient($conservationId);
}

function modifierRecetteParEtape($idRecette,$idEtape)
{
    $conservationIdRecette=$idRecette;
    $conservationIdEtape=$idEtape;

    
    if(isset($_POST['mettreAJourEtapeRecette']))
    {
        if(!empty($_POST['etapeRecette']))
        {
            $resultatModificationEtape=modelModifierEtapeDUNERecette($conservationIdRecette,$conservationIdEtape,$_POST['etapeRecette']);
            pageModificationBienAboutit();
        }

        else
        {
            echo 'Veuillez remplir tous les champs';
        }
    }

    if(isset($_POST['SupprimerEtapeRecette']))
    {
        $suppressiondeLEtape=modelSupprimerEtapeRecette($idRecette,$idEtape);
        pageModificationBienAboutit();
    }

}



function recupereridIngredientDeLaRecette($idRecette)
{
    $conservationId=$idRecette;
    $selectionnerIngredientsDeLaRecette=modelRecupererIdIngredientDeLaRecetteIngredient($conservationId);

    if(!$selectionnerIngredientsDeLaRecette)
    {
        echo "la récupération n'a pas aboutit";
    }
    else
    {
        include('views/global/espaceAdmin/modificationRecette/modifierIngredientDeLaRecette.php');
    }
}

function supprimerOuAjouterIngredientDeLaRecetteEnQuestion($idRecette)
{
    if(isset($_POST['mettreAJourIngredientDeLaRecetteEnQuestion'])  )
    {
        if(isset($_POST['ingredientASupprimer']))
        {
            
            foreach($_POST['ingredientASupprimer'] as $valeur3)
            {
                
                $resultatRecupererIdIngredient=modelRecupererIdIngredientDesIngredientsDeLaRecetteSelectionner($valeur3);
                $resultatPourForeach=$resultatRecupererIdIngredient->fetchAll(PDO::FETCH_NUM);
                foreach($resultatPourForeach as $valeur5)
                {
                    $resultatPourSupprimerIngredientDeLaRecetteEnQuestion=modelSupprimerIngredientDeLaRecetteEnQuestion($valeur5[0]);
                    
                }
            }
        }
        if(isset($_POST['ingredientAAjouter']))
        {
            foreach($_POST['ingredientAAjouter'] as $valeur4)
            {
                $resultatRecupererIdIngredient2=modelRecupererIdIngredientDesIngredientsDeLaRecetteSelectionner($valeur4);
                $resultatPourForeach1=$resultatRecupererIdIngredient2->fetchAll(PDO::FETCH_NUM);
                foreach($resultatPourForeach1 as $valeur6)
                {
                    $resultatAjoutIngredientDeLaRecetteEnQuestion=ajouterIngredientDeLaRecetteSelectionner($valeur6[0],$idRecette);
                }
            }
        }

        if(isset($_POST['ingredientAAjoute']))
        {
            $ingredientAMettreDansLaBaseDeDonnee=$_POST['ingredientAAjoute'];
            //echo $ingredientAMettreDansLaBaseDeDonnee;
            
            foreach($ingredientAMettreDansLaBaseDeDonnee as $valeur)
            {
                
                
                $resultatMettreIngredientDansLaBaseDeDonnees=modelInsertionNouvelleAlimentDansLaBaseDeDonnees($valeur);
                $resultatRecupererNomIngredient=modelSelectionIngredientQueJeViensAjouter($valeur);
                $pourForeach10=$resultatRecupererNomIngredient->fetchAll(PDO::FETCH_NUM);
                foreach($pourForeach10 as $valeur2)
                {
                    $resultatRajouterLeLesIngredientPourLaRecetteEnQuestion=ajouterIngredientDeLaRecetteSelectionner($valeur2[0],$idRecette);
                }
                
            }
            
        }

        pageModificationBienAboutit();    

     
    }
}

function modifierRecetteParSonTempsDePreparation($idRecette)
{
    
    if(isset($_POST['tempsDePreparation']))
    {
        $valeur=$_POST['tempsDePreparation'];
        $resultatDeLaModification=modelModifierTempsDePreparationDeLaRecette($idRecette,$valeur);
        pageModificationBienAboutit();
    }

    else
    {
        echo 'echec de la modification,non aboutit';
    }
}

function modifierCoutDeLaRecette($idRecette)
{
    $idConservation=$idRecette;
    if(isset($_POST['mettreAJourCoutDeLaRecette']))
    {
        $valeur=$_POST['coutDeLaRecette1'];
        $resultatA=modelRecupererIdCoutDeLaRecette($valeur);
        $pourForeach=$resultatA->fetchall(PDO::FETCH_NUM);
        foreach($pourForeach as $valeur1)
        {
            $resultatB=modelInsererIdCoutDansIdRecetteSpecifique($valeur1[0],$idConservation);
        }
       
        
        pageModificationBienAboutit();
    }

    else
    {
        echo 'echec de la modification,non aboutit';
    }

}

function nombreIngredient($idRecette)
{
    //echo resultatDuPost($_POST['nombreIngredients']);
    
    if(isset($_POST['ajouterNombreIngredient']))
    {
        $res= $_POST['result'];
        $resultat1=$_POST['nombreIngredients'];
        //$resultat=modelRecuperationIdIngredientAPartirDuNomIngredient($resultat1);
        //$pourForeac=$resultat->fetchAll(PDO::FETCH_NUM);
        for($index=0;$index<count($res);$index++)
        {
            $resultat=modelRecuperationIdIngredientAPartirDuNomIngredient($res[$index]);
            $pourForeac=$resultat->fetchAll(PDO::FETCH_NUM);
            foreach ($pourForeac as $valeur)
            {
                $resultatB=modelModifierNombreIngredients($idRecette,$resultat1[$index],$valeur[0]);
                //echo $valeur[0];
                //echo $resultat1[$index];
               
            }
        }
            
           
            
    
        
        
        pageModificationBienAboutit();
    }


    
}

function recupererNombreIngredient($idRecette)
{
    $conservationId=$idRecette;

    $resultat=modelSelectionerNombreIngredientIdIngredientEtIngredientAPartirDeLidRecette($conservationId);
    $resultatPourForeach=$resultat->fetchall(PDO::FETCH_ASSOC);

    include('views/global/espaceAdmin/modificationRecette/modificationNombreIngredient.php');
    
}

function modifierRecetteParSonNombre($idRecette)
{
    $conservationId=$idRecette;

    if(isset($_POST['mettreAJourNombreRecette']))
    {
        $premierResultat=$_POST['resul'];
        $deuxiemeResultat=$_POST['changerNombreIngredients'];

       

        include('views/global/espaceAdmin/modificationRecette/modifierRecetteParSonNombre.php');

      
    }
    else
    {
        echo "la modification n'a pas aboutit";
    }
}

function deuxiemeModificationRecetteParSonNombre($idRecette)
{
    $conservationId=$idRecette;
    $premierResultat=$_POST['nombreIngredients1'];
    $deuxiemeResultat=$_POST['result1'];

   for($index=0;$index<count($premierResultat);$index++)
   {
    $resultatUpdate=modelModifierNombreIngredients($conservationId,$premierResultat[$index],$deuxiemeResultat[$index]);
        pageModificationBienAboutit();
   }
}

function recupererUstensileDeLaRecette($idRecette)
{
    $conservationId=$idRecette;
    $resultatListeUstensileDeLaRecette=recupererNomUstensilesAPartirDeLidRecette($conservationId);
   


    include('views/global/espaceAdmin/modificationRecette/modificationUstensilesRecette.php');
}

function supprimerOuAjouterUstensileDeLaRecetteEnQuestion($idRecette)
{
    $conservationId=$idRecette;
    if(isset($_POST['mettreAJourUstensileDeLaRecetteEnQuestion']))
    {
        if(isset($_POST['ustensileASupprimer']))
        {
            
            foreach($_POST['ustensileASupprimer'] as $valeur)
            {
                $resultat6=modelRecupererIdUstensiles($valeur);
                foreach($resultat6->fetchall(PDO::FETCH_NUM) as $valeur1)
                {
                    supprimerUstensileRecetteEnQuestion($conservationId,$valeur1[0]);
                }
                
            }
            
        }
        if(isset($_POST['ustensilesAAjouter']))
        {
            
            foreach($_POST['ustensilesAAjouter'] as $valeur)
            {
                $resultat5=modelRecupererIdUstensiles($valeur);
                foreach($resultat5->fetchall(PDO::FETCH_NUM) as $v)
                {
                    modelInsertionDansLaTableRecetteUstensiles($conservationId,$v[0]);
                }
                
            }
        }
        if(isset($_POST['ustensileAjout']))
        {
            
            foreach($_POST['ustensileAjout'] as $resultat1)
            {
                $resultat=modelInsertionUstensileDansTableUstensile($resultat1);
                $resultat2=modelRecupererIdUstensiles($resultat1);
                foreach($resultat2->fetchall(PDO::FETCH_NUM) as $valeur)
                {
                    modelInsertionDansLaTableRecetteUstensiles($conservationId,$valeur[0]);
                }
            }
            
        }
        pageModificationBienAboutit();
    }
}





    

