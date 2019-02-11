<?php
class do_insertAction extends Action {
    // Properties
    public $file = 'tmp/stored_datas.txt';
    
    /**
     * Push new datas and display results
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function launch(Request $request, Response $response) {
        $model = new Model;
        // Push new datas
        $new_val = $request->getParam('inserted');
        $model->addData(array($new_val));
        $values = $model->readData();
        $response->addVar('inserted', $new_val);
        $response->addVar('values', $values);

        // Display values
        $this->render(dirname(dirname(__FILE__)) . '/views/do_insert.php');
        $this->printOut();
    }
}
