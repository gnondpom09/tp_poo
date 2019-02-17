<?php
class View {
 
    /**
     * Get content of page
     *
     * @param [type] $file
     * @param array $assigns
     * @return void
     */
    public function render($file, $assigns = []) {
        array_walk_recursive($assigns, function(&$v) {
            $v = htmlspecialchars($v);
        });
        extract($assigns);
        ob_start();
        include 'header.php';
        require($file);
        include 'footer.php';
        return ob_get_clean();
    }
    /**
     * Get url
     *
     * @param [type] $action
     * @param array $params
     * @return void
     */
    public function getUrl($action, $params = []) {
        $res = '?action=' . $action;
        foreach ($params as $key => $val) {
            $res .= '&amp;' . $key . '=' . urlencode($val);
        }
        return $res;
    }
}
