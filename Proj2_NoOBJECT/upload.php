<?php
//formulaire de upload
session_start();
require('header.php');
//require('recuperationId.php');
$nom=$_SESSION['login'];
//$nom='toi';
?>

<p class="floated-label-wrapper"> Bienvenue <?php echo $nom ?></p>
<form action="uploading.php" method= "post" class="callout text-center" enctype="multipart/form-data">
         
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
<div class="floated-label-wrapper"> </div>
       
<?php
 require('footer.php');
 ?>