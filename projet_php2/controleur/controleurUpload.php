<?php
/**
 * Déplacement d'un fichier (audio, video, image) uploadé dans un répertoire 
 * Ecriture dans la table datas de la base de données multimédia des renseignements du fichier: chemin_relatif, mime_type, description, auteur_id, date
 */

require('file:///Users/majy/Desktop/phpFiles/projet_php2/modele/modele.php');
require('file:///Users/majy/Desktop/phpFiles//projet_php2/vue/viewUpload.php');
require('file:///Users/majy/Desktop/phpFiles//projet_php2/vue/viewLogin.php');
require('file:///Users/majy/Desktop/phpFiles//projet_php2/controleur/connexionDB.php');

$post =$_POST['ajouter']; // $post: validation du formulaire
$file ='fichier'; // $file: name dans la balise HTML <input type=file> dans le formulaire viewUpload
$dir ='file:///Users/majy/Desktop/phpFiles/projet_php2/public/multimedia/'; // $dir: repertoire principale où seront stockés les médias

//Déplacement du fichier dans le répertoire adéquat
moveFileToDir($post,$file,$dir);
$info_file=moveFileToDir($post,$file,$dir);
echo $info_file;

// //Ecriture dans la base de données des infos du fichier uploadé
// $date = date("F j, Y, g:i a"); //date de upload
// //echo "<br/> date: ".$date;
// $nom=htmlspecialchars($_POST['login']); //login de l'auteur du fichier uploadé
//  //echo "<br/> login: ".$nom;
// $description=htmlspecialchars($_POST["description"]); //description du contenu
// //echo "<br/> description: ". $description;
// insertMediaToDB($nom, $info_file[0], $info_file[1], $description, $date, $connect);


   
    

    
    


