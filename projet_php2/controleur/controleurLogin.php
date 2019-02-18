<?php
require('../vue/viewLogin.php');
require('../modele/modele.php');
require('../controleur/connexionDB.php');

$login = $_POST['login'];
$pwd = $_POST["pwd"];

if (empty($login) | empty($pwd)) 
{
 echo 'Entrez votre login et votre mot de passe';
}else {
   checkLog($login,$pwd,$connect);
}