<?php
class do_deleteAction extends Action {
    // Properties
    public $file = 'tmp/stored_datas.txt';

    /**
     * Display list empty
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // Delete datas or redirect to home page
        if ($request->getParam('confirm')) {
            $model = new Model;
            $model->dropData();
        } else {
            $response->redirect($this->_controller->getUrl('index'));
        }
        
        // Display content of the page
        $this->render(dirname(dirname(__FILE__)) . '/views/do_delete.php');
        $this->printOut();
    }
}
