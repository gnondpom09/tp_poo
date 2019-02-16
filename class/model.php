<?php
class Model {

    /**
     * Get Connection to bdd
     *
     * @return void Connection to database
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
    /**
     * Check if user exists in database
     *
     * @param array $identifiers : fullname and password of user
     * @return void
     */
    function checkUser($identifiers) {
        // Get connection
        $bdd = self::getBdd();
        // execute query
        $users = $bdd->prepare("SELECT * FROM users WHERE nom=? AND password=?");
        $users->execute($identifiers);

        // Check if user exists
        if ($users->rowCount() == 1) {
            // Get properties of user find
            while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                // Set session of user logged
                echo "success";
                print_r($row);
                self::signIn($row['id']);
                // redirect to home page
                header('location:index.php');
            }
        } else {
            echo "Aucun utilisateur ne correspont aux identifiants : " . $identifiers;
        }
    }
    /**
     * Connect user to application
     *
     * @param int $userId : id of user logged
     * @return void
     */
    function signIn($userId) {
        // Set current session
        $currentSession = SessionSingleton::getInstance();
        $currentSession->set('user_logged', $userId);
        var_dump($currentSession->get());
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
        $media = $bdd->prepare("SELECT path where id=?");
        $media->execute($idData);

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
        $media->execute($values);

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
         $media = $bdd->prepare("UPDATE datas SET description=? where id=?");
         $media->execute($idData);
 
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
        $media = $bdd->prepare("DELETE FROM datas where id=?");
        $media->execute(array($idData));

        // Access to first result
        if ($media->rowCount() == 1) {
            return $media->fetch(); 
        } else {
            throw new Exception("Aucun média ......." . $idData);
        }
    }
    
}
