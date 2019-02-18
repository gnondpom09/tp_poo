<?php
require('index.php');
require('connexionbdd.php');


$type=$_POST['type'];
$nom=htmlspecialchars($_POST['nom']);
$description=htmlspecialchars($_POST['description']);

function getPath($type, $description, $nom=null)
{

        //si le nom n'est pas saisi dans le formulaire (formulaire de la page d'accueil)
        if (!isset($nom)) {
            //récupérer le chemin relatif du/des fichier(s) correspondant(s) au type et description saisis
            $chemin = $bdd->query("SELECT datas.chemin_relatif FROM datas where datas.type='$type' and datas.description='$description'");
        } else {
            $chemin = $bdd->query("SELECT datas.chemin_relatif FROM datas,users where datas.auteur_id = users.id and datas.mime_type='$type' and datas.description='$description' and users.nom='$nom'");
        }
        return $chemin;
    
}

if (isset($type) && isset($description)) {
    getPath($type, $description, $nom=null);
    $chemin=getPath($type, $description, $nom=null);
    if ($chemin) { 
        if ($type=='image') {
            //afficher le contenu
            $media= "<img src=\"$chemin\" alt=\"$description\">";
        } else if ($type=='video') {
            $media= " <video controls width=\"250\">
                    <source src=\"$chemin\" type=\"video/webm\">
                   </video>" ;
        }else if($type=='audio') {
            $media= "<audio controls src=\"$chemin\"> </audio>";
        }
    } else {
        echo 'Le media recherché n\'existe pas';
    }
} else {
    echo'Renseignez le type et le contenu du média que vous souhaitez visionner';
}

