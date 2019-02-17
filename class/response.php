<?php
class Response {
    private $_vars = [];
    private $_headers = ['Content-type' => 'text/html'];
    private $_body;
    
    /**
     * Add variable
     *
     * @param [type] $key
     * @param [type] $value
     * @return void
     */
    public function addVar($key, $value) {
        $this->_vars[$key] = $value;
    }
    /**
     * Get varaible
     *
     * @param [type] $key
     * @return void
     */
    public function getVar($key) {
        return $this->_vars[$key];
    }
    /**
     * Get variables
     *
     * @return void
     */
    public function getVars() {
        return $this->_vars;
    }
    /**
     * Set body of page
     *
     * @param [type] $value
     * @return void
     */
    public function setBody($value) {
        $this->_body = $value;
    }
    /**
     * Redirect
     *
     * @param [type] $url
     * @param boolean $permanent
     * @return void
     */
    public function redirect($url, $permanent = false) {
        if ($permanent) {
            $this->_headers['Status'] = '301 Moved Permanently';
        } else {
            $this->_headers['Status'] = '302 Found';
        }
        $this->_headers['location'] = $url;
    }
    /**
     * Display content
     *
     * @return void
     */
    public function printOut() {
        foreach ($this->_headers as $key => $value) {
            header($key . ': ' . $value);
        }
        echo $this->_body;
    }
}
