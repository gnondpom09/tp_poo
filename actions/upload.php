<?php
class UploadAction extends Action {

    /**
     * Copier cette méthode
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // Instancie Model pour appliquer ses methodes CRUD
        $model = new Model;

        // code...
        
        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/upload.php'); // modifier la page à afficher
        $this->printOut();
    }
}