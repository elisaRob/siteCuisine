<?php

    include("views/communs/menu.php");
    //include("PHPMailer/PHPMailerAutoload.php");

?>



<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Mots de passe oublié</h2>

              <form action="controllerEspaceMembre/oublieMotDePasse" method="post" >

                <div class="form-outline mb-4">
                  <input type="email" id="email44"name="email4" class="form-control form-control-lg" >
                  <label class="form-label" for="email44">Votre adresse email</label>
                </div>

               

                <div class="d-flex justify-content-center">
                  <button type="submit"name="motDePasseOublie"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reinitialiser mon mot de passe</button>
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
 include("views/communs/footer.php");
 ?>
