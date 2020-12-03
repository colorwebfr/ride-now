<?php
     require ('include/incl_connBdd.php');
     session_start();  
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
   <title>Ride now</title>
</head>
<body>
<div class="container">

<!--********Début de mon menu G.*********-->
<header>
 <div id="menu_G">
  <ul>
  <?php if (isset($_SESSION['userEmail']) AND isset($_SESSION['userPass']))
  {
  ?>
   <li class="deroulant"><a href="#" class="historiquevisible">Historique</a>
     <ul class="sous">
       <li><a href="#">Mes favoris</a></li>
     </ul>
   </li>
   <?php 
   }
   ?>
  </ul> 
  <ul>
    <li class="deroulant"><a href="#">Inscritption</a>
      <ul class="sous">
        <li><a href="form.php" target="blank" class="inscription">Inscription<br/>connexion</a><hr></li>
        <li><a href="destroySession.php">Deconnexion</a></li>
      </ul>
   </li> 
  </ul>
 </div>
 <div class="messBienvenue">
 <h1>RIDE NOW</h1>
 <?php if (isset($_SESSION['userEmail']) AND isset($_SESSION['userPass']))
{
?>
<p>Bonjour <?= $_SESSION['userPseudo']; ?> !</p>
<?php 
}else{
?>
<p><span class="messageSession">Pour vendre </span>inscris toi vite !</p>
<?php 
}
?>
</div>
<!--au dessus se trouve mes listes deroulantes en column à gauche en haut de mon menu.-->

<!--liste en haut à droite de mon menu comprenant (vend ton matos et un  F.A.Q).-->
<div id="menu_D">
  <ul>
    <?php if (isset($_SESSION['userEmail']) AND isset($_SESSION['userPass']))
    {
    ?>
    <li><a href="formmatos.php" class="matosvisible">Vend<span class="invisible"> ton matos</span></a><br/></li>
    <?php
    } 
    ?>
    <li><a href="F.A.Q.html">F.A.Q</a></li>
  </ul>  
</div>
<!--Fin de mon menu_G-->
</header>
<!--**********Fin de mon (MENU)**********-->

<!--en dessous se trouve la navigation menant aux shop. Il s'affiche en ligne au centre du menu et déroule sur les sous categories.-->
  <nav>
  <ul>
    <li><a href="skate.php">Skate</a></li>
  </ul>
  <ul>  
    <li><a href="surf.php">Surf</a></li>
  </ul>
  <ul>
    <li><a href="paddle.php">Paddle</a></li>
  </ul>
  <ul>
    <li><a href="snowboard.php">Snowboard</a></li>
  </ul>
  </nav>  
<!--fin de nav-shop.-->

<!--**********Début main****************-->
<main class="mainAcceuil">
  <section class="galerie1">
   <article class="cardSnow">
     <a href="https://www.lequipe.fr/Adrenaline/Snowboard/" target="blank"><img src="images/snow.jpg" width="90%" alt="image_de_snow" title="Snowboard news avec l'équipe"></a><br/>
     <h3>Snowboard news</h3>
   </article> 
    <article class="cardSurf">
     <a href="https://www.lequipe.fr/Adrenaline/Surf/" target="blank"><img src="images/surf.jpg" width="90%" alt="image_de_surf" title="Surf news avec l'équipe"></a><br/>
     <h3>Surf news</h3>
   </article> 
  </section>
  <section class="galerie2">
   <article class="cardSkate">
     <a href="https://www.lequipe.fr/Adrenaline/Skateboard" target="blank"><img src="images/skate.jpg" width="90%" alt="image_de_skate" title="Skate news avec l'équipe"></a><br/>
     <h3>Skate news</h3>
   </article> 
    <article class="cardPaddle">
     <a href="https://sup-passion.com/stand-up-paddle/news/" target="blank"><img src="images/paddle.jpg" width="90%" alt="image_de_paddle" title="Paddle news avec sup-passion"></a><br/>
     <h3 class="titlePaddle">Paddle news</h3>
   </article>
  </section>
   <p class="dateLocale">
    <?php 
   echo date('d/m/y');
    ?></p>
</main>
<!--***********Fin de mon (MAIN)*************-->

<!--************Début footer***************-->
<footer>

<div class="formContact"><!--Début de formulaire de contact.-->
  <?php require "include/incl_contactform.php"; ?>
</div><!--in de formulaire de contact.-->

<div id="contact_inf">
    <ul>
      <li class="copy">&copy Kevin Capoccetti</li>
      <li class="boutonContact">Contact</li>
      <li><a href="rgpd.php" class="infoLegales">Information légales</a></li>
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