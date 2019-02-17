<?php
class Request implements InterfaceRequest  {

    /**
     * Get param
     *
     * @param string $key
     * @return string
     */
    public function getParam(string $key): string {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return false;
        }
    }
    /**
     * Get params
     *
     * @return array
     */
    public function getParams(): array {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $_POST;
        } else {
            return $_GET;
        }
    }
    /**
     * Routing
     *
     * @return string
     */
    public function route(): string {
        $action = $this->getParam('action');
        if (empty($action)) {
            $action = 'index';
        }
        return $action;
    }
}
