<?php
//session_start ();
require('header.php');

?>
<div class="container">
    <div class="grid-1 callout colums-small-6">
        <form class="callout text-center" enctype="multipart/form-data"  action="recherche.php" method= "post">
            <div class="floated-label-wrapper">
                <label for="Auteur">Auteur</label>
                <input type="text"  name="auteur" placeholder="Auteur">
            </div>
            <div class="floated-label-wrapper">
                <label for="type">Type</label>
                <input type="text"  name="type" placeholder="Type" required>
            </div>
            <div class="floated-label-wrapper">
                <label for="pass">Description</label>
                <input type="text"  name="description" placeholder="Description" required>
            </div>
            <input class="button expanded" type="submit" value="Valider">
        </form>
    </div>

    <div class="grid-2 callout colums-small-6">
    Affichage du média
    <?php 
     //echo $media
     //printf ("recherche.php?media=".$media); ?>
    
     </div>

</div>
<?php
require('footer.php');
?>