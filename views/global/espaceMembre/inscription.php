<?php

include("views/communs/menu.php");



?>


<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Créer son compte</h2>

              <form action="controllerEspaceMembre/inscriptionNouveauEtudiant" method="post" onsubmit='return fonctionVerif(true)'>
              

                <div class="form-outline mb-4" id="premiereDiv">
                  <input type="text" id="nom1"name="nom" class="form-control form-control-lg" required />
                  <label class="form-label changerJavaScript" for="nom1" id="nom1Label">Votre nom*</label>
                </div>

                <div class="form-outline mb-4" id='deuxiemeDiv'>
                  <input type="text" id="prenom1" class="form-control form-control-lg" name="prenom" required/>
                  <label class="form-label changerJavaScript" for="prenom1">Votre prénom*</label>
                  
                </div>

                <div class="form-outline mb-4" id='troisiemeDiv'>
                  <input type="email" id="email1"  name="email" class="form-control form-control-lg" name="email" required />
                  <label class="form-label" for="email1" >Votre mail*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email22" class="form-control form-control-lg"name="email2" required />
                  <label class="form-label" for="email22">Répetez votre mail*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password1" class="form-control form-control-lg" name="motdepasse" required />
                  <label class="form-label" for="password1">Votre mot de passe*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password22" class="form-control form-control-lg" name="motdepasse2" required/>
                  <label class="form-label" for="password22">Répetez votre mot de passe*</label>
                </div>

               

                <div class="d-flex justify-content-center">
                  <button type="submit"name="minscrire" value="envoyer"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" >S'enregistrer</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous avez déjà un compte? <a href="controllerVisiteur/pageConnexion"
                    class="fw-bold text-body"><u>Connectez vous ici</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  let nom1=document.getElementById('nom1');
  let prenom1=document.getElementById('prenom1');
  let email1=document.getElementById('email1');
  let email2=document.getElementById('email22');
  let password1=document.getElementById('password1');
  let password22=document.getElementById('password22');


  nom1.minLength=3;
  nom1.maxLength=99;
  prenom1.maxLength=99;
  prenom1.minLength=3;
  var compteurNom=0;
  var compteurPrenom=0;
  //let compteur=0;
  var compteurMail=0;
  var compteurMail2=0;
  var compteurMotDePasse=0;
  var compteurMotDePasse2=0;
  var compteurNomVerif=0;
  var compteurPrenomVerif=0;
  var compteurMail1Verif=0;
  var compteurMail2Verif=0;
  var compteurPasswordVerif=0;

  let recupererParent=document.getElementById('premiereDiv');
  let recupererParentEmail2=document.getElementsByClassName('form-outline')[3];
  let recupererParentPrenom=document.getElementsByClassName('form-outline')[1];
  let recupererParent3=document.getElementById('troisiemeDiv');
  let recupererParentPassword=document.getElementsByClassName('form-outline')[4];
  
  let expressionReguliereMail=new RegExp('^[a-zA-Z0-9_.-]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$'); 
  let expressionRegMotDePasse=RegExp('^[a-zA-Z](?=.{5,})(?=.*[a-z]).*$');
 
  nom1.addEventListener("change",verifNom);
 
  

  function verifNom()
  {
  
    let nomValeur=nom1.value;
   
    if(nomValeur.length<nom1.minLength && compteurNom==0 )
    {
      
        recupererParent.insertAdjacentHTML("beforeend","<p id='nomPetit' style='color:red;'''>Veuillez indiquer un nom plus long s'il vous plait</p>");
        compteurNom++;
       
       
        return ;
        
    }
        if(nomValeur.length>=nom1.minLength)
      {
        let recupererParentPourRemove=document.getElementById('nomPetit');
        recupererParent.removeChild(recupererParentPourRemove);
       
        compteurNom--;
       
        
      }
    
    
    
    
  }

  //pour le prénom

  prenom1.addEventListener('change',verifPrenom);

  
 
  
  function verifPrenom()
  {
    let prenomValeur=prenom1.value;
    if (prenomValeur.length<prenom1.minLength && compteurPrenom==0)
    {
  
      let nouveauParagraphe=document.createElement('p');
      nouveauParagraphe.appendChild(document.createTextNode('Votre prénom est trop court'));
      //let nouveauParagrapheEtContenu=nouveauParagraphe.appendChild(nouveauContenu);
      recupererParentPrenom.appendChild(nouveauParagraphe);
      nouveauParagraphe.style.color='red';
      nouveauParagraphe.id='prenomPetit'
      compteurPrenom++;
      return
    }
    
      if(prenomValeur.length>=prenom1.minLength)
      {
        recupererValeurPetitPourRemov=document.getElementById('prenomPetit');
        recupererParentPrenom.removeChild(recupererValeurPetitPourRemov);
        compteurPrenom--;
      }
    }
    
    {
      verifPrenom();
    }
    
  

  //pour l'adresse email


  email1.addEventListener('change',function()
  {
    
    validationEmail(this);
  })

  const validationEmail= function(nouveauMail)
  {
    let email1Value=email1.value;
    
    let testEmail=expressionReguliereMail.test(email1Value);
    
    if(testEmail==false && compteurMail==0)
    {
      let creationNouveauParagraphe=document.createElement('p');
      let texteNode=document.createTextNode("Votre mail n'est pas valide");
      creationNouveauParagraphe.appendChild(texteNode);
      recupererParent3.appendChild(creationNouveauParagraphe);
      creationNouveauParagraphe.id='nouveauParagraphePourEmailNonValide';
      creationNouveauParagraphe.style.color='red';
      compteurMail++;
      return false;
    }
    
      if(testEmail)
      {
        let retirerMailNonValide=document.getElementById('nouveauParagraphePourEmailNonValide');
        recupererParent3.removeChild(retirerMailNonValide);
        compteurMail--;
        return true;
      }
    
    
    
    
   
  }

  

  //pour la vérification de l'email

  email2.addEventListener('change',verifEmailDeuxieme)

  function verifEmailDeuxieme()
  {
    email1Value=email1.value;
    email2Value=email2.value;

    if(email1Value!=email2Value && compteurMail2==0)
    {
      
      recupererParentEmail2.insertAdjacentHTML('beforeend',"<p id='email2Plus' >Vos deux emails doivent être identique</p>");
      
      recupererEmailPlus=document.getElementById('email2Plus');
      recupererEmailPlus.style.color='red';
      compteurMail2++;
      
    }
    if(email1Value==email2Value)
    {
      
        recupererEmailPlus=document.getElementById('email2Plus');
        recupererParentEmail2.removeChild(recupererEmailPlus);
        compteurMail2--;
      }
     
      
    
  }


