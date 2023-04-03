<?php

include('views/global/espaceMembre/PHPMailer/PHPMailerAutoload.php');
include('views/global/espaceMembre/PHPMailer/class.phpmailer.php');
include('views/global/espaceMembre/PHPMailer/class.smtp.php');
include('views/global/espaceMembre/PHPMailer/class.phpmaileroauth.php');
include('views/global/espaceMembre/PHPMailer/class.phpmaileroauthgoogle.php');
include('views/global/espaceMembre/PHPMailer/class.pop3.php');
include('models/modeleVisiteur.php');
include('models/modeleEspaceMembre.php');
include('models/modeleAdmin.php');

function pageAccueil()
{
    include('views/communs/menu.php');
    
        afficherLesTroisPremieresEntrees();
    
    
   
    include('views/communs/footer.php');
}


function pageInscription()
{
    include('views/global/espaceMembre/inscription.php');
}


function pageConnexion()
{
    include('views/global/espaceMembre/connexion.php');
    
}



function pageOublieDuMotDePasse()
{
	include('views/global/espaceMembre/oublieDuMotDePasse.php');
}

function pageNouveauMotDePasse()
{
    
    
    include('views/global/espaceMembre/nouveauMotDePasse.php');
}

function pageContact()
{
    include('views/global/contact.php');
}

/*function pageAffichagePageEntree()
{
    affichagePageEntree();
}*/

/*function pageEntree()
{
    include('views/global/entree.php');
}

function pagePlatsPrincipaux()
{
    include('views/global/platsPrincipaux.php');
}

function pageDessert()
{
    include('views/global/dessert.php');
}*/
   
function envoieMailContact()
{
    if (isset($_POST['envoyerFormulaireContact']))
    {
       if(!empty($_POST['nom7']) && !empty($_POST['email7']) && !empty($_POST['sujetContact']) && !empty($_POST['messageContact']))
       {

            $nom=htmlspecialchars($_POST['nom7']);
            $email=htmlspecialchars($_POST['email7']);
            $sujet=htmlspecialchars($_POST['sujetContact']);
            $message=htmlspecialchars($_POST['messageContact']);

            /*if(filter_var($email,FILTER_VALIDATE_EMAIL))
            {*/

                //envoieMail est un objet instancié à partir de la classe PHPMailer
                

              
                $mail=new PHPMailer();

                //on appelle la fonction on dit que Mailer peut utilisée le protocole SMTP
                $mail->isSMTP();

                //pour préciser le serveur
                $mail->Host='smtp.gmail.com';

                //on fait appel à SMTP d'authentification on va la mettre sur true pour désigner qu'on 
                //veut activer l'authentification
                $mail->SMTPAuth=true;
                //c'est à partir de cette adresse
                $mail->Username='paulineaoucher@gmail.com';
                //on spécifie notre password de notre adresse gmail
                $mail->Password='tynhmuyifacqxmap';
                $mail->SMTPSecure = "tls";
                //on spécifie le port par défaut c'est 587 selon la documentation de PHPMailer
                $mail->Port=587;

                $mail->setFrom($email,$nom);
                $mail->addReplyTo($email,$nom);
                //on spécifie l'adresse de destination
                $mail->addAddress('paulineaoucher@gmail.com');

                //on va spécifier si les mails peuvent être sous forme d'html
                $mail->isHTML(true);
                $mail->Subject=$sujet;
                $mail->Body=$message;

                if(!$mail->send())
                {
                    echo $mail->ErrorInfo;
                    echo "erreur";
                }

                else
                {
                    echo "email bien envoyé";
                }
            }
           

            

            /*else
            {
                echo "email pas correct";
            }*/
       
       else
       {
            echo "Veuillez remplir tous les champs";
       }
    }

}

