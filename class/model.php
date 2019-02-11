<?php
class model {
    // Properties
    const FILE = "tmp/store_data.txt";
    
    function storeData($values) {
        if ($fp = @fopen(self::FILE, 'w')) {
            foreach($values as $key => $val) {
                fputs($fp, sprintf("%s=>%s\n", $key, $val));
            }
            fclose($fp);
        } else {
            throw new Exception("Impossible d'ouvrir en écriture " . self::FILE);
        }
    }
    
    function readData() {
        if (is_readable(self::FILE)) {
            foreach(file(self::FILE) as $line) {
                list($key, $val) = explode('=>', trim($line));
                $values[$key] = $val;
                }
            } else {
            $values = [];
        }
        return $values;
    }
    
    function addData($values) {
        $all_values = array_merge($this->readData(), $values);
        $this->storeData($all_values);
    }
    
    function dropData() {
        if(!@unlink(self::FILE)) {
            throw new Exception("Impossible de détruire " . self::FILE);
        }
    }
 
}
