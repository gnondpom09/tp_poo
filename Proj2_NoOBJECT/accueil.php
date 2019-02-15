<?php
require('header.php');
?>
<div class="container">
    <div class="grid-1 callout colums-small-6">
        <form class="callout text-center">
            <div class="floated-label-wrapper">
                <label for="Auteur">Auteur</label>
                <input type="text"  name="auteur" placeholder="Auteur">
            </div>
            <div class="floated-label-wrapper">
                <label for="type">Type</label>
                <input type="text"  name="type" placeholder="Type">
            </div>
            <div class="floated-label-wrapper">
                <label for="pass">Description</label>
                <input type="text"  name="description" placeholder="Description">
            </div>
            <input class="button expanded" type="submit" value="Valider">
        </form>
    </div>

    <div class="grid-2 callout colums-small-6">
    Affichage du média
    </div>

</div>';
<?php
require('footer.php');
?>