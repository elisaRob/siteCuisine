<?php 

include('views/communs/menu.php');

?>

<h2><div class="alert alert-primary" role="alert">
  <?php echo 'Vous vous êtes déconectées'?>
</div></h2>

<div> <a href='controllerVisiteur/pageAccueil' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil </a>
</div>

<br>

<?php

require('views/communs/footer.php');

?>
