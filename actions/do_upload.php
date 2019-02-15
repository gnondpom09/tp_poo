<?php
class do_uploadAction extends Action {
    
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
        $new_val = $request->getParam('fichier');
        $model->addData(array($new_val));
        $response->addVar('fichier', $new_val);

        // Display values
        $this->render(dirname(dirname(__FILE__)) . '/views/do_upload.php');
        $this->printOut();
    }
}
