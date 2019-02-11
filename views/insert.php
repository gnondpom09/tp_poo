

<form method="post" action="#">
    <fieldset>
        <legend>Valeur à ajouter</legend>
        <input type="hidden" name="action" value="do_insert"/>
        <input type="text" name="inserted"/>
        <input type="submit" name="envoyer"/>
    </fieldset>
</form>

<ul>
<?php
if ($values && count($values) > 0) :

    foreach($values as $key => $val) :
    ?>
        <li>
            <?= $key . " : " . $val ?>
        </li>
        <a href="<?= $this->getUrl('delete') ?>">Destruction des valeurs actuelles</a>
    <?php
    endforeach;
    else :
    ?>
        <p>Aucun résultats</p>
    <?php
endif;
?>
</ul>

