<?php
try
{
	$bdd = new PDO(
		'mysql:host=localhost;dbname=multimedia;charset=utf8', 'root', '1234512345');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
