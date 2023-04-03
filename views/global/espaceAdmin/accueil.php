<?php



include("views/communs/menu.php");
//include('../../communs/classes/Utilisateur.php');
//include('../../communs/connexionBdd.php');
//include('connexionAdmin.php');



/*if($_SESSION==null)
{
    header("controllerVisiteur/pageAccueil");
    exit();

}



$utilisateurConnecte=new Utilisateur($_SESSION['idUtilisateur'],$_SESSION['Nom'],$_SESSION['Prenom'],$_SESSION['Mail'],$_SESSION['EstSuperAdmin']);

if (!$utilisateurConnecte->getEstSuperAdmin()) 
{
	header("location:controllerVisiteur/pageAccueil");
	exit();
}*/


?>



	

    <section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Espace Administration  <?php /*echo $utilisateurConnecte->getPrenom() . " " . $utilisateurConnecte->getNom() */?></h2>

              <form >

              <h3>Gestion des Utilisateurs</h3>

              <br>
       

                <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                    <button type="button" class="btn btn-success  ">
                        <a class="text-dark" href="controllerAdmin/pageAjouterUnUtilisateur">Ajout d'un nouvel utilisateur</a>
                    </button>  
                </div>

                <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success  ">
                     <a class="text-dark" href="controllerAdmin/afficherTousLesUtilisateurs">Modification et suppression d'un utilisateur</a>
                 </button>  
             </div>

           

             <br>

             <h3>Création et modification de recettes</h3>

             <br>



             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="controllerAdmin/pageAjouterUneRecette">Ajouter une recette</a>
                 </button>  
             </div>


             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="controllerAdmin/afficherToutesLesRecettes">Modification et suppression de la recette</a>
                 </button>  
             </div>

             <!--<div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="">Modification de la photo de la recette</a>
                 </button>  
             </div>

             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="">Modification de la description de la recette</a>
                 </button>  
             </div>

             <br>

             <h3>En plus..</h3>

             <br>

             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="">Modification du type de plats de la recette</a>
                 </button>  
             </div>

             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="">Modification des ingrédients de la recette</a>
                 </button>  
             </div>

             <div class="form-outline mb-4  d-flex  justify-content-center">
                 
                 <button type="button" class="btn btn-success ">
                     <a class="text-dark" href="">Modification du niveau de difficultés de la recette</a>
                 </button>  
             </div>-->


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>