<?php
require('../modele/modele.php');
// require('../vue/viewAccueil.php');
//require('../vue/viewLogin.php');
require('../controleur/connexionDB.php');

$type=$_POST['type'];
$nom=htmlspecialchars($_POST['nom']);
$description=htmlspecialchars($_POST['description']);

if (isset($type) && isset($description)) {
    getPath($type, $description, $nom=null, $connect);
    $chemin=getPath($type, $description, $nom=null, $connect);
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

