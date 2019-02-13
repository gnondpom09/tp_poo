<?php
class deleteAction extends Action {
    // Properties
    public $file = 'tmp/stored_datas.txt';

    /**
     * Get values and display page
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        $model = new Model;
        // Get values to delete
        $values = $model->readData();
        $response->addVar('values', $values);

        // Display content of the page
        $this->render(dirname(dirname(__FILE__)) . '/views/delete.php');
        $this->printOut();
    }
}
