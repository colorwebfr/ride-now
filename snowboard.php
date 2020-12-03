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
   <title>Snowboard-shop</title>
</head>
<body>
<div class="container">
<?php require ('include/incl_header.php'); ?>
<main>
  
<?php
    require ('include/incl_connBdd.php');
        
    $reponse = $bdd->query('SELECT * FROM snowboard WHERE 1');
    while ($row = $reponse->fetch(PDO::FETCH_OBJ)) {
      $image = $row->image;
    echo '<div>
    <table>
    <tr>
    <th><h2 style=text-align:left;>Article</h2><br/></th>
    </tr>
    <tr>
    <td style="padding:15px;">
    <p style="color:#333333;font-size:22px;"><span style="color:black;font-size:25px;">Annonceur: </span>'.$row->pseudo.'</p>
    <p style="color:#333333;font-size:22px;"><span style="color:black;font-size:25px;">Produit: </span>'.$row->titre.'</p>
    <img src="upload/'.$image.'" width="70%" height="auto" alt="imageArticle"></img>
    <p style="color:#333333;font-size:22px;">'.$row->descriptif.'</p>
    <p style="color:#333333;font-size:22px;"><span style="color:black;font-size:25px;">Localiser à: </span>'.$row->ville.'</p>
    <p style="color:#333333;font-size:22px;"><span style="color:black;font-size:25px;">Email: </span>'.$row->email.'</p>
    <p style="color:#333333;font-size:22px;"><span style="color:black;font-size:25px;">Tel: </span>'.$row->tel.'</p>
    <a href="#" id="ajoutFavorieSnowboard">Ajouter<a>
    <br/><br/>
    </td>
    </tr>
    </table>
    </div>';
    }
    
    //$bdd->exec("DELETE FROM produittest WHERE id=$id");              
    ?> 

</main>

<footer>
  <div class="formContact"><!--Début de formulaire de contact.-->
  <section class="paraghform">
      <fieldset>
        <form action="capoccetti@outlook.fr" method="post">
                <div class="mail">
                    <p><label for="mail">Mail:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Votre mail" length="28" id="mail" class="mail" name="recupInfo" value=""></p>
                </div>
                <div class="nom">
                    <p><label for="nom">Nom:</label>
                    <span class="asterix">*</span><input type="text" autofocus placeholder="Nom" length="28" id="nom" class="nom" name="recupInfo" value=""></p>
                </div>
                <div class="prenom">
                    <p><label for="prenom">Prénom:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Prenom" length="28" id="prenom" class="prenom" name="recupInfo" value=""></p>
                </div>
                <div class="commentaireForm">
                    <p><label for="commentaireForm">Commentaires:</label>
                    <textarea class="commentaireForm" id="commentaireForm" cols="20" rows="6" name="commentaire" type="text" placeholder="Observation:" value=""></textarea></p>
                </div>
                <div class="boutonForm">
                    <input type="submit" class="boutonF1" id="boutonContact" name="submitContact" value="VALIDER">
                    <input type="reset" class="boutonF2" id="boutonF2" name="reset" value="ANNULER">
                </div>
        </form>
      </fieldset>
  </section>     
</div><!--in de formulaire de contact.-->
  <div id="contact_inf">
    <ul>
      <li class="copy">&copy Kevin Capoccetti</li>
      <li class="boutonContact">Contact</li>
      <li><a href="rgpd.php" class="infoLegales">Information légales</a></li>
      <li><a href="aPropos.html" class="propos">à propos</a></li>
    </ul>
</div>
</footer>
<!--************Fin de mon (FOOTER)*************-->

</div>
<script src="jQuery.js"></script>
<script src="main.js" ></script>
</body>
</html>