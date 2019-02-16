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

    function readData() {
        // code
    }

    /**
     * Get media selected
     *
     * @param int $idData : id of media
     * @return void
     */
    function getData($idData) {
        // Get connection
        $bdd = self::getBdd();
        // execute query
        $media = $bdd->prepare('SELECT path where id=?');
        $media->execute(array($idData));

        // Access to first result
        if ($media->rowCount() == 1) {
            return $media->fetch(); 
        } else {
            throw new Exception("Aucun média ne correspond à l'identifiant" . $idData);
        }
    }
    /**
     * Add new media
     *
     * @param int $values : properties of media
     * @return void
     */
    function addData($values) {
        // Get connection
        $bdd = self::getBdd();
        // execute query
        $media = $bdd->prepare("INSERT INTO datas(chemin_relatif, mime_type, description, auteur_id, date)
        VALUES (?,?,?,?,?)");
        $media->execute(array($values));

        // Access to first result
        if ($media->rowCount() == 1) {
            return $media->fetch(); 
        } else {
            throw new Exception("Aucun média ....... " . $values);
        }
    }
    /**
     * update description of media
     *
     * @param int $id : id of media
     * @return void
     */
    function updateData($id) {
         // Get connection
         $bdd = self::getBdd();
         // execute query
         $media = $bdd->prepare('UPDATE datas SET description=? where id=?');
         $media->execute(array($idData));
 
         // Access to first result
         if ($media->rowCount() == 1) {
             return $media->fetch(); 
         } else {
             throw new Exception("Aucun média ......." . $idData);
         }
    }
    /**
     * Delete media selected
     *
     * @param int $id : id of media
     * @return void
     */
    function deleteData($id) {
        // Get connection
        $bdd = self::getBdd();
        // execute query
        $media = $bdd->prepare('DELETE FROM datas where id=?');
        $media->execute(array($idData));

        // Access to first result
        if ($media->rowCount() == 1) {
            return $media->fetch(); 
        } else {
            throw new Exception("Aucun média ......." . $idData);
        }
    }
    
}