//j'ai voulu créer un regex en accord avec ma base de données que j'avais fait
//auparavant ça doit commencer par une minuscule ou majuscule au moins 5 caractères
//au moins des lettres minuscules j'ai essayé de faire on autorise pas deux 
//caractères spéciaux qui se suivent mais j'ai pas su le faire

//^[a-zA-Z](?=.{5,})(?=.*[a-z]).*$
    
password1.addEventListener('change',function()
{
  validationMotDePasse(this);
  
})

const validationMotDePasse=function(motDePasseOk)
{
  let password1Value=password1.value;
 
  let testMotDePasse=expressionRegMotDePasse.test(password1.value);

  if(testMotDePasse==false && compteurMotDePasse==0)
  {
    recupererParentPassword.insertAdjacentHTML("beforeend","<p id='verifMotDePasse1'>Votre mot de passe doit commencer par une lettre et avoir au moins 5 caractères</p>");
    recupererIdVerfiMotDePasse1=document.getElementById("verifMotDePasse1");
    recupererIdVerfiMotDePasse1.style.color="red";
    compteurMotDePasse++;

  }

  if(testMotDePasse)//true
  {
    //methode pour enlever noeud
    recupererParentPassword.removeChild(recupererIdVerfiMotDePasse1);
    recupererIdVerfiMotDePasse1--;
  }
  
}

//pour deuxieme vérification mot de passe
//vérifier que mot de passe1=mot de passe2

password22.addEventListener('change',verifMotDePasseEgaux);

function verifMotDePasseEgaux()
{
  let recupererParentPassword2=document.getElementsByClassName('form-outline')[5];
  if(password1.value!=password22.value && compteurMotDePasse2==0)
  {
    
    let nouveauParagraphePassword=document.createElement('p');
    let nouveauTextPassword=document.createTextNode('Vos mots de passes doivent être identique')
    nouveauParagraphePassword.appendChild(nouveauTextPassword);
    recupererParentPassword2.appendChild(nouveauParagraphePassword);

    nouveauParagraphePassword.style.color='red';
    nouveauParagraphePassword.id='nouveauIdParagraphePassword';
    compteurMotDePasse2++;

  }

  if(password1.value==password22.value)
  { 
    try
    {
      recupererElementParagraphePasswordParSonId=document.getElementById('nouveauIdParagraphePassword')
      recupererParentPassword2.removeChild(recupererElementParagraphePasswordParSonId);
      compteurMotDePasse2--;
    }
    catch
    {
      verifMotDePasseEgaux();
    }
    
  }
}

function fonctionVerif()
{
  if(nom1.value=="")
  {
    if(compteurNomVerif==0)
    {
      recupererParent.insertAdjacentHTML("beforeend","<p id='absenceNom1'>Veuillez mettre une valeur s'il vous plait</p>");
      let absenceNom1=document.getElementById('absenceNom1');
      absenceNom1.style.color='red';
      compteurNomVerif++;
    } 
    return false;
  }
  

  if(prenom1.value=="")
  {
    if(compteurPrenomVerif==0)
    {

      let nouveauParagraphePrenomTropCourt=document.createElement('p')
      let nouveauTextePrenomTropCourt=document.createTextNode("Veuillez remplir ce champs s\'il vous plait");
      nouveauParagraphePrenomTropCourt.appendChild(nouveauTextePrenomTropCourt);
      recupererParentPrenom.appendChild(nouveauParagraphePrenomTropCourt);
      nouveauParagraphePrenomTropCourt.style.color='red';
      compteurPrenomVerif++;
    }
    
   return false;

  }

  if(email1.value=="")
  {
    if(compteurMail1Verif==0)
    {

      let nouveauParagrapheMailAbsent=document.createElement('p')
      let nouveauTexteMailAbsent=document.createTextNode("Veuillez mettre votre adresse mail s'il vous plait");
      nouveauParagrapheMailAbsent.appendChild(nouveauTexteMailAbsent);
      recupererParent3.appendChild(nouveauParagrapheMailAbsent);
      nouveauParagrapheMailAbsent.style.color='red';
      compteurMail1Verif++;
    }
    
   return false;

  }

  if(email2.value=="")
  {
    if(compteurMail2Verif==0)
    {

      let nouveauParagrapheMail2Absent=document.createElement('p')
      let nouveauTexteMail2Absent=document.createTextNode("Veuillez mettre votre adresse mail s'il vous plait");
      nouveauParagrapheMail2Absent.appendChild(nouveauTexteMail2Absent);
      recupererParentEmail2.appendChild(nouveauParagrapheMail2Absent);
      nouveauParagrapheMail2Absent.style.color='red';
      compteurMail2Verif++;
    }

    
   return false;

  }

  if(expressionReguliereMail.test(email1.value)==false)
  {
    
    validationEmail()
    return false;
      
  }

  if(email2.value!=email1.value)
  {
    verifEmailDeuxieme()
    return false;
  }

  if(password1.value=="")
  {
    if(compteurPasswordVerif==0)
    {
      recupererParentPassword.insertAdjacentHTML("beforeend","<p id='rougePasswordAbsent'>Veuillez mettre un mot de passe s'il vous plaît</p>");
      recupererIdPagrapgraphePasswordAbsent=document.getElementById('rougePasswordAbsent');
      recupererIdPagrapgraphePasswordAbsent.style.color='red';
      compteurPasswordVerif++;
    }
    

    return false;
  }

  if(expressionRegMotDePasse.test(password1.value)==false)
  {
    validationMotDePasse();
    return false;
  }

  if(password22.value!=password1.value)
  {
    verifMotDePasseEgaux()
    return false;
  }

 
  
}


  

</script>


<?php 
 include("views/communs/footer.php");
 ?>

 