<?php

//include("vues/communs/menu.php");
//include('models/espaceAdmin/connexionBdd.php');
include('views/communs/menu.php');


?>


<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter un Utilisateur</h2>

              <!--<form action="../../../controllers/espaceAdmin/controllerAjouterUtilisateur.php?action=ajouterUnUtilisateur()" method="post">-->
              <!--<form action="index.php?action=controllerAjouterUtilisateur/ajouterUnUtilisateur" method="post">-->
              <!--<form action="controllerAjouterUtilisateur.php/ajouterUnUtilisateur()" method="post">-->
              <form action="controllerAdmin/ajouterUnUtilisateur" method="post">

              

              <div class="form-outline mb-4">
                  <input type="text" id="nom5" class="form-control form-control-lg" name="nom5"/>
                  <label class="form-label" for="nom5">Nom de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="prenom" class="form-control form-control-lg" name="prenom"/>
                  <label class="form-label" for="prenom">Prénom de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="mail"  name="mail" class="form-control form-control-lg" pattern='^[a-zA-Z0-9_.-]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$' />
                  <label class="form-label" for="mail" >Mail de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="motDePasse" class="form-control form-control-lg"name="motDePasse" />
                  <label class="form-label" for="motDePasse">Mot de passe de l'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="admin" class="form-control form-control-lg" name="admin" pattern='^[10]$'/><!--je n'accepte que les un ou les zéros-->
                  <label class="form-label" for="admin">Utilisateur admin ou non(1 admin 0 non admin)</label>
                </div>

               

                <div class="d-flex justify-content-center">
                  <button type="reset"name="effacer"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Effacer</button>
                </div>
                <br>

                <div class="d-flex justify-content-center">
                  <button type="submit"name="ajouterUtilisateur"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">AjouterUtilisateur</button>
                </div>
                <br>

                <div> <a href='controllerEspaceMembre/pageAdmin' class="d-flex justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
                </div>

               
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
 //include("vues/communs/footer.php");
 include("views/communs/footer.php");
 ?>

 <script>
    idAdmin=document.getElementById('admin');
    compteurPourFonctionAdmin=0;
    

    idAdmin.addEventListener('change',verifAdmin)

    function verifAdmin()
    {
      let adminPattern=idAdmin.pattern;
      let regexAdmin=new RegExp(adminPattern);
      let testRegex=regexAdmin.test(idAdmin.value);
      selectionParent=document.getElementsByClassName('form-outline')[4];
      if(testRegex==false && compteurPourFonctionAdmin==0)
      {
        
        let nouveauParagraphe=document.createElement('p');
        let nouveauTexte=document.createTextNode("Veuillez mettre ou soit 0 ou soit 1.0 voudra dire que l'utilisateur n'est pas un admin et si vous mettez 1 alors vous mettez l'utilisateur au rang de Admin");
        nouveauParagraphe.appendChild(nouveauTexte);
        selectionParent.appendChild(nouveauParagraphe);
        nouveauParagraphe.id='idNouveauParagrapheAdmin';
        nouveauParagraphe.style.color='red';
        compteurPourFonctionAdmin++;

      }
      if(testRegex==true )
      {
        recuperationNouveauParagraphe=document.getElementById('idNouveauParagrapheAdmin');
        selectionParent.removeChild(recuperationNouveauParagraphe);
        compteurPourFonctionAdmin--;
      }
    }
    
 </script>