<?php
class model {
    // Identifiers
    private $host = 'localhost';
    private $dbName = 'multimedia';
    private $user = 'root';
    private $password = 'root';

    /**
     * Get Connection to bdd
     *
     * @return void
     */
    function getBdd() {
        // Connection to database
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password);
        return $bdd;
    }

    // Exemple de requette read
    function readData() {
        // Get connection
        $bdd = getBdd();
        // Read datas
        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc');
        return $billets;
    }
    
    function addData($values) {
        // requette insert
    }

    function updateData($id) {
        // requette update
    }
    
    function dropData($id) {
        // requette delete
    }

    
 
}
