<?php
//formulaire de upload
require('header.php');
?>

<form action='uploading.php' class="callout text-center" enctype="multipart/form-data">
         <div class="floated-label-wrapper">
             <label for="Fichier">Fichier</label>
            <input type="file" id="fichier" name="fichier" placeholder="Fichier">
         </div>
         <div class="floated-label-wrapper">
            <label for="description">Description</label>
             <input type="text" id="description" name="description" placeholder="Description">
         </div>
            <input class="button expanded" type="submit" value="Ajouter" name="ajouter">
</form>';
<?php
        require('footer.php');
?>