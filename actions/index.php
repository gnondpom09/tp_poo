<?php
class IndexAction extends Action {

    /**
     * Get media selected
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // get values to display
        $model = new Model;
        // Query to get medias
        // Display media selected
        // code...

        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/index.php');
        $this->printOut();
    }
}
