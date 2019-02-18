<?php

/**
 * Connexion to database
 *
 * @param [type] $host
 * @param [type] $dbname
 * @param [type] $usr
 * @param [type] $pwd
 * @return void
 */
function connectDB($host, $dbname, $usr, $pwd) {
    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $usr, $pwd);
        return true;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
/**
 * moveFileToDir($post,$file,$dir): Déplace un fichier uploadé (à l'aide d'un formulaire) dans un répertoire en fonction de son type : audio,video,image
 *
 * @param [type] $post
 * @param [type] $file
 * @param [type] $dir
 * @return void
 */
function moveFileToDir($post, $file, $dir) {
    //si fichier sélectionné
    if (isset($post)) {
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
        // si image
        if (in_array($extension, $extensions_valides_img)) { 
            $path = $dir.'images/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Veuillez choisir une image au format jpeg , gif ,png, svg.';
        }
        //si audio
        if (in_array($extension, $extensions_valides_audio)) {
            $path = $dir.'audio/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Veuillez choisir un fichier audio au format ogg.';
        }
        //si video
        if (in_array($extension, $extensions_valides_video)) {
            $path = $dir.'videos/'.$loaded_file_name;
        } else {
            echo'Le type de fichier n\'est pas supporté <br/> Seul le format webm est accepté';
        }
        //déplacement du fichier dans le répertoire correspondant à son type
        $uploaded = move_uploaded_file($temp, $path);
        $uploaded = move_uploaded_file($loaded_file_name, $path);
    }
    // return path and type of file uploaded
    return array($path, $type);
}
/**
 * Récupère le chemin relatif du fichier recherché
 *
 * @param [type] $type
 * @param [type] $description
 * @param [type] $nom
 * @param [type] $connect
 * @return void
 */
function getPath($type, $description, $nom, $connect) {
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
 *
 * @param [type] $nom
 * @param [type] $chemin_relatif
 * @param [type] $mime_type
 * @param [type] $description
 * @param [type] $date
 * @param [type] $connect
 * @return void
 */
function insertMediaToDB($nom, $chemin_relatif, $mime_type, $description, $date, $connect) {
    if ($connect) {
        //récupère l'identifiant correspondant au login d'authentification
        $rep = $bdd->query("SELECT users.id FROM users where users.nom='$nom'");
        $id = ($rep->fetch())['id'];

        //Requete pour insérer dans la base de données les renseignements du fichier uploadé
        $reponse_req = $bdd->exec("INSERT INTO `datas`(chemin_relatif, mime_type, description, auteur_id, date) 
            VALUES ($chemin_relatif, $mime_type, $description, $id, $date)");
        if ($reponse_req) { //si écriture dans la base de données
            echo 'le fichier est bien chargé dans la base de données';
        }
    } else {
        echo 'Connexion à la base de données requise';
    }
}
/**
 * Check if user exists
 *
 * @param [type] $login
 * @param [type] $pwd
 * @param [type] $connect
 * @return void
 */
function checkLog($login, $pwd, $connect) {
    if ($connect) {
        $exc= execute('SELECT COUNT(*) as nb FROM id WHERE login = "$login" and password = "$pwd"');
        $row = $exec->fetch();
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
