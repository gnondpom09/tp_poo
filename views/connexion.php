<!-- formulaire de login -->

        <form class="callout text-center" action="" method="post">
            <div class="floated-label-wrapper">
                <label for="full-name">Login</label>
                <input type="text" id="full-name" name="fullname" placeholder="Login">
            </div>
            <div class="floated-label-wrapper">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe">
            </div>
            <input class="button expanded" name="login" type="submit" value="Valider">
            <p>
                Pas encore inscrit ? 
                <a href="<?= $this->getUrl('signup') ?>"> Enregistrez vous</a>
            </p>
        </form>