function afficherLesTroisPremieresEntrees()
{

	$resultatRecupererIdRecetteDesEntrees = modelRecupererIdRecetteDesEntrees();
    $modelRecupererLesTroisPremiersPlatsPrincipaux = modelRecupererIdRecetteDesPlatsPrincipaux();
    $resultatRecupererIdRecetteDesTroisPremiersDessert = modelRecupererIdRecetteDesTroisPremiersDessert();
    
	if(!$resultatRecupererIdRecetteDesEntrees)
    {
		echo "La récuperation n'a pas aboutie !";
	}
    else
    {
	
        
        include('views/global/pagePrincipal.php');
        
       
        
      
		
	}
}



function affichagePageEntree()
{
    $resultatRecupererIdRecetteDeToutesLesEntrees = modelRecupererIdRecetteDeToutesLesEntrees();
    if(!$resultatRecupererIdRecetteDeToutesLesEntrees)
    {
		echo "La récuperation n'a pas aboutie !";
	}
    else
    {
	
        include('views/global/entree.php');
      
	}
}

function affichagePagePlatsPrincipaux()
{
    $resultatRecupererIdRecetteDeTousLesPlatsPrincipaux = modelRecupererIdRecetteDeTousLesPlatsPrincipaux();
    if(!$resultatRecupererIdRecetteDeTousLesPlatsPrincipaux)
    {
		echo "La récuperation n'a pas aboutie !";
	}
    else
    {
	
        include('views/global/platsPrincipaux.php');
      
	}
}

function affichagePageDessert()
{
    $resultatRecupererIdRecetteDeTousLesDessert = modelRecupererIdRecetteDeTousLesDessert();
    if(!$resultatRecupererIdRecetteDeTousLesDessert)
    {
		echo "La récuperation n'a pas aboutie !";
	}
    else
    {
	
        include('views/global/dessert.php');
      
	}
}

function affichagePageRechercherRecette()
{
   
   if(isset($_GET['search1']) AND !empty($_GET['search1']))
   {
    
    $search2=$_GET['search1'];
    $search3=htmlspecialchars($_GET['search1']);
    $resultatModelRequete=modelchercherIngredient($search2);
    $resultatRechercheRecette=modelrechercherRecette($search2);
   
    /*foreach($resultatModelRequete->fetchAll(PDO::FETCH_NUM) as $valeur)
    {
        
        $resultatIdRecette=modelSelectionnerIdRecetteIngredients($valeur[0]);
    }*/

        include('views/global/resultatRecherche.php');
    }

    
 

   else
   {
        echo "la récupération n'a pas aboutit";
   }
  

}

function descriptionRecettePlusComplete($idRecette)
{
    $conservation=$idRecette;

    $resultatRecupererDescriptionPlusCompleteDeLaRecette=modelAfficherRecetteSelectionner($conservation);
    $resultatRecupererIdNiveauDeDifficultesDeLaRecetteEnQuestion=modelSelectionnerIdNiveauDeDifficultesAPartirDeIdRecette($conservation);
    $resultatPourForeach1=$resultatRecupererIdNiveauDeDifficultesDeLaRecetteEnQuestion->fetchall(PDO::FETCH_NUM);
    $resultatTempsPreparationDeLaRecette=modelRecupererTempsPreparationAPartirDeLIdRecette($conservation);
    $resultatRecupererIdIngredientDeLaRecetteAvecSonIdRecette=modelRecupererIdIngredientDeLaRecetteIngredient($conservation);
    $resultatPourForeach=$resultatRecupererIdIngredientDeLaRecetteAvecSonIdRecette->fetchall(PDO::FETCH_NUM);
    $resultatRequeteMultiple=modelSelectionNomIngredientsEtNombreIngredients($conservation);
    $resultatPourForeach2=$resultatRequeteMultiple->fetchall(PDO::FETCH_ASSOC);
    $resultatRqueteAfficherUstensiles=recupererIngredientsDeLaRecetteAdequate($conservation);
    $resultatPourForeach3=$resultatRqueteAfficherUstensiles->fetchall(PDO::FETCH_NUM);
    

    $resultatRecupererDescriptionEtapeRecette=modelAfficherRecetteSelectionnerDansLeTableauEtapse($conservation);
    include('views/global/pageDescriptionRecette.php');
}





    
    

        
     



   
