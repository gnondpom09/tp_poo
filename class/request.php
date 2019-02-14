<?php
class Request implements InterfaceRequest  {

    public function getParam(string $key): string {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return false;
        }
    }
    
    public function getParams(): array {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $_POST;
        } else {
            return $_GET;
        }
    }
    
    // Routing
    public function route(): string {
        $action = $this->getParam('action');
        if (empty($action)) {
            $action = 'index';
        }
        return $action;
    }
}
