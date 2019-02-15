<?php
require('upload.php');


if (isset($_FILES['fichier'])) {
    $loaded_file = $_FILES["fichier"]["name"]; //Nom du fichier sélectionné
    $type  = $_FILES["fichier"]["type"]; //Type du fichier sélectionné
    $size  = $_FILES["fichier"]["size"]; //Taille du fichier
    $error = $_FILES['icone']['error'];  //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    $temp  = $_FILES["fichier"]["tmp_name"];
    //Les extensions acceptées pour les images
    $extensions_valides_img = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'svg' );
    //Les extensions acceptées pour les images
    $extensions_valides_audio = array('webm');
    //Les extensions acceptées pour les images
    $extensions_valides_video = array('ogg');
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE); //type mime du fichier
    $mime = finfo_file($finfo, $temp); //type mime/
    
    //Sélection du répertoire
    if (in_array($finfo, $extensions_valides_img)) { 
        $path = 'multimedia/images';
    }else if (in_array($finfo, $extensions_valides_audio)){
        $path = 'multimedia/audio';
    }else if (in_array($finfo, $extensions_valides_video)){
        $path = 'multimedia/videos';
    }
        $uploaded = move_uploaded_file($_FILES['fichier']['tmp_name'], $path); 
       
    }

