<?php
require('upload.php');
//echo $_POST['Ajouter'];

if (isset($_POST['ajouter'])) {
    
    $loaded_file = $_FILES["fichier"]["name"]; //Nom du fichier sélectionné
    echo $loaded_file;
    $type  = $_FILES["fichier"]["type"]; //Type du fichier sélectionné
    echo  "<br/>".$type;
    $size  = $_FILES["fichier"]["size"]; //Taille du fichier
    echo  "<br/>".$size;
    $error = $_FILES["fichier"]["error"];  //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    $temp  = $_FILES["fichier"]["tmp_name"];
    //Les extensions acceptées pour les images
    $extensions_valides_img = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'svg' );
    //Les extensions acceptées pour les images
    $extensions_valides_audio = array('webm');
    //Les extensions acceptées pour les images
    $extensions_valides_video = array('ogg');
    
    //récupération de l'extension du fichier sélectionné cf. documentation sur : http://php.net/manual/fr/function.pathinfo.php
    $path_parts = pathinfo($loaded_file);
    $extension = $path_parts['extension'];

    //Sélection du répertoire correspondant au type de fichier sélectionné

    if (in_array($extension, $extensions_valides_img)) { // si image
        $path = './multimedia/images';
    } elseif (in_array($extension, $extensions_valides_audio)) { //si audio
        $path = './multimedia/audio';
    } elseif (in_array($extension, $extensions_valides_video)) { //si video
        $path = './multimedia/videos';
    }
    //déplacement du fichier dans le répertoire correspondant à son type
    //$uploaded = move_uploaded_file($_FILES['fichier']['tmp_name'], $path);
    $uploaded = move_uploaded_file($loaded_file, $path);
}