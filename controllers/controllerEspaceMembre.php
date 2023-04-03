<?php



include('models/modeleEspaceMembre.php');
include('views/global/espaceMembre/PHPMailer/PHPMailerAutoload.php');


//vérification si le formulaire a été envoyé,
//si l'utilisateur clique sur le bouton minscrire
/*function InscriptionUnEtudiant($Nom, $Prenom, $Mail, $MotDePasse, $Aleatoire)
{
    $resultatEtudiant = insertionEtudiant($Nom, $Prenom, $Mail, $MotDePasse, $Aleatoire);

	if(!$resultatEtudiant)
    {
		$message = "Un problème est survenu, l'enregistrement n'a pas été effectué !";
	}
}*/

/*function envoyerMail($mail,$aleatoire)
{
    $envoyerMail='Afin de valider votre adresse email.Veuillez cliquez sur le lien suivant:
    <a href="http://localhost/cuisine2/controllerEspaceMembre/verificationMail?email='.$mail.'&aleatoire='.$appel.'">Confirmation </a>';

    return $envoyerMail;
}*/

function pageAdmin()
{
    include('views/global/espaceAdmin/accueil.php');
}

/*function pageMonpanier()
{
    include('views/global/espaceMembre/monPanier.php');
}*/

function pageAuthentificationBienFaite()
{
    include('views/global/authentificationBienFaite.php');
}

function pageDeconnexion()
{
    include('views/global/espaceMembre/pagedeconnexion.php');
}


