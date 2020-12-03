<?php 
session_start();
require ('include/incl_connBdd.php');

$error1 ='';
$error2 ='';
$newcount ='';

if (isset($_POST['submit']) AND isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['pass'])) 
{
    
    if (!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['email'])) 
    {
    
        $pseudo_Exist = $bdd->prepare("SELECT pseudo FROM user WHERE pseudo = :pseudo");//On recupère les pseudo de t'as base ou les pseudo son egal au pseudo passer par le formulaire 
        $pseudo_Exist->bindValue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $pseudo_Exist->execute();//on exécute la requête
        $pseudoINbdd = $pseudo_Exist->rowCount();//Rowcount permet de sortir le nombre de valeur que t'as requête renvoi, que l'on rentre dans la variable     pseudoINbdd (ou autre )

        $pass_Exist = $bdd->prepare("SELECT pass FROM user WHERE pass = :pass");
        $pass_Exist->bindValue('pass', $_POST['pass'], PDO::PARAM_STR);
        $pass_Exist->execute();
        $passINbdd = $pass_Exist->rowCount();

        $email_Exist = $bdd->prepare("SELECT email FROM user WHERE email = :email");
        $email_Exist->bindValue('email', $_POST['email'], PDO::PARAM_STR);
        $email_Exist->execute();
        $emailINbdd = $email_Exist->rowCount();

        if (($pseudoINbdd == 0) AND ($emailINbdd == 0) AND ($passINbdd == 0))//Si la requête renvoi 0, le pseudo n'existe pas dans la base, sinon le pseudo     existe. 
        {
            // On envoie les données
            $reponse = $bdd->prepare("INSERT INTO user ( pseudo, pass, email) VALUES ( :pseudo, :pass, :email)");

            $reponse->execute(array(
            "pseudo"=>$_POST['pseudo'],
            "pass"=>$_POST['pass'],
            "email"=>$_POST['email']
            ));

            $reponse->closeCursor(); // Termine le traitement de la requête
            $newcount = 'Félicitation le compte à bien été crée!';
            header('refresh:2;url=index.php'); 
            
        }
        else
        {  
          $error2 = 'le ou les  champs existe déjà pour un autre utilisateur!';   
        }
    }
    else
    {    
      $error1 = 'Remplissez tout les champs afin de validez votre inscription. Merci';    
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="sublime text">
    <meta name="robots" content="all">
    <meta name="author" content="Kevin Capoccetti">
    <meta name="keywords" content="Skate, Snowboard, Surf, Paddle, Dépot-vente, Skateshop, Sport de glisse.">
    <meta name="description" content="Ce site est le repère de tout les amoureux de skate, de surf, de snowboard et paddle désireux de trouver du materiel de qualité et à faible coût. Il s'agit ni plus ni moins d'un dépôt vente en ligne stylé et fait pour et par un rider.">

  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="stylesheet" type="text/css" href="./style/formStyle.css">
  <link rel="stylesheet" href="./style/media.css">
   <title>formulaire</title>
</head>
<body>
<div class="container">

<!--********Début de mon menu*********-->
<header><!--Début menu guauche-->
 <div id="menu_G">
  <ul>
   <li class="deroulant"><a href="index.php">Accueil</a></li>
  </ul> 
 </div>
 <h1>RIDE NOW</h1>

<!--Le menu droit contient un lien vers un F.A.Q.-->
<div id="menu_D">
  <ul>
    <li><a href="F.A.Q.html">F.A.Q</a></li>
  </ul>  
</div>
<!--Fin de mon menu_D-->
</header>
<!--**********Fin de mon (MENU)**********-->

<!--en dessous se trouve la navigation menant aux formulaire de connexion et d'inscription.-->
  <nav> 
  <a href="#" class="glisseFormInscript">Inscription</a>
  <a href="#" class="glisseFormConnexion">Connexion</a>
  </nav>  
<main>


<div class="form1"><!--Début de formulaire d'inscription.-->
  <?php   require "include/incl_inscriptform.php" ?>
</div><!--in de formulaire d'inscription.-->

<?php
  echo "<p style='color:red; text-align:center;'>".$error1."</p>";
  echo "<p style='color:red; text-align:center;'>".$error2."</p>";//Erreur possible du form d'inscription!
  echo "<p style='color:green; text-align:center;'>".$newcount."</p>"; 
?>

<!--En dessous le traitement du formulaire de connection-->
<?php
require ('include/incl_connBdd.php');

$champsvide = '';
$pasincrit = '';
$successMessage = '';


if (isset($_POST['submitconnex'])) 
{
      if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['pass'])) 
    {

      $requ = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND email = ? AND pass = ?");
      $requ->execute(array($_POST['pseudo'], $_POST['email'], $_POST['pass']));
      $usercount = $requ->rowCount();
      
          if ($usercount == 1)
        {
            $userinfo = $requ->fetch();
            $_SESSION['userID'] = $userinfo['ID'];
            $_SESSION['userPseudo'] = $userinfo['pseudo'];
            $_SESSION['userEmail'] = $userinfo['email'];
            $_SESSION['userPass'] = $userinfo['pass'];

            $successMessage = 'Vous êtes maintenant connecté !';
            header('refresh:3;url=index.php');
        }
        else
        {
            $pasincrit = "Vous devez d'abord vous inscrire !";
        }
    } 
    else
    {
       $champsvide = 'Tous les champs ne sont pas remplis !';
    }
}

?>
<div class="form2"><!--Début de formulaire de connexion.-->
  <?php require "include/incl_connexform.php"; ?>
</div><!--fin de formulaire de connexion.-->

<?php 
     echo "<p style='color:red; text-align:center;'>".$champsvide."</p>";
     echo "<p style='color:red; text-align:center;'>".$pasincrit."</p>";
     echo "<p style='color:green; text-align:center;'>".$successMessage."</p>";
?>


    <iframe src="https://www.youtube.com/embed/NdGC2Yyt_aQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</main>
<!--******Fin de mon (MAIN)******-->

<!--******Début footer*******-->
<footer>

<div class="formContact"><!--Début de formulaire de contact.-->
  <?php require "include/incl_contactform.php" ?>
</div><!--in de formulaire de contact.-->

  <div id="contact_inf">
    <ul>
      <li class="copy">&copy Kevin Capoccetti</li>
      <li class="boutonContact">Contact</li>
      <li><a href="#" class="infoLegales">Information légales</a></li>
      <li><a href="aPropos.html" class="propos">à propos</a></li>
    </ul>
</div>
<a href="https://www.instagram.com/zampakuto/" target="blank" class="instaLogo"><img src="images/insta.png" width="70px" alt="logo_instagram"></a><!--Lien menant à un compte instagram dédié.-->
</footer>
<!--************Fin de mon (FOOTER)*************-->

</div>
<script src="jQuery.js"></script>
<script src="main.js" ></script>
</body>
</html>