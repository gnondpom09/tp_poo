<h1>Voulez-vous suppimer les valeurs suivantes ?</h1>
<?php
if (count($values) > 0) :
?>
    <ul>
    <?php
    foreach ($values as $key => $val) :
        ?>
        <li>
            <?= $key . ' : ' . $val ?>
        </li>
        <?php
    endforeach;
    ?>
    </ul>
    <?php
endif;
?>
<form method="post" action="#">
    <fieldset>
        <legend>réaliser la suppression ?</legend>
        <input type="hidden" name="action" value="do_delete"/>
        <input type="submit" name="cancel" value="Annuler"/>
        <input type="submit" name="confirm" value="Confirmer"/>
    </fieldset>
</form>
