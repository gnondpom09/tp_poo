<ul>
<?php
// debug
print_r($values);
// Display properties of file
foreach($values as $key => $val) :
?>
    <li>
        <?= $key . " : " . $val ?>
    </li>
<?php
endforeach;
?>
</ul>