<?php 
    session_start();
    require ('include/incl_connBdd.php');

       $messerreurmatos = "";
       $successMessageMatos = "";
       $requEchouéMatos = "";
       $error3 = "";
       $errorsizeimg = "";
       $errorImageDownload = "";

        // Envoi de fichier
   /* $_FILES['image']['name']//nom
    $_FILES['image']['type']//type image png
    $_FILES['image']['size']//taille du fichier
    $_FILES['image']['tmp_name'] //emplacement
    $_FILES['image']['error']//erreur*/
    //envoie image dans repertoire imagesUtilisateurs.


     if (isset($_POST['submitmatos']))
    {
      if(isset($_FILES['image']))
      { 
         $dossier = 'upload/';
         $fichier = basename($_FILES['image']['name']);
         if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie     TRUE, c'est que ça a fonctionné...
         {
          echo '';
         }
         else //Sinon (la fonction renvoie FALSE).
         {
          $errorImageDownload = "L'image n'a pas pu être télécharger !";
         }
      }

        if (!empty($_POST['titre']) AND !empty($_SESSION['userPseudo']) AND !empty($_POST['prix']) AND !empty($_POST['ville']) AND !empty($_POST['tel']) AND !empty($_POST['mail']) AND !empty($_POST['description']) AND !empty($_FILES['image']) AND ($_POST['select'] == 1)) 
        { 
            $reponse = $bdd->prepare("INSERT INTO skate ( pseudo, titre, descriptif, prix,  ville, tel, email, image) VALUES ( :pseudo, :titre, :descriptif, :prix, :ville, :tel, :email, :image)");

              $reponse->execute(array(
              "pseudo"=>$_SESSION['userPseudo'],
              "titre"=>$_POST['titre'],
              "descriptif"=>$_POST['description'],
              "prix"=>$_POST['prix'],
              "ville"=>$_POST['ville'],
              "tel"=>$_POST['tel'],
              "email"=>$_POST['mail'],
              "image"=>$_FILES['image']['name']
              ));

              $successMessageMatos = 'Votre requête va être traité !';
              header('refresh:3;url=index.php');

              }elseif ($_POST['select'] == 2) //Si la value selectionner dans le formulaire est 2 cela correspond à la table surf
              {
              $reponse = $bdd->prepare("INSERT INTO surf ( pseudo, titre, descriptif, prix, ville, tel, email, image) VALUES ( :pseudo, :titre, :descriptif, :prix, :ville, :tel, :email, :image)");
                $reponse->execute(array(
                "pseudo"=>$_SESSION['userPseudo'],
                "titre"=>$_POST['titre'],
                "descriptif"=>$_POST['description'],
                "prix"=>$_POST['prix'],
                "ville"=>$_POST['ville'],
                "tel"=>$_POST['tel'],
                "email"=>$_POST['mail'],
                "image"=>$_FILES['image']['name']
                ));

                $successMessageMatos = 'Votre requête va être traité !';
                header('refresh:3;url=index.php');

              }elseif ($_POST['select'] == 3) //Si la value selectionner dans le formulaire est 3 cela correspond à la table paddle
              {
                $reponse = $bdd->prepare("INSERT INTO paddle ( pseudo, titre, descriptif, prix, ville, tel, email, image) VALUES ( :pseudo, :titre, :descriptif, :prix, :ville, :tel, :email, :image)");

                $reponse->execute(array(
                "pseudo"=>$_SESSION['userPseudo'],
                "titre"=>$_POST['titre'],
                "descriptif"=>$_POST['description'],
                "prix"=>$_POST['prix'],
                "ville"=>$_POST['ville'],
                "tel"=>$_POST['tel'],
                "email"=>$_POST['mail'],
                "image"=>$_FILES['image']['name']
                ));

                $successMessageMatos = 'Votre requête va être traité !';
                header('refresh:3;url=index.php');

              }elseif ($_POST['select'] == 4)//4 correspond à la table snowboard
              {
                $reponse = $bdd->prepare("INSERT INTO snowboard ( pseudo, titre, descriptif, prix, ville, tel, email, image) VALUES ( :pseudo, :titre, :descriptif, :prix, :ville, :tel, :email, :image)");

                $reponse->execute(array(
                 "pseudo"=>$_SESSION['userPseudo'],
                 "titre"=>$_POST['titre'],
                 "descriptif"=>$_POST['description'],
                 "prix"=>$_POST['prix'],
                 "ville"=>$_POST['ville'],
                 "tel"=>$_POST['tel'],
                 "email"=>$_POST['mail'],
                 "image"=>$_FILES['image']['name']
                 ));

                $successMessageMatos = 'Votre requête va être traité !';
                header('refresh:3;url=index.php');
        }
        else
        {
          $messerreurmatos = "Tout les champs ne sont pas remplis !";
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
    <meta name="description" content="Ce site est le repère de tout les amoureux de skate, de surf, de snowboard et paddle désireux de trouver du materiel de qualité et à faible côut. Il sagit ni plus ni moins d'un depot vente en ligne stylé et fait pour et par un rider.">

  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="stylesheet" type="text/css" href="./style/formStyle.css">
  <link rel="stylesheet" href="./style/media.css">
   <title>Vend ton matos</title>
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
<main> 
<div class="matosform"> <!--ci-dessous les messages d'erreurs-->
  <?php require('include/incl_formmatos.php'); ?>
  <?php echo "<p style='color:red; text-align:center;'>".$messerreurmatos."</p>";
        echo "<p style='color:green; text-align:center;'>".$successMessageMatos."</p>";
        echo "<p style='color:red; text-align:center;'>".$requEchouéMatos."</p>";
        echo "<p style='color:red; text-align:center;'>".$error3."</p>"; 
        echo "<p style='color:red; text-align:center;'>".$errorsizeimg."</p>";
        echo "<p style='color:red; text-align:center;'>".$errorImageDownload."</p>";
  ?>
</div>
</main>

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