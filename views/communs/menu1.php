      
              
<?php
  session_start();
 

    if(isset($_SESSION['Prenom']))
    {

        ?>

             <div class="navbar-nav">
                 <a href='controllerEspaceMembre/deconnexion' id="deconnexion">Déconnexion</a>
                
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
                     <a href='ControllerVisiteur/pageAccueil' id="connexion">Connexion</a>
                 </div>

                 
             </div>
         </div>
     </nav>
 </div>

</div>

<?php

    }
?>