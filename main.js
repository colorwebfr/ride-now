$(document).ready(function(){
  
  $(".glisseFormInscript").on("click", function(){//Bouton inscription obtient une fonction dont la methode est click.
  	   $(".form1").slideDown(1000);//Sur le click le formulaire decend.
});

  $(".glisseFormInscript").on("dblclick", function(){//Ici le bouton obtiend la fonction dont la methode est double click.
  	   $(".form1").slideUp(1000);//Sur le double click le formulaire remonte.
});
  $(".glisseFormConnexion").on("click", function(){
       $(".form2").slideDown(1000);
});

  $(".glisseFormConnexion").on("dblclick", function(){
       $(".form2").slideUp(1000);
});
   $(".boutonContact").on("click", function(){
       $(".formContact").fadeIn(1000);
       $("footer").css({'flex-direction':'column'});
});

  $(".boutonContact").on("dblclick", function(){
       $(".formContact").fadeOut(1000);
       $("footer").css({'flex-direction':'row'});
});
});
//Ci-dessous verification des champs du formulaire.
 var soumettre = document.getElementById('boutonInscription');

soumettre.addEventListener('click', inscription);
    function inscription(e){

    var maIl = document.getElementById('mail').value;
    var pseudo = document.getElementById('prenom').value;
    var pass1 = document.getElementById('pAss1').value;
    var maIlrgx =   /^[a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/;//regex mail.
    var noMprenomrgx = /^[a-zA-Z]+/;//regex valable pour nom et prénom.
    var passReg = /^[A-Za-z]\w{5,18}$/;
    var visibvente = document.getElementsByClassName('matosvisible');
    var visibfavorie = document.getElementsByClassName('historiquevisible');

if (pass1.match(passReg)){
    if (maIl.match(maIlrgx)){//si mail match avec regex return true.
        if (pseudo.match(noMprenomrgx)){//si prénom match avec regex return true.
          
        		return true;
            }else{//autrement prénom ne match pas avec regex, alors return false et envoie le message alert ci-dessous.
    	    e.preventDefault();
    	    alert("Le pseudo entré comporte une syntaxe incorrecte ou n'est pas saisie!");
            }
       }else{//autrement mail ne match pas avec regex,alors return false et envoie le messsage alert ci-dessous.
       e.preventDefault();
       alert("L'adresse email comporte  une syntaxe incorrecte ou n'est pas saisie!");   
      }
 }else{
  e.preventDefault();
  alert("Le mot de passe n'est pas saisie ou ne "+"\n" +"contient pas le nombre de caractere suffisant !");
  return false;
}
}

var soumettre = document.getElementById('boutonConnexion');

soumettre.addEventListener('click', connexion);
    function connexion(e){

    var maIl = document.getElementById('mailConn').value;
    var pseudo = document.getElementById('prenomConn').value;
    var pass1 = document.getElementById('pAss1Conn').value;
    var maIlrgx =   /^[a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/;//regex mail.
    var noMprenomrgx = /^[a-zA-Z]+/;//regex valable pour nom et prénom.
    var passReg = /^[A-Za-z]\w{5,18}$/;

if (pass1.match(passReg)){
    if (maIl.match(maIlrgx)){//si mail match avec regex return true.
        if (pseudo.match(noMprenomrgx)){//si prénom match avec regex return true.
          window.location.open="http://localhost/ride_better/cookie.php";
            return true;
            }else{//autrement prénom ne match pas avec regex, alors return false et envoie le message alert ci-dessous.
          e.preventDefault();
          alert("Le pseudo est incorrecte ou n'est pas saisie!");
            }
       }else{//autrement mail ne match pas avec regex,alors return false et envoie le messsage alert ci-dessous.
       e.preventDefault();
       alert("L'adresse email est incorrecte ou n'est pas saisie!");   
      }
 }else{
  e.preventDefault();
  alert("Le mot de pass est incorrecte ou n'est pas saisie!");
  return false;
}
}




//fonction qui reset tout sans passer par la page javascript.
// onclick="window.location.reload(false)"


/*  var tab_jour = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");//sert à pouvoir afficher le jour en lettres.
    var d = new Date();//new Date() sert à utiliser les object js de date et heures locales preceder d'un point.
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];  */