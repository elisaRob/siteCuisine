
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/cuisine2/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link href='../../../bootstrap/css/bootstrap.css' rel="stylesheet" />
    <link href='../../css/main.css' rel="stylesheet"/>
   <link href='../../bootstrap/css/bootstrap.css' rel="stylesheet" />
    <link href='../../../css/main.css' rel="stylesheet"/>-->
    <!--<link href='../../../assets/bootstrap/css/bootstrap.css' rel="stylesheet" />
    <link href='../../../assets/css/main.css' rel="stylesheet"/>-->
    <!--<link href='../../assets/bootstrap/css/bootstrap.css' rel="stylesheet" />
    <link href='../../assets/main.css' rel="stylesheet"/>-->
    <link href='assets/bootstrap/css/bootstrap.css' rel="stylesheet" />
    <!--<link href='../../../assets/bootstrap/css/bootstrap.css' rel="stylesheet" />-->
    <!--<link href='assets/css/main.css' rel="stylesheet"/>-->
    <!--<link href='http://localhost/cuisine2/assets/css/main.css' rel="stylesheet" />-->
    <link href='assets/css/main.css' rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>


<!--Ceci ce sont les cartes les menus de la page principal-->
<div id="gestionCarte">

      <!--Ceci est la bar de navigation avec Boostrap-->
 <div class="m-4">
     <nav class="navbar navbar-expand-lg navbar-light " id="navbar">
         <div class="container-fluid">
             <a href="controllerVisiteur/pageAccueil" class="navbar-brand classMenu" id="nom" >Vos recettes</a>
             
             <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                 <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle classMenu" data-bs-toggle="dropdown" id="recetteParCategorie">Recettes par catégorie</a>
                        <div class="dropdown-menu">
                            <a href="controllerVisiteur/affichagePageEntree" class="dropdown-item classMenu">Entrée</a>
                            <a href="controllerVisiteur/affichagePagePlatsPrincipaux" class="dropdown-item classMenu">Plat principal</a>
                            <a href="controllerVisiteur/affichagePageDessert" class="dropdown-item classMenu">Dessert</a>
                        </div>
                    </div>
                    <!--
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"></a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Inbox</a>
                            <a href="#" class="dropdown-item">Sent</a>
                            <a href="#" class="dropdown-item">Drafts</a>
                        </div>
                    </div>
                    -->
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle classMenu" data-bs-toggle="dropdown" id="contact"  >Contact</a>
                         <div class="dropdown-menu">
                             <a href="controllerVisiteur/pageContact" class="dropdown-item classMenu">Nous ecrire</a>
                    
                         </div>
                     </div>
                 </div>
                 <form class="d-flex flex-column " method='GET' action='controllerVisiteur/affichagePageRechercherRecette'>
                     <div class="input-group ">
                         <input type="search" id="search" name='search1' class="form-control" placeholder="Je cherche un ingrédient,une recette...">
                         <!--<a href='controllerVisiteur/affichagePageRechercherRecette' class='text-white'><button id="btn-search" type="submit" class="btn btn-secondary "><i class="bi-search">Ok</i></button></a>-->
                         <button type='submit' class="btn btn-secondary text-white">ok</button>
                         
                     </div>
                    
                    <!--<div class="card-body">
                         <div class="list-group list-group-item-action" id="content"></div>
                    </div>-->
                 </form>

            

          <?php

if(isset($_SESSION['EstSuperAdmin']))
{

?>
    <div id="pageAdmin">
        <a href="controllerAdmin/pageAccueil"><button type="button" class="btn btn-outline-light classMenu">PageAdmin</button></a>
    </div>

<?php
}



if(isset($_SESSION['Prenom']))
{

    ?>

        <div id="boutonConnexion">
            <a href='controllerEspaceMembre/afficherMonPanier'><button type="button"  class="btn btn-outline-light classMenu">Mon panier</button></a>
        </div>

         <div class="navbar-nav">
             <a href='controllerEspaceMembre/deconnexion' class='classMenu' id="deconnexion">Déconnexion</a>
            
         </div>


    </div>
    </div>
    </nav>
   
</div>


</div>

<?php
}

else
{

?>


           <div class="navbar-nav">
                 <a href='controllerVisiteur/pageConnexion' class='classMenu' id="connexion">Connexion</a>
             </div>

             
         </div>
     </div>
     
 </nav>
 
</div>


</div>


<?php

}

