<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.1/dist/css/foundation.min.css" integrity="sha256-1mcRjtAxlSjp6XJBgrBeeCORfBp/ppyX4tsvpQVCcpA= sha384-b5S5X654rX3Wo6z5/hnQ4GBmKuIJKMPwrJXn52ypjztlnDK2w9+9hSMBz/asy9Gw sha512-M1VveR2JGzpgWHb0elGqPTltHK3xbvu3Brgjfg4cg5ZNtyyApxw/45yHYsZ/rCVbfoO5MSZxB241wWq642jLtA==" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="wrapper">

        <header class="subnav-hero-section site-header">
            <h1 class="subnav-hero-headline">MULTIMEDIA</h1>
            <ul class="subnav-hero-subnav">
                <li><a href='viewAccueil.php'>Accueil</a></li>
                <li><a href='viewLogin.php'>Connexion</a></li>
                <li><a href='viewUpload.php'>Upload</a></li>
            </ul>
            <form action="../controleur/deconnexion.php" method="post">
            <div class="grid-2 colums-small-6 "> 
            <input class="button" type="submit" value="Deconnexion">
            </div>
            </form>
        </header>
