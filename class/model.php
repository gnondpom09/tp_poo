<?php
class Model {

    /**
     * Get Connection to bdd
     *
     * @return void
     */
    function getBdd() {
        $host = '127.0.0.1';
        $dbName = 'multimedia';
        $user = 'root';
        $password = '1234512345';
        // // Connection to database
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         return $db;
    }

    // Exemple de requette read pour afficher tous les médias
    function readData() {
        // // Get connection
        // $bdd = self::getBdd();
        // // Read datas
        // $datas = $bdd->prepare("SELECT * FROM datas");
        // $datas->execute();
        // return $datas;
    }

    // Exemple requette pour afficher un titre
    function getData($idData) {
        // Get connection
        $bdd = getBdd();
        // execute query
        $billet = $bdd->prepare('SELECT path where id=?');
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
        // Get connection
        $bdd = getBdd();
        // execute query
        $billet = $bdd->prepare("INSERT INTO datas(chemin_relatif, mime_type, description, auteur_id, date)
        VALUES (?,?,?,?,?)");
        $billet->execute(array($values));

        // Accès à la première ligne de résultat
        if ($billet->rowCount() == 1) {
            return $billet->fetch(); 
        } else {
            throw new Exception("Aucun média ....... ".$values);
        }
    }

    function updateData($id) {
        // requette update
         // Get connection
         $bdd = getBdd();
         // execute query
         $billet = $bdd->prepare('UPDATE datas SET.............');
         $billet->execute(array($idData));
 
         // Accès à la première ligne de résultat
         if ($billet->rowCount() == 1) {
             return $billet->fetch(); 
         } else {
             throw new Exception("Aucun média ....... '$idData'");
         }
    }

    function deleteData($id) {
        // requette delete
        // Get connection
        $bdd = getBdd();
        // execute query
        $billet = $bdd->prepare('DELETE FROM datas............... ');
        $billet->execute(array($idData));

        // Accès à la première ligne de résultat
        if ($billet->rowCount() == 1) {
            return $billet->fetch(); 
        } else {
            throw new Exception("Aucun média ....... '$idData'");
        }
    }
    
    function dropData() {

    }

    
 
}
