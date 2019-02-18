<?php

/**
 * moveFileToDir($post,$file,$dir): Déplace un fichier uploadé (à l'aide d'un formulaire) dans un répertoire en fonction de son type : audio,video,image
 * $post: validation du formulaire
 * $file: name dans la balise HTML <input type=file>
 */

function moveFileToDir($post, $file, $dir)
{
    //$retour = Array ();
    if (isset($post)) { //si fichier sélectionné
        $loaded_file_name = $_FILES["$file"]["name"]; //Nom du fichier sélectionné
        //echo $loaded_file_name;
        $type  = $_FILES["$file"]["type"]; //Type du fichier sélectionné
       // echo  "<br/>".$type;
        $size  = $_FILES["$file"]["size"]; //Taille du fichier
        //echo  "<br/>".$size;
        $error = $_FILES["$file"]["error"];  //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
        $temp  = $_FILES["$file"]["tmp_name"];
        //Les extensions acceptées pour les images
        $extensions_valides_img = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'svg' );
        //Les extensions acceptées pour les images
        $extensions_valides_audio = array('ogg');
        //Les extensions acceptées pour les images
        $extensions_valides_video = array('webm');
        
        //récupération de l'extension du fichier sélectionné cf. documentation sur : http://php.net/manual/fr/function.pathinfo.php
        $path_parts = pathinfo($loaded_file_name);
        $extension = $path_parts['extension'];
        $extension = strtolower($extension);
    
        //Sélection du répertoire correspondant au type de fichier sélectionné
    
        if (in_array($extension, $extensions_valides_img)) { // si image
            $path = $dir.'images/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Veuillez choisir une image au format jpeg , gif ,png, svg.';
        }
       
        if (in_array($extension, $extensions_valides_audio)) { //si audio
            $path = $dir.'audio/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Veuillez choisir un fichier audio au format ogg.';
        }
        if (in_array($extension, $extensions_valides_video)) { //si video
            $path = $dir.'videos/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Seul le format webm est accepté';
        }
        //déplacement du fichier dans le répertoire correspondant à son type
        $uploaded = move_uploaded_file($temp, $path);
        $uploaded = move_uploaded_file($loaded_file_name, $path);
        //echo '<br/>'.$path;
    }
    // $retour[0]=$chemin_relatif;
    // $retour[1]=$mime_type;
    //return $retour;
    //
    return array($path, $type);
}
/**
 * Connexion à la base de données
 */
/**
 * Undocumented function
 *
 * @param [type] $host
 * @param [type] $dbname
 * @param [type] $usr
 * @param [type] $pwd
 * @return void
 */
function connectDB($host, $dbname, $usr, $pwd)
{ //connexion  à la base de données
    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $usr, $pwd);
        return true;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
/**
 * Récupère le chemin relatif du fichier recherché
 * $type: type du fichier recherché
 * $description: description du contenu du fichier
 * $nom: nom de l'auteur du fichier (facultatif)
 * $connect: boolean vérification que la connexion à la bdd est établie
 */
function getPath($type, $description, $nom=null, $connect)
{
    if ($connect) {
        //si le nom n'est pas saisi dans le formulaire (formulaire de la page d'accueil)
        if (!isset($nom)) {
            //récupérer le chemin relatif du/des fichier(s) correspondant(s) au type et description saisis
            $chemin = $bdd->query("SELECT datas.chemin_relatif FROM datas where datas.type='$type' and datas.description='$description'");
        } else {
            $chemin = $bdd->query("SELECT datas.chemin_relatif FROM datas,users where datas.auteur_id = users.id and datas.mime_type='$type' and datas.description='$description' and users.nom='$nom'");
        }
        return $chemin;
    } else {
        echo 'Connexion à la base de données requise';
    }
}

/**
 * Insertion des données relatives au fichié uploadé dans la base de données
 * $nom: nom de l'auteur du fichier
 * $chemin_relatif: emplacement du fichier sur la machine coté client
 * $mime_type:type mime du fichier
 * $description: description du contenu du fichier
 * $date: date de l'upload
 * $connect: boolean vérification que la connexion à la bdd est établie
 */
function insertMediaToDB($nom, $chemin_relatif, $mime_type, $description, $date, $connect)
{
    if ($connect) {
        //récupère l'identifiant correspondant au login d'authentification
        $rep = $bdd->query("SELECT users.id FROM users where users.nom='$nom'");
        $id=($rep->fetch())['id'];

        //Requete pour insérer dans la base de données les renseignements du fichier uploadé
        $reponse_req = $bdd->exec("INSERT INTO `datas`(`chemin_relatif`, `mime_type`, `description`, `auteur_id`, `date`) VALUES ('$chemin_relatif','$mime_type','$description','$id','$date')");
        if ($reponse_req) { //si écriture dans la base de données
            echo 'le fichier est bien chargé dans la base de données';
        }
    } else {
        echo 'Connexion à la base de données requise';
    }
}
function checkLog($login, $pwd, $connect)
{
    if ($connect) {
        $exc= execute('SELECT COUNT(*) as nb FROM id WHERE login = "$login" and password = "$pwd"');
        $row = $exec -> fetch();
       if ($row['nb'] === 0) 
        {
        echo "Vous n'êtes pas inscrit !";
        }
        else {
           session_start();
           echo "identifié avec succès";
        } 
    } else {
        echo 'Connexion à la base de données requise';
    }
}
