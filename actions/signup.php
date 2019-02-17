<?php
class SignupAction extends Action {

    /**
     * Save new user in database and connect to application
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // Get connection to database
        $model = new Model;
        // validate form
        if (isset($_POST)) {
            if (!empty($_POST['fullname']) && !empty($_POST['password']) && !empty($_POST['repeat'])) {
                // Get fields values
                $fullname = htmlspecialchars($_POST['fullname']);
                $password = htmlspecialchars($_POST['password']);
                $repeat = htmlspecialchars($_POST['repeat']);
                
                // Check password and repeat password
                if ($password === $repeat) {
                    // Save new user and login
                    $model->signUp($fullname, $password);
                } else {
                    echo "Les mots de passe doivent etre identiques";
                }
            } else {
                // set error message
            }
        }
        
        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/signup.php'); // modifier la page à afficher
        $this->printOut();
    }
}