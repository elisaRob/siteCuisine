<?php

include('views/communs/menu.php');

$conservationId=$idRecette;
?>




    <h2 class="text-uppercase text-center mb-5">Il n'y a pas encore d'étape pour cette recette</h2>
    <div>Vous pouvez cliquez sur le bouton ci dessous pour ajouter une étape.
       
    </div>

    <br>
    <br>


    <form action="controllerAdmin/insertionIdRecetteDescriptifDansLaTableEtape/<?=$conservationId?>" method="post">

        <div id='idParentPourJavascript1'>
            <label for="combienDeEtapes">Dites d'abord combien la recette comporte d'étapes</label>
            <input id="combienDeEtapes"  type="text"><button onclick='recuperationDuNombreDetapes1()' type="button">ok</button>
        </div>

        <div class="d-flex justify-content-center">
        <button type="submit"name="ajouterEtape"class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ajouter</button>
        </div>

    </form>
    

    
    <br>
    <br>
<?php


?>
<br>
<div> <a href='controllerEspaceMembre/pageAdmin' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
</div>

<br>

<div> <a href='controllerAdmin/afficherTousLesUtilisateurs' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la liste des utilisateurs</a>
</div>

<script>

function recuperationDuNombreDetapes1()
  {
    
   
    var recupererNombre=document.getElementById('combienDeEtapes').value;
    var indexationPourLeWhileEtAfficherEtapes =1;
    var recupererNombre1=parseInt(recupererNombre);
    
    while(recupererNombre1>=indexationPourLeWhileEtAfficherEtapes)
    {
      
      var idParent=document.getElementById('idParentPourJavascript1');
      var creationNouveauDiv=document.createElement('div');
      var creationNouveauTextArea=document.createElement('textarea');
      var creationNouveauBr=document.createElement('br');
      var creationNouveauLabel=document.createElement('label');
    
      //var descriptionRecette

      creationNouveauDiv.appendChild(creationNouveauBr);
      creationNouveauLabel.appendChild(document.createTextNode('Etape'+' '+indexationPourLeWhileEtAfficherEtapes));
      idParent.appendChild(creationNouveauDiv);
      creationNouveauDiv.appendChild(creationNouveauLabel);
      creationNouveauDiv.appendChild(creationNouveauBr);
      creationNouveauDiv.appendChild(creationNouveauTextArea);
    
      creationNouveauTextArea.rows='10';
      creationNouveauTextArea.cols='50';
      creationNouveauTextArea.type='textarea';
      creationNouveauTextArea.name='etape[]';
      indexationPourLeWhileEtAfficherEtapes=indexationPourLeWhileEtAfficherEtapes+1;
    }
    

  }

</script>






