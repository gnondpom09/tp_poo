<?php
class insertAction extends Action {

    /**
     * Read datas and add value inserted
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        $model = new Model;
        // Get new values
        $new_val = $request->getParam('inserted');
        $values = $model->readData();
        $response->addVar('values', $values);

        // Display content of the page
        $this->render(dirname(dirname(__FILE__)) . '/views/insert.php');
        $this->printOut();
    }
}
