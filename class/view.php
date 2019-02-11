<?php
class View {
 
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
    
    public function getUrl($action, $params = []) {
        $res = '?action=' . $action;
        foreach ($params as $key => $val) {
            $res .= '&amp;' . $key . '=' . urlencode($val);
        }
        return $res;
    }
}
