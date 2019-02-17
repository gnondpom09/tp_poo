<?php
abstract class Action {
    protected $_controller;
    
    /**
     * Constructor
     *
     * @param [type] $controller
     */
    public function __construct($controller) {
        $this->_controller = $controller;
    }
    /**
     * Launch page of application
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    abstract public function launch(Request $request, Response $response);
    
    /**
     * Get content of file to display
     *
     * @param [type] $file
     * @return void
     */
    public function render($file) {
        $this->_controller->render($file);
    }
    /**
     * Display content of page
     *
     * @return void
     */
    public function printOut() {
        $this->_controller->getResponse()->printOut();
    }
    /**
     * Forward
     *
     * @param [type] $module
     * @param [type] $action
     * @return void
     */
    protected function _forward($module, $action) {
        $this->_controller->forward($module, $action);
    }
    /**
     * Redirect
     *
     * @param [type] $url
     * @return void
     */
    protected function _redirect($url) {
        $this->_controller->redirect($url);
    }
}
