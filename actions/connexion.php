<?php
class ConnexionAction extends Action {

    /**
     * Login form
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // Instancie Model pour appliquer ses methodes CRUD
        $model = new Model;
        // validate login
        if (isset($_POST)) {
            if (!empty($_POST['fullname']) && !empty($_POST['password'])) {

                // Set current session
                $fullname = htmlspecialchars($_POST['fullname']);
                $password = htmlspecialchars($_POST['password']);
                $identifiers = [$fullname, $password];
                $model = new Model();

                // Check if user exists and set session
                $model->checkUser($identifiers);
            } else {
                // set error message
            }
        }
        
        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/connexion.php'); // modifier la page à afficher
        $this->printOut();
    }
}