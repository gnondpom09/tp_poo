<?php
class indexAction extends Action {
    // Properties
    public $file = 'tmp/stored_datas.txt';
    
    /**
     * Display list of items if not empty
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        // get values to display
        $model = new Model;
        $values = $model->readData();
        $response->addVar('values', $values);
        //$response->addVar('params', $this->_controller->getParams());
        
        // Display content of home page
        $this->render(dirname(dirname(__FILE__)) . '/views/index.php');
        $this->printOut();
    }
}
