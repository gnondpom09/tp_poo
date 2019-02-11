<h1>valeur <em><?= $inserted ?></em> insérée</h1>
<ul>
<?php
foreach($values as $key => $val) :
?>
    <li>
        <?= $key . " : " . $val ?>
    </li>
<?php
endforeach;
?>
</ul>

