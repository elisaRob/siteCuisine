<?php

include('views/communs/menu.php');

?>
 
 




<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Contactez nous</h2>

              
              <form action="controllerVisiteur/envoieMailContact" method="post"onsubmit='return fonctionContact(true)'>
              <!--<form action="" method="post"enctype="multipart/form-data">-->
              <!--<form action="controllerAdmin/recupererIdDeIngredient" method="post"enctype="multipart/form-data">-->

              <!--<input type='hidden' name='id' value= >-->

              

                <div class="form-outline mb-4">
                  <input type="text" id="nom7" class="form-control form-control-lg" name="nom7" min-length
                  required pattern='^[a-zA-Z0-9_\.]{3,}$'minlength="3" /><!--j'accepte les a z minuscules A-Z majuscules les underscore et 
                  les points,les tirets répeter plusieurs fois au moins trois fois-->
                  <label class="form-label" for="nom7" >Votre nom (obligatoire)*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email7" class="form-control form-control-lg" name="email7" required pattern="^[a-zA-Z0-9_.-]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$"/>
                  <label class="form-label" for="email7">Votre email (obligatoire)*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="sujetContact" class="form-control form-control-lg"name="sujetContact" required pattern='^[a-zA-Z0-9]{2,}$'/><!--là j'ai mis deux caractères-->
                  <label class="form-label" for="sujetContact">Sujet(obligatoire)*</label>
                </div>

                <div class="form-outline mb-4">
                  <textarea type="text-area" id="messageContact"  name="messageContact" class="form-control form-control-lg" rows="10" cols="30" required ></textarea>
                  <!--je vais interdire les liens j'ai mis aussi les www. on sait jamais donc là si c'est vrai c'est bon -->
                  <label class="form-label" for="messageContact" >Votre message(obligatoire)*</label>
                </div>

                  <button type='submit' name='envoyerFormulaireContact'  class="btn btn-success" >Envoyer</button>
              
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    include('views/communs/footer.php');
?>

<script>

let compteurNom=0;
let compteurEmail=0;
let compteurSujet=0;
let compteurMessageContact=0;

let nom7 = document.getElementById("nom7");
let email7=document.getElementById("email7");
let sujetContact=document.getElementById('sujetContact');
let messageContact=document.getElementById('messageContact');

let recupererParentNom=document.getElementsByClassName('form-outline')[0]
let recupererParentMail=document.getElementsByClassName('form-outline')[1]
let recupererParentSujet=document.getElementsByClassName('form-outline')[2]
let recupererParentMessageContact=document.getElementsByClassName('form-outline')[3]

let regexMessageContact=new RegExp("^(?!.*(http)s?)(?![a-zA-Z0-9]*\/[a-zA-Z0-9]*\/)(?!.*(www\.)).*$",'gm');

nom7.addEventListener("change",verifNom )


function verifNom()
{
  nomPattern=nom7.pattern;
  let regexNom=new RegExp(nomPattern);
  if(regexNom.test(nom7.value)==false)
  {
    if(compteurNom==0)
    {
      recupererParentNom.insertAdjacentHTML('beforeend',"<p id='nomNonConforme')>Votre nom peut contenir des minuscules ,majuscules,underscore ou des tirets et doit avoir au moins 3 lettres e pas de caractères accentuées</p>");
      let nomNonConforme=document.getElementById('nomNonConforme');
      nomNonConforme.style.color='red';
      compteurNom++;
    }

  }
  if(regexNom.test(nom7.value))
  {
    let nomNonConforme1=document.getElementById('nomNonConforme');
    recupererParentNom.removeChild(nomNonConforme1);
    compteurNom--;
  }
}

email7.addEventListener('change',verifMail);

function verifMail()
{
  let mailPattern=email7.pattern;
  let regexEmail=new RegExp(mailPattern);
  if(regexEmail.test(email7.value)==false)
  {
    if(compteurEmail==0)
    {
      recupererParentMail.insertAdjacentHTML('beforeend',"<p id='mailNonConforme')>Votre email est non conforme</p>");
      let mailNonConforme=document.getElementById('mailNonConforme');
      mailNonConforme.style.color='red';
      compteurEmail++;
    }

  }
  if(regexEmail.test(email7.value))
  {
    let mailNonConforme1=document.getElementById('mailNonConforme');
    recupererParentMail.removeChild(mailNonConforme1);
    compteurEmail--;
  }
}

sujetContact.addEventListener('change',verifSujet);

function verifSujet()
{
  let sujetContactPattern=sujetContact.pattern;
  let sujetContactValue=sujetContact.value;

  let sujetContactRegex=new RegExp(sujetContactPattern);
  let testRegex=sujetContactRegex.test(sujetContactValue);

  if(testRegex==false)
  {
    if(compteurSujet==0)
    {
      let nouveauParagrapheSujet=document.createElement('p');
      let nouveauTexteParagrapheSujet=document.createTextNode('Le nom du sujet contient des caractères pas pris en charge');
      nouveauParagrapheSujet.appendChild(nouveauTexteParagrapheSujet);
      recupererParentSujet.appendChild(nouveauParagrapheSujet);
      nouveauParagrapheSujet.id='nouveauIdParagrapheSujet';
      nouveauParagrapheSujet.style.color='red';
      compteurSujet++;
    }
  }
  if(testRegex)
  {
    recupererNouveauIdParagrapheSujet=document.getElementById('nouveauIdParagrapheSujet');
    recupererParentSujet.removeChild(recupererNouveauIdParagrapheSujet);
    compteurSujet--;
  }
}

messageContact.addEventListener('change',verifMessageContact)

function verifMessageContact()
{
  
  let messageContactValue=messageContact.value;
  let testMessageContactRegEx=regexMessageContact.test(messageContactValue);
  

  if(testMessageContactRegEx==false)
  {
    if(compteurMessageContact==0)
    {
      let nouveauParagrapheMessageContact=document.createElement('p');
      let nouveauTexteParagrapheMessageContact=document.createTextNode("Veuillez ne pas mettre de liens s'il vous plait");
      nouveauParagrapheMessageContact.appendChild(nouveauTexteParagrapheMessageContact);
      recupererParentMessageContact.appendChild(nouveauParagrapheMessageContact);
      nouveauParagrapheMessageContact.id='nouveauIdParagrapheMessageContact';
      nouveauParagrapheMessageContact.style.color='red';
      compteurMessageContact++;
    }
  }
  if(testMessageContactRegEx)
  {
    nouveauParagrapheIdMessageContact=document.getElementById('nouveauIdParagrapheMessageContact');
    recupererParentMessageContact.removeChild(nouveauParagrapheIdMessageContact);
    compteurMessageContact--;
  }

}
function fonctionContact()
{
  if(regexMessageContact.test(messageContact.value)==false)
  {
    verifMessageContact();
    return false;
  }

  
}
</script>