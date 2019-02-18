<?php
session_start();
require('connexionbdd.php');
// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
//require('recuperationId.php');

//$login_valide = "moi";
//$pwd_valide = "lemien";
$login = $_POST['login'];
$pwd = $_POST["pwd"];
//echo $login;
//echo $pwd;

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $reponse= $bdd->query("SELECT users.id FROM users WHERE users.nom = '$login'and users.password = '$pwd'");
	//echo '<br/>reponse query ';
	//echo $reponse;
    $row = $reponse->fetch();
    if ($row['id'] === 0) {
        $flag=false;
       // echo "Vous n'êtes pas inscrit !";
    } else {
        //session_start();
        $_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['pwd'];
		
       // echo "identifié avec succès";
        $flag = true;
    }
    if ($flag) {
        header('location: upload.php');
    } else {
        // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
    }
}
	else {
		echo 'Veuillez saisir votre login et mot de passe';
	}
	
		
//
// on teste si nos variables sont définies
//if (!empty($_POST['login']) && !empty($_POST['pwd'])) {
//	checkLog($login, $pwd, $bdd);
	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	//if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
		// dans ce cas, tout est ok, on peut démarrer notre session
//if (checkLog($login, $pwd, $bdd)) {
	// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		//$_SESSION['login'] = $_POST['login'];
		//$_SESSION['pwd'] = $_POST['pwd'];

		// on redirige notre visiteur vers une page de notre section membre

		