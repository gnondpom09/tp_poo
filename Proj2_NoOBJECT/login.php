<?php
//formulaire de login 
require('header.php');
require('login.php');
?>
<div class="container">
    <div class="grid-1 callout ">
        <form class="callout text-center">
         <div class="floated-label-wrapper">
             <label for="login">Login</label> <!-- correspond à nom dans la bdd -->
            <input type="text"  name="login" placeholder="Login">
         </div>
         <div class="floated-label-wrapper">
            <label for="pwd">Mot de passe</label>
             <input type="password"  name="pwd" placeholder="Mot de passe">
         </div>
            <input class="button expanded" type="submit" value="Valider">
        </form>
    </div>
</div>
<?php
require('footer.php');
?>