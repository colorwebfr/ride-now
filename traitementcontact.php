<?php

//emai , pseudo, message.
$monemail = 'capoccettiwebdev@gmail.com';
$message = $_POST['message'];
$useremail = $_POST['email'];

    if (isset($message)) {
        $position_arobase = strpos($useremail, '@');
        if ($position_arobase === false)
            echo '<p>Votre email doit comporter un arobase.</p>';
        else {
            $retour = mail($monemail, 'Envoi depuis la page Contact', $message, 'From: ' . $useremail);
            if($retour)
                echo '<p>Votre message a été envoyé.</p>';
            else
                echo '<p>Erreur.</p>';
        }
    }
    ?>