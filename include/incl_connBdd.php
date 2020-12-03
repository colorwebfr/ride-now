<?php 

     try
    {  
        $bdd = new PDO('mysql:host=localhost;dbname=ride;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// On se connecte à MySQL
    }
        catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }  // Si tout va bien, on peut continuer, sinon un message nous indiquera une erreur

 ?>