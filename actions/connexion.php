<?php
class ConnexionAction extends Action {

    /**
     * Copier cette méthode
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // Get connection to database
        $model = new Model;
        // validate login
        if (isset($_POST)) {
            if (!empty($_POST['fullname']) && !empty($_POST['password'])) {
                // Get fields values
                $fullname = htmlspecialchars($_POST['fullname']);
                $password = htmlspecialchars($_POST['password']);

                // Check if user exists and set session
                $model->signIn($fullname, $password);
            } else {
                // set error message
            }
        }
        
        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/connexion.php'); // modifier la page à afficher
        $this->printOut();
    }
}