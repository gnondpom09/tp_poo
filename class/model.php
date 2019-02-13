<?php
class Model {
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
        // $db = new PDO('mysql:host=' . $this.$host . ';dbname=' . $this.$dbName, $this.$user, $this.$password, 
        //     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // return $db;
    }

    // Exemple de requette read pour afficher tous les médias
    function readData() {
        // // Get connection
        // $bdd = self::getBdd();
        // // Read datas
        // $datas = $bdd->query('SELECT * FROM datas');
        // return $datas;
    }

    // Exemple requette pour afficher un titre
    function getData($idData) {
        // Get connection
        $bdd = getBdd();
        // execute query
        $billet = $bdd->prepare('SELECT titre where id=?');
        $billet->execute(array($idData));

        // Accès à la première ligne de résultat
        if ($billet->rowCount() == 1) {
            return $billet->fetch(); 
        } else {
            throw new Exception("Aucun média ne correspond à l'identifiant '$idData'");
        }
    }
    
    function addData($values) {
        // requette insert
    }

    function updateData($id) {
        // requette update
    }

    function deleteData($id) {
        // requette delete
    }
    
    function dropData() {

    }

    
 
}
