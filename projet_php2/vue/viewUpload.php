<?php
session_start();
require('header.php');
$nom= $_SESSION['login'];
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
   echo '
   <p class="floated-label-wrapper"> Bienvenue <?php echo $nom ?></p>
   <form action="/projet_php2/controleur/controleurUpload.php" method= "post" class="callout text-center" enctype="multipart/form-data">
            
            <div class="floated-label-wrapper">
               
                <label for="Fichier">Fichier</label>
               <input type="file" name="fichier"  value="fichier" placeholder="Fichier">
            </div>
            <div class="floated-label-wrapper">
               <label for="description">Description</label>
                <input type="text"  name="description" placeholder="Description">
            </div>
               <input class="button expanded" type="submit" value="ajouter" name="ajouter">
   </form>
   <div class="floated-label-wrapper"> </div>';
} else {
   echo "Vous devez vous identifiez pour charger des fichiers";
}
?>
                   
       
<?php
 require('footer.php');
 ?>
