<?php
require('upload.php');
require('login.php');
require('connexionbdd.php');

if (isset($_POST['ajouter'])) { //si fichier sélectionné
    $loaded_file = $_FILES["fichier"]["name"]; //Nom du fichier sélectionné
    //echo $loaded_file;
    $type  = $_FILES["fichier"]["type"]; //Type du fichier sélectionné
   // echo  "<br/>".$type;
    $size  = $_FILES["fichier"]["size"]; //Taille du fichier
    //echo  "<br/>".$size;
    $error = $_FILES["fichier"]["error"];  //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    $temp  = $_FILES["fichier"]["tmp_name"];
    //Les extensions acceptées pour les images
    $extensions_valides_img = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'svg' );
    //Les extensions acceptées pour les images
    $extensions_valides_audio = array('ogg');
    //Les extensions acceptées pour les images
    $extensions_valides_video = array('webm');
    
    //récupération de l'extension du fichier sélectionné cf. documentation sur : http://php.net/manual/fr/function.pathinfo.php
    $path_parts = pathinfo($loaded_file);
    $extension = $path_parts['extension'];

    //Sélection du répertoire correspondant au type de fichier sélectionné

    if (in_array($extension, $extensions_valides_img)) { // si image
        $path = 'multimedia/images/'.$loaded_file;
    } elseif (in_array($extension, $extensions_valides_audio)) { //si audio
        $path = 'multimedia/audio/'.$loaded_file;
    } elseif (in_array($extension, $extensions_valides_video)) { //si video
        $path = 'multimedia/videos/'.$loaded_file;
    }
    //déplacement du fichier dans le répertoire correspondant à son type
    $uploaded = move_uploaded_file($temp, $path);
    $uploaded = move_uploaded_file($loaded_file, $path);
    echo '<br/>'.$path;
    $description=htmlspecialchars($_POST["description"]);
    echo "<br/> description: ". $description;
    $date = date("F j, Y, g:i a"); //date de upload
    echo "<br/> date: ".$date;

    
    
    $login = $_SESSION['login'];
    $pwd = $_SESSION["pwd"];

      
    $rep = $bdd->query('SELECT users.id FROM users where users.nom="$login"');
    $id=($rep->fetch())['id'];
    echo '<br/>'.$id;
    
    //echo "<br/> id récupéré dans la BDD: ". "$id";
    //Requete pour insérer dans la base de données les renseignements du fichier uploadé
    $reponse_req = $bdd->exec("INSERT INTO `datas`(`chemin_relatif`, `mime_type`, `description`, `auteur_id`, `date`) VALUES ('$path','$type','$description','$id','$date')");
    // echo 'le fichier est bien chargé dans la bdd';
    echo '<br/> Retour requete INSERT: ';
    echo $reponse_req;
//}
}
