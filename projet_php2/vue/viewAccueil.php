<?php
session_start();
require('header.php');
require('controleur/controleurAccueil.php');
?>
<div class="container">
    <div class="grid-1 callout colums-small-6">
        <form class="callout text-center" method='post' action=''>
            <div class="floated-label-wrapper">
                <label for="Auteur">Auteur</label>
                <input type="text"  name="auteur" placeholder="Auteur">
            </div>
            <div class="floated-label-wrapper">
            <div class="form-group">
            <label for="type">Type</label>
            <select name="type"  class="custom-select">
            <option selected value="">--choix du type de média--</option>
            <option  value="audio">Images</option>
            <option  value="audio">Vidéos</option>
            <option  value="audio">Sons</option>
            </select>
            </div>
            </div>
            <div class="floated-label-wrapper">
                <label for="pass">Description</label>
                <input type="text"  name="description" placeholder="Description" required>
            </div>
            <input class="button expanded" type="submit" value="Valider">
        </form>
    </div>

    <div class="grid-2 callout colums-small-6">
    Affichage du média <?php echo $media;?>
    </div>

</div>
<?php
require('../../footer.php');
?>
