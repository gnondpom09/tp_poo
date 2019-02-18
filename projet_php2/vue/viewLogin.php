<?php
//session_start();
require('header.php');
?>
<!-- formulaire de login  -->
<div class="container">
    <div class="grid-1 callout ">
        <form class="callout text-center" action="viewUpload.php" method="post">
            <p> Veuillez vous identifier pour charger des médias</p>
         <div class="floated-label-wrapper">
             <label for="login">Login</label> <!-- correspond à 'nom' dans la bdd -->
            <input type="text"  name="login" placeholder="Login" required>
         </div>
         <div class="floated-label-wrapper">
            <label for="pwd">Mot de passe</label>
             <input type="password"  name="pwd" placeholder="Mot de passe" required>
         </div>
            <input class="button expanded" type="submit" value="Connexion">
        </form>
    </div>
</div>
<?php
require('footer.php');
?>
