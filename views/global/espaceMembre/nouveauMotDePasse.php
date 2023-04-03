<?php
    include('views/communs/menu.php');
    //include("PHPMailer/PHPMailerAutoload.php");

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    {
      $url = "https";
    }
    else
    {
      $url = "http"; 
    }  
    $url .= "://"; 
    $url .= $_SERVER['HTTP_HOST']; 
    $url .= $_SERVER['REQUEST_URI']; 
    
    //$components = parse_url($url, PHP_URL_QUERY);
    
    //parse_str($components, $results);
    //print_r($results); 
    $mail= $_GET['email'];
    $aleatoire= $_GET['aleatoire'];
   
?>

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Réinitialisation du mot de passe</h2>

              <form action="controllerEspaceMembre/nouveauMotDePasse/<?=$mail?>/<?=$aleatoire?>" method="post" >

              <div class="form-outline mb-4">
                  <input type="password" id="password44" class="form-control form-control-lg" name="motdepasse4"  >
                  <label class="form-label" for="password44">Votre nouveau mot de passe</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password55" class="form-control form-control-lg" name="motdepasse5" >
                  <label class="form-label" for="password55">Veuillez confirmer votre mot de passe</label>
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit"name="nouveauMotDePasse"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Réinitialiser</button>
                </div>

                

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>