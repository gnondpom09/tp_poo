<?php
require('index.php');
require('connexionbdd.php');


$type=$_POST['type'];
//$nom=htmlspecialchars($_POST['nom']);
$description=htmlspecialchars($_POST['description']);



        //si le nom n'est pas saisi dans le formulaire (formulaire de la page d'accueil)
        //if (empty($nom)) {
            //récupérer le chemin relatif du/des fichier(s) correspondant(s) au type et description saisis
            $rep = $bdd->query("SELECT datas.chemin_relatif FROM datas where datas.mime_type='$type' and datas.description='$description'");
            //echo $rep;
           
       // } else {
        //    $rep = $bdd->query("SELECT datas.chemin_relatif FROM datas,users where datas.auteur_id = users.id and datas.mime_type='$type' and datas.description='$description' and users.nom='$nom'");

       // }
        $chemin = $rep->fetch();
        echo "le chemin est : ".$chemin;

if (!empty($type) && !empty($description)) {
   
    if ($chemin) { 
        echo $chemin;
        if ($type=='image') {
            //afficher le contenu
            $media= "<img src=\"$chemin\" alt=\"$description\">";
            echo $media;
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