function inscriptionNouveauEtudiant()
{
    if(isset($_POST['minscrire']))
    {

        //là je sécurise
 
        $nom=htmlspecialchars($_POST['nom']);
        //if(empty($_POST['nom'])|| !pereg_match('/[a-zA-Z0-9+/',$_POST['nom']))
        $prenom=htmlspecialchars($_POST['prenom']);
        $mail1=htmlspecialchars($_POST['email']);
        $mail2=htmlspecialchars($_POST['email2']);
        $motDePasse1=sha1($_POST['motdepasse']);
        $motDePasse2=sha1($_POST['motdepasse2']);
        //$password=password_hash($_POST['motdepasse'],PASSWORD_DEFAULT);

    
        //si le champs est pas vide
        if(!empty($_POST['nom']) AND  !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2']))
        {    
            if($mail1==$mail2)
            {
                //pour savoir si c'est bien un email ou non
                if(filter_var($mail1, FILTER_VALIDATE_EMAIL))
                {
                    //maintenant on va vérifier si l'email existe déjà dans notre base de données
                    //$requetemail=$bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                    //$requetemail->execute(array($mail1));
                    $requetemail1 = obtenirUtilisateurAvecSonMail($mail1);

                    //PDOStatement::rowCount() retourne le nombre de lignes affectées
                    // par la dernière requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant.
                    $mailexiste=$requetemail1->rowCount();
                    if($mailexiste==0)
                    {
                        if($motDePasse1==$motDePasse2)
                        {

                            //on a besoin d'un chaîne de caractère qui sera générer de manière automatique et envoyer à traver l'url
                            //pour cela on a besoin de créer cette chaîne de caractère de manière aléatoire
                            //on met par défaut égal à 20 mais lors de l'appel de la fonction on peut spécifier le nombre que l'on veut mais si on ne spécifie pa sc'est égal à 20
                
                            function aleatoireRandomString($leng=20)
                            { 
                                //cela va être choisi de manière alétoire à partir de cette chaîne de caractère
                                $var1='0123456789abcdefghijklmnopqrstuvwxzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $aleatoire='';
                                //à chaque fois je prend un caractère de manière aléatoire
                                for($i=0;$i<$leng;$i++)
                                {
                                    //à chaque fois qu'on choisi de manière aléatoire un carctère il sera ajouté à la
                                    //chaîne précédente.
                                    //on fait appel à une fonction rand qui va permettre de choisir un caractère de manière aléatoire
                                    $aleatoire.=$var1[rand(0,strlen($var1)-1)];

                                }
                                return $aleatoire;
                            }

                            $appel=aleatoireRandomString(10);
                            //echo $appel;

                            /*$insertionBaseDeDonnees=$bdd->prepare('INSERT INTO utilisateur(Nom, Prenom, Mail,MotDePasse,Aleatoire) VALUES(:nom , :prenom , :mail , :motDePasse, :aleatoire )');
                            $insertionBaseDeDonnees->bindvalue(':nom',$nom);
                            $insertionBaseDeDonnees->bindvalue(':prenom',$prenom);
                            $insertionBaseDeDonnees->bindvalue(':mail',$mail1);
                            $insertionBaseDeDonnees->bindvalue(':motDePasse',$motDePasse1);
                            $insertionBaseDeDonnees->bindvalue(':aleatoire',$appel);
                        

                            $insertionBaseDeDonnees->execute();*/

                            insertionEtudiant($nom, $prenom, $mail1, $motDePasse1, $appel);
                        

                            //envoieMail est un objet instancié à partir de la classe PHPMailer
                            $envoieMail=new PHPMailer();

                            //on appelle la fonction on dit que Mailer peut utilisée le protocole SMTP
                            $envoieMail->isSMTP();

                            //pour préciser le serveur
                            $envoieMail->Host='smtp.gmail.com';

                            //on fait appel à SMTP d'authentification on va la mettre sur true pour désigner qu'on 
                            //veut activer l'authentification
                            $envoieMail->SMTPAuth=true;

                            //c'est à partir de cette adresse
                            $envoieMail->Username='paulineaoucher@gmail.com';

                            //on spécifie notre password de notre adresse gmail
                            $envoieMail->Password='tynhmuyifacqxmap';

                            //protocole de cryptage TLS
                            $envoieMail->SMTPSecure='tls';

                            //on spécifie le port par défaut c'est 587 selon la documentation de PHPMailer
                            $envoieMail->Port=587;

                            $envoieMail->setFrom('paulineaoucher@gmail.com');

                            //on spécifie l'adresse de destination
                            $envoieMail->addAddress($mail1);

                            //on va spécifier si les mails peuvent être sous forme d'html
                            $envoieMail->isHTML(true);


                            //$envoieMail->SMTPDebug = 3;



                            //objet de notre email
                            $envoieMail->Subject='Confirmation de votre inscription';

                            //body de notre email
                            //le lien doit pointer sur la page vérification qui permet le traitement de ce lien
                            //on transmet les pramètres à travers l'url avec un point d'intérogation
                            //il y a deux paramètres qu'on veut faire passer email= si on veut spécifier un autre paramètre on fait le signe &et on
                            //spécifie un autre paramètre
                            //$envoieMail->Body='Afin de valider votre adresse email.Veuillez cliquez sur le lien suivant:
                            //<a href="http://localhost/cuisine2/controllerEspaceMembre/verificationMail?email='.$mail1.'&aleatoire='.$appel.'">Confirmation </a>';
                        
                            //$envoieMail->Body=envoyerMail($mail1,$appel);
                            $envoieMail->Body='Afin de valider votre adresse email.Veuillez cliquez sur le lien suivant:
                            <a href="http://localhost/cuisine2/controllerEspaceMembre/verificationMail?email='.$mail1.'&aleatoire='.$appel.'">Confirmation </a>';

                            //on fait un test pour savoir si il a été envoyé ou non
                            //si le mail n'a pas été envoyé dans ce cas là on envoie un petit message
                            if(!$envoieMail->send())
                            {
                                $message="Mail non envoyé";
                                echo 'Erreurs:'.$envoieMail->ErrorInfo;
                            }
                            else
                            {
                                $message= "On vous as envoyé un email";

                            }
                        
                        }
                    
                        else
                        {
                            $erreur="vos mots de passe ne correspondent pas";
                        }
                    }

                    else
                    {
                        $erreur="adresse email déjà utilisée ";
                    }
                }
           
                else

                {
                    $erreur="Votre adresse mail n'est pas valide";
                }
            }
       
            else
            {
                $erreur="vos adresses email ne correspondent pas";
            }

       
        }

        else
        {
            $erreur="tous les champs doivent être complétés";
        }
    }
    if(isset($erreur))
    {
        echo $erreur;
    }

    if(isset($message))
    {
        echo $message;
    }
   
}



function verificationMail()
{
   
    

    //si il y a des paramètres qui ont été passé par l'url dans ce cas là on va faire d'autres tests


    if($_GET['email'] && $_GET['aleatoire'])
    {
        //si il y a  un paramètre qui a été passer par le GET er qui est nommé email dans ce cas là on va créer une variable
        //qui va récuprérer la variable de ce paramètre
        if(isset($_GET['email']))
        {
            $email=$_GET['email'];
        }

        //on récupère les paramètres passé par l'url et on les met dans les variables
    if(isset($_GET['aleatoire']))
    {
       $aleatoire=$_GET['aleatoire'];
    }

    //on va vérifier si c'est deux paramètres sont vide ou non
    if(!empty($email) && !empty($aleatoire))
    {    
       //on s'assure que dans notre base de données il y a l'utilisateur en question 
       //c'est à dire l'utilisateur qui a demandé la confirmation du mail
       $req=modeleVerificationMail($email,$aleatoire);

       //permet de retourner le nombre d'enregistrement retourner par cette requête
       $nb=$req->rowCount();

        //car il ne doit pas exister plus d'un enregistrement qui a cette adresse email
       if($nb==1)
       {
            $resultatUpdate=insertionDefinitiveUtilisateur($email);

            if($resultatUpdate)
            {
                $message="Votre adresse email est bien confirmée";
                
            }
       }
    } 

    }

    if(isset($message))
    {
        echo $message;
    }
}

function connexion()
{
    
    if(isset($_POST['connexion']))
 {
    $mail3 = htmlspecialchars($_POST['email3']);
    //$mail3=filter_imput(INPUT_POST,'email3',FILTER_VALIDATE_EMAIL);
    $motDePasse3 = sha1($_POST['motdepasse3']);

    //si cela est pas vide
    if(!empty($mail3) AND !empty($motDePasse3)) 
    {
       

       $requete1=obtenirUtilisateurMailEtMotDePasse($mail3,$motDePasse3);

       $rutilisateurQuiExiste = $requete1->rowCount();
       $resultat=$requete1->fetch();

       if($rutilisateurQuiExiste == 1) 
       {
         //si la validation est égal à 0 on va envoyer une deuxième fois l'email
         if($resultat['Valida']==0)
         {
            echo "Veuillez confirmer votre adresse email s'il vous plait";
  
         }
         else
         {
            if($resultat['EstSuperAdmin']==1)
            {
               session_start();
               $_SESSION['idUtilisateur']=$resultat['idUtilisateur'];
               $_SESSION['Nom']=$resultat['Nom'];
               $_SESSION['Prenom']=$resultat['Prenom'];
               $_SESSION['Mail']=$mail3;
               $_SESSION['EstSuperAdmin']=$resultat['EstSuperAdmin'];

               //si l'utilisateur coche la case
               
               if(isset($_POST['seSouvenir']))
               {
                 
                  setcookie('email',$mail3);
                  setcookie('password',$_POST['motdepasse3']);
               }
            
               
               else
               {
                 
                  if(isset($_COOKIE['email']))
                  {
                   
                     setcookie($_COOKIE['email'],"email");
                  }

                  if(isset($_COOKIE['password']));
                  {
                     setcookie($_COOKIE['password'],"password");
                  }
               }
               header('location:pageAdmin');

            }
            else
            {
               session_start();
               $_SESSION['idUtilisateur']=$resultat['idUtilisateur'];
               $_SESSION['Prenom']=$resultat['Prenom'];
               $_SESSION['Mail']=$mail3;

               
               /*$_SESSION['idUtilisateur']=$resultat['idUtilisateur'];
               $_SESSION['Nom']=$resultat['Nom'];
               $_SESSION['Prenom']=$resultat['Prenom'];
               $_SESSION['Mail']=$mail3;
               $_SESSION['EstSuperAdmin']=$resultat['EstSuperAdmin'];*/

               //si l'utilisateur coche la case
               if(isset($_POST['seSouvenir']))
               {
                  //on va créer deux cookies le premier concerne les mails,le première paramètre on met le nom
                  //du cookie et le deuxièlme c'est la valeur c'est ce qui a été saisi dans le champs email par l'utilisateur
                  //on peut aussi mettre la durée
                  $cookie_name='email';//nom du cookie
                  $cookie_value=$_POST['email3'];//valuer du cookie
                  setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");//86400*30 c'est un jour
                  setcookie('password',$motDePasse3);
               }
            
               //si l'utilisateur n'a pas coché cette cas
               else
               {
                  //il se peut que déjà des cookies existe
                  if(isset($_COOKIE['email']))
                  {
                     //on met setcookie mais la valeur est vide
                     setcookie($_COOKIE['email']);
                  }

                  if(isset($_COOKIE['password']));
                  {
                     setcookie($_COOKIE['password']);
                  }
               }

               
               header('Location:pageAuthentificationBienFaite');
              // header('location:http://localhost/cuisine2/controllerVisiteur/pageAccueil');
               //header('location:controllers/controllerVisiteur/pageAccueil');

            }

            //header('location:../index.php');

         }

          //$utlisateurInformation = $requete1->fetch();
          //$_SESSION['id'] = $utlisateurInformation['id'];
          //$_SESSION['pseudo'] = $utlisateurInformation['pseudo'];
          //$_SESSION['mail'] = $utlisateurInformation['mail'];
          
         
          //header("Location: profil.php?id=".$_SESSION['id']);

       } 
       else
      {
          $erreur = "Mauvais mail ou mot de passe !";
       }
    } 
    else
     {
       $erreur = "Tous les champs doivent être complétés !";
     }
 }


 if(isset($erreur))
{
    echo $erreur;
}
include('views/global/espaceMembre/connexion.php');
}

function deconnexion()
{
    session_start();



    //on ne peut détruire la session que si on est connécté
    if(isset($_SESSION['idUtilisateur']))
    {
    
        //cette instruction permet de détruire les variables de la session
        session_unset();
    
        session_destroy();
    
        echo 'vous êtes déconnecté';
    
        header('location:pageDeconnexion');
    
    }
    
    else
    {
        header('location:pageDeconnexion');
      
    }
}

function oublieMotDePasse()

{
    //include('views/global/espaceMembre/oublieDuMotDePasse.php');
    $mail1=htmlspecialchars($_POST['email4']);

  //si le bouton mot de passe oublié est cliquer   
  if(isset($_POST['motDePasseOublie']))
  {
    function aleatoireRandomString($leng=20)
    { 
        //cela va être choisi de manière alétoire à partir de cette chaîne de caractère
        $var1='0123456789abcdefghijklmnopqrstuvwxzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $aleatoire='';
        //à chaque fois je prend un caractère de manière aléatoire
        for($i=0;$i<$leng;$i++)
        {
            //à chaque fois qu'on choisi de manière aléatoire un carctère il sera ajouté à la
            //chaîne précédente.
            //on fait appel à une fonction rand qui va permettre de choisir un caractère de manière aléatoire
            $aleatoire.=$var1[rand(0,strlen($var1)-1)];

        }
        return $aleatoire;
    }
  }
 
      //si l'email est  vide ou si l'adresse email ne contient pas @
      if(empty($_POST['email4'])|| !filter_var($_POST['email4'], FILTER_VALIDATE_EMAIL))
      {
        echo "Rentrer une adresse email valide";
      }

      //si l'utilisateur a bien rempli le champ adresse email alors on va continuer le traitement du formulaire
      //la première chose que l'on va faire c'est intérroger la base de donnée pour vérifier si l'adresse email saisi
      //par l'utilisateur existe ou non dans notre base de donnée autrement si l'utilisateur en question est un membre ou non
      //Pour cela on va inclure la connexion de la base de donnée
     
      else
        {
            //include('../../communs/connexionBdd.php');
            //$requete=$bdd->prepare('SELECT * FROM vosrecettes.utilisateur WHERE Mail=:mail');
            //la paramètre nommé c'est le mail saisi par l'utilisateur donc on le récupère par le $_POST saisi par l'utilisateur
            //$requete->bindvalue(':mail', $_POST['email4']);
            //$requete->execute();
            $requete=obtenirUtilisateurAvecSonMail($mail1);

            //on met le resultat dans un tableau associatif
            $result=$requete->fetch();

            //on va calculer le nombres de résultats retourner
            $nombre=$requete->rowCount();
    
            //si ce nombre est différente de 1 -on ne doit pas accepter un utilisateur inscrit plusieurs fois avec la même adresse email
            if($nombre!=1)
            {
                
                $message = "L'adresse email saisie ne corréspond à aucun utilisateur de notre espace membre";
            }

            //si ce nombre est égal à 1 donc il existe un membre inscrit avec cette adresse email
            else
            {
            
                //premier cas l'adresse email existe mais elle est pas validée on récupère grâce au tableau généré par fetch()
                if($result['Valida']!=1)
                {
                    $appel=aleatoireRandomString(10);

                    //$update = $bdd->prepare('UPDATE vosrecettes.utilisateur SET Aleatoire =:aleatoire WHERE Mail=:email');
                    //$update->bindvalue(':aleatoire', $appel);
                    //$update->bindvalue(':email', $_POST['email4']);
                    //$update->execute();
                    $update=modeleVerificationMail($mail1,$appel);


                   //envoieMail est un objet instancié à partir de la classe PHPMailer
                   $envoieMail=new PHPMailer();

                   //on appelle la fonction on dit que Mailer peut utilisée le protocole SMTP
                   $envoieMail->isSMTP();

                   //pour préciser le serveur
                   $envoieMail->Host='smtp.gmail.com';

                   //on fait appel à SMTP d'authentification on va la mettre sur true pour désigner qu'on 
                   //veut activer l'authentification
                   $envoieMail->SMTPAuth=true;

                   //c'est à partir de cette adresse
                   $envoieMail->Username='paulineaoucher@gmail.com';

                   //on spécifie notre password de notre adresse gmail
                   $envoieMail->Password='tynhmuyifacqxmap';

                   //protocole de cryptage TLS
                   $envoieMail->SMTPSecure='tls';

                   //on spécifie le port par défaut c'est 587 selon la documentation de PHPMailer
                   $envoieMail->Port=587;

                   $envoieMail->setFrom('paulineaoucher@gmail.com');

                   //on spécifie l'adresse de destination
                   $envoieMail->addAddress($mail1);

                   //on va spécifier si les mails peuvent être sous forme d'html
                   $envoieMail->isHTML(true);

                   //objet de notre email
                   $envoieMail->Subject='Confirmation de votre inscription';

                   //body de notre email
                   //le lien doit pointer sur la page vérification qui permet le traitement de ce lien
                   //on transmet les pramètres à travers l'url avec un point d'intérogation
                   //il y a deux paramètres qu'on veut faire passer email= si on veut spécifier un autre paramètre on fait le signe &et on
                   //spécifie un autre paramètre
                   $envoieMail->Body='Votre adresse email est pas confirmée .Afin de valider votre adresse email.Veuillez cliquez sur le lien suivant:
                   <a href="http://localhost/cuisine2/controllerEspaceMembre/verificationMail?email='.$mail1.'&aleatoire='.$appel.'">Confirmation </a>';

                   if(!$envoieMail->send())
                    {
                            $message="Mail non envoyé";
                            echo 'Erreurs:'.$envoieMail->ErrorInfo;
                    }
                    else
                    {
                        $message =  "Votre adresse email n'est pas encore confimée.Veuillez la confirmer en cliquant sur le lien reçu dans votre
                        boite mail";
                    }
     

                 }

                 //autre cas si l'adresse email est confirmée
                 //on doit lui envoyer un mail avec le token
                 //on a besoin d'abord d'interoger la table récupération pour voir si il existe un utilisateur avec l'adresse saisi ou non
                 else
                 {

                    //va gébérer une chaîne de caractère aléatoire d'une longueur de 10
                    //on a mis cela dans une variable

                    $appel1=aleatoireRandomString(10);

                    /*
                    $requete1=$bdd->prepare('SELECT *FROM vosrecettes.utilisateur WHERE Mail=:email');
                    $requete1->bindvalue(':email',$_POST['email4'])

                    $nombre1=$requete1->rowCount();*/

                    //on a intéroger la table recuperationmotdepasse pour voir si il existe un utilisateur 
                    //avec l'adresse email qui a été saisi ou non une fois que cette requête a été calculer
                    //on a calculer le nombre de retour faite avec cette requête puis on a fait un test conditionnel si 
                    //ce nombre est égal à zéro c'est à dire qu'il existe aucun utilisateur dans la table recuperation
                    //du mot de passe dans ce cas on va insérer dans sa table email et token
                    //si ce nombre est différent de zéro cela veut dire qu'il existe déjà un utilisateur dans ce cas on fait une mise à jour
                    
                    //$requete1=$bdd->prepare('SELECT *FROM vosrecettes.recuperationmotdepasse WHERE email=:email');
                    //$requete1->bindvalue(':email',$mail1);

                    //$requete1->execute();

                    $requete1=obtenirUtilisateurAvecSonMail1($mail1);
                    

                    $nombre1=$requete1->rowCount();

                    

                    //lorqu'il existe aucun utilisateur dans la table recupearation de mot de passe
                    //réserver à l'enregistrement du token et de l'adresse email lorsqu'il s'agit du renitialisation du mot de passe

                    if($nombre1==0)
                    {

                        //$requete2=$bdd->prepare('INSERT INTO recuperationmotdepasse(email,token) VALUES(:email, :token)');
                  
                        //$requete2->bindvalue(':email', $_POST['email4']);
                        //$requete2->bindvalue(':token',$appel1);
                  
                        //$requete2->execute();

                        $requete2=insererDansLaTableRecuperationMotDePasse($_POST['email4'],$appel1);
                    }

                    else
                    {
                        //$requete3= $bdd->prepare('UPDATE vosrecettes.recuperationmotdepasse SET token=:token WHERE email=:email');
                        //$requete3->bindvalue(':token', $appel1);
                        //$requete3->bindvalue(':email', $_POST['email4']);
                        //$requete3->execute();
                        
                        $requete3=updateDansLaBaseRecuperationMotDePasse($appel1,$_POST['email4']);
                  
                    }

                    //envoieMail est un objet instancié à partir de la classe PHPMailer
                   $envoieMail=new PHPMailer();

                   //on appelle la fonction on dit que Mailer peut utilisée le protocole SMTP
                   $envoieMail->isSMTP();

                   //pour préciser le serveur
                   $envoieMail->Host='smtp.gmail.com';

                   //on fait appel à SMTP d'authentification on va la mettre sur true pour désigner qu'on 
                   //veut activer l'authentification
                   $envoieMail->SMTPAuth=true;

                   //c'est à partir de cette adresse
                   $envoieMail->Username='paulineaoucher@gmail.com';

                   //on spécifie notre password de notre adresse gmail
                   $envoieMail->Password='tynhmuyifacqxmap';

                   //protocole de cryptage TLS
                   $envoieMail->SMTPSecure='tls';

                   //on spécifie le port par défaut c'est 587 selon la documentation de PHPMailer
                   $envoieMail->Port=587;

                   $envoieMail->setFrom('paulineaoucher@gmail.com');

                   //on spécifie l'adresse de destination
                   $envoieMail->addAddress($mail1);

                   //on va spécifier si les mails peuvent être sous forme d'html
                   $envoieMail->isHTML(true);

                   //objet de notre email
                   $envoieMail->Subject='Réinitialisation du mot de passe';

                   //body de notre email
                   //le lien doit pointer sur la page vérification qui permet le traitement de ce lien
                   //on transmet les pramètres à travers l'url avec un point d'intérogation
                   //il y a deux paramètres qu'on veut faire passer email= si on veut spécifier un autre paramètre on fait le signe &et on
                   //spécifie un autre paramètre
                   $envoieMail->Body='Afin de réinitialisez votre adresse email,merci de cliquez sur le lien suivant:
                   <a href="http://localhost/cuisine2/controllerVisiteur/pageNouveauMotDePasse?email='.$mail1.'&aleatoire='.$appel1.'">Réinitialisation du mot de passe </a>';

                   //$envoieMail->Body="Afin de réinitialisez votre adresse email,merci de cliquez sur le lien suivant:
                   //<a href='http://localhost/cuisine2/pageNouveauMotDePasse/$mail1/$appel1'>Réinitialisation du mot de passe </a>";

                   if(!$envoieMail->send())
                    {
                            $message="Mail non envoyé";
                            echo 'Erreurs:'.$envoieMail->ErrorInfo;
                    }
                    else
                    {
                        $message =  "Nous vous avons envoyé des instructions pour réinitialiser votre mot de passe";
                    }
                }

            }

            if(isset($message))
            {
                echo $message;
            }

        }

}

function nouveauMotDePasse($mail,$aleatoire)
{
     //on va pas permettre à n'importe qui d'accéder à ce formulaire qui permet la saisi du nouveau mot de passe
    // que si il passe à travers le lien que nous avons envoyé par mail à l'utilisateur en question
    if($_GET)
    {

        if(isset($_GET['email']))
        {
            $email = $_GET['email'];
        }

        if(isset($_GET['aleatoire']))
        {
            $aleatoire = $_GET['aleatoire'];
        }

        echo $_GET['email'];
        echo $aleatoire;
        echo $_POST['motdepasse4'];
    
        if(!empty($email) && !empty($aleatoire))
        {
    
            //include('../../communs/connexionBdd.php');
            //on doit savoir si les donner dans la table recuperation du mot de passe existe réellement ou non
            //pour s'assurer que l'utilisateur en question à bien passé à travers le lien que nous lui avons envoyé
    
            //$requete = $bdd->prepare('SELECT * FROM vosrecettes.recuperationmotdepasse WHERE email=:email AND token=:token');
    
            //$requete->bindvalue(':email', $email);
            //$requete->bindvalue(':token', $aleatoire);
    
            //$requete->execute();
            $requete=chercheASavoirSiUtilisateurAEteDansLeLienOuPas($email,$aleatoire);

            //on calcul le nombre de ligne retourné soit une seule ligne soit 0
    
            $nombre = $requete->rowCount();
    
            //c'est à dire si il existe aucun utilisateur dans la table recuperationmotdepasse ayant l'adresse
            //email et le token passé en paramètre par le GET dans ce cas là on doit faire une redirection de la
            //page de l'utilisateur à la page de connexion
            if($nombre!=1)
            {
                header('Location:controllerVisiteur/pageConnexion');
            }
            else
            {
    
                if(isset($_POST['nouveauMotDePasse']))
                {
                    //on doit s'assurer que les duex champs ne sont pas vide et qu'ils soient égal
                   
    
                    if(empty($_POST['motdepasse4']) || $_POST['motdepasse4']!=$_POST['motdepasse5'])
                    {
                        $message = "Rentrer un mot de passse valide";
                    }
                    else
                    {


                        //password hash prend en premier paramètre le premier paramètre de l'utilisateur et une constante
                        //$password2 = sha1($_POST['motdepasse4']);
    
                        //$requete = $bdd->prepare('UPDATE vosrecettes.utilisateur SET MotDePasse=:password1 WHERE Mail=:email');
    
                        //la variable email qui a été passé par le paramètre
                        //$requete->bindvalue(':email',$email);

                        //c'est le password qu'on a hasher et non pas le $_POST
                        //$requete->bindvalue('password1', $password2);

                        //on exécute la requête et on l'a met dans une variable
    
                        //$result = $requete->execute();

                        
                        $result=obtenirUtilisateurMailEtMotDePasse1($email,sha1($_POST['motdepasse4']));

                        if($result)
                        {
                            echo"<script type =\"text/javascript\">
                            alert('Votre mot de passe est bien réinitialisé');
                            document.location.href='connexion.php';
                        </script>";
                     
    
                    }
                    else
                    {
                        
                        header('Location:controllerVisiteur/pageConnexion');
                    }
                }
            }
    
        }
    
    }
    
    }
    else
    {
        header('Location:controllerVisiteur/pageInscription');
    }

    if(isset($message))
    {
        echo $message;
    }
}

function ajouterFavoris()
{
    $postIdUtilisateur=$_POST['idUtilisateur'];
    $postIdRecette=$_POST['idRecette'];
    modelRajouterIdRecetteEtIdUtilisateurDansFavoris($postIdRecette,$postIdUtilisateur,$postIdRecette);
}

function enleverFavoris()
{
    $postIdUtilisateur=$_POST['idUtilisateur'];
    $postIdRecette=$_POST['idRecette'];
    modeleSupprimerIdRecetteEtIdUtilisateurEtIdFavoris($postIdUtilisateur,$postIdRecette);
}

function afficherMonPanier()
{
    include('views/global/espaceMembre/monPanier.php');
    if(isset($_SESSION['Prenom']))
    {
        $resultatRecupererIdRecetteMonPanier = modelIdRecetteMonPanier($_SESSION['idUtilisateur']);
        
    }
       
}







   


/*function afficherConnexionDeconnexion()
{

}*/

?>