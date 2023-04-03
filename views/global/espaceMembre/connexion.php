<?php
  
    //include("../../communs/fonctionUtile.php");
  
   
    include("views/communs/menu.php");
   
    
    ?>

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Se connecter</h2>

              <form action="controllerEspaceMembre/connexion" method="post" >

                <div class="form-outline mb-4 " id='parentMail'>
                  <input type="email" id="email33"name="email3" class="form-control form-control-lg" required pattern='^[a-zA-Z0-9_.-]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$' value=<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>>
                  <label class="form-label" for="email33">Votre mail</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password33" class="form-control form-control-lg" name="motdepasse3" required value=<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?> >
                  <label class="form-label" for="password33">Votre mot de passe</label>
                </div>

                <div class="form-outline mb-4">
                  <label for="seSouvenir" >Se souvenir de moi</label>
                  <input type="checkbox" name="seSouvenir" id="seSouvenir"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"name="connexion"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Se connecter</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous êtes pas inscrit? <a href="controllerVisiteur/pageInscription"
                    class="fw-bold text-body" name="sinscrire"><u>Inscrivez vous ici</u></a></p>

                <p class="text-center text-muted mt-5 mb-0">Vous avez oublié votre mot de passe? <a href="controllerVisiteur/pageOublieDuMotDePasse"
                    class="fw-bold text-body"><u>Cliquez ici</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
 include("views/communs/footer.php");
 ?>

 <script>

  let compteurEmail1=0;

  let recupererParentMail1=document.getElementById('parentMail');

  email33.addEventListener('change',verifMail1);

  function verifMail1()
  {
    let mailPattern1=email33.pattern;
    let regexEmail1=new RegExp(mailPattern1);
    if(regexEmail1.test(email33.value)==false)
    {
      if(compteurEmail1==0)
      {
        recupererParentMail1.insertAdjacentHTML('beforeend',"<p id='mailNonConforme1')>Votre email est non conforme</p>");
        let mailNonConforme1=document.getElementById('mailNonConforme1');
        mailNonConforme1.style.color='red';
        compteurEmail1++;
      }

    }
    if(regexEmail1.test(email33.value))
    {
      let mailNonConforme1=document.getElementById('mailNonConforme1');
      recupererParentMail1.removeChild(mailNonConforme1);
      compteurEmail1--;
    }
 }
 </script>