<?php
class Model {

    /**
     * Get Connection to bdd
     *
     * @return void Connection to database
     */
    function getBdd() {
        // set identifiers
        $host = '127.0.0.1';
        $dbName = 'multimedia';
        $user = 'root';
        $password = '1234512345';

        // Connection to database
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    /**
     * Check if user exists in database
     *
     * @param string $fullname username of user
     * @return integer Id of user in database
     */
    function checkUser(string $fullname): int {
        // Get connection
        $bdd = self::getBdd();

        // execute query
        $users = $bdd->prepare("SELECT * FROM users WHERE nom=?");
        $users->execute(array($fullname));

        // Check if user exists
        if ($users->rowCount() == 1) {
            // Get properties of user find
            while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                return $row['id'];
            }
        } else {
            return 0;
        }
    }
    /**
     * Connect user to application
     *
     * @param string $fullname
     * @param string $password
     * @return void
     */
    function signIn(string $fullname, string $password) {
        // Check if user exists
        $userId = self::checkUser($fullname, $password);
        if ($userId !== 0) {
            // Set current session
            $currentSession = SessionSingleton::getInstance();
            $currentSession->set('user_logged', $userId);
            var_dump($currentSession->get());

            // redirect to home page
            header('location:index.php');
        } else {
            echo "Utilisateur inconnu";
        }
    }
    /**
     * Save new user in database and connect to application
     *
     * @param string $fullname
     * @param string $password
     * @return void
     */
    function signUp(string $fullname, string $password) {
        // Get connection
        $bdd = self::getBdd();

        // Check if user exists
        $userId = self::checkUser($fullname);
        if ($userId == 0) {
            // Save user in database
            $newUser = $bdd->prepare("INSERT INTO users (nom, password) VALUES (?, ?)");
            $newUser->execute(array($fullname, $password));

            // Redirect to home page and login user
            self::signIn($fullname, $password);
            header('location:index.php');
        } else {
            echo "Il existe deja un compte avec ce pseudo";
        }
    }
    /**
     * Logout
     *
     * @return void
     */
    function logout() {
        // Unset current session
        $currentSession = SessionSingleton::getInstance();
        $currentSession->set('user_logged', 0);
        var_dump($currentSession->get());

        // redirect to hopme page
        header('location:index.php');
    }
    /**
     * Get media selected
     *
     * @param int $idData : id of media
     * @return void
     */
    function getData(int $idData) {
        // Get connection
        $bdd = self::getBdd();

        // execute query
        $media = $bdd->prepare("SELECT path where id=?");
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
     * @param array $values : properties of media
     * @return void
     */
    function addData(array $values) {
        // Get connection
        $bdd = self::getBdd();

        // execute query
        $media = $bdd->prepare("INSERT INTO datas(chemin_relatif, mime_type, description, auteur_id, date)
        VALUES (?, ? ,? ,? ,?)");
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
     * @param string $description : description of media
     * @return void
     */
    function updateData(int $id, string $description) {
         // Get connection
         $bdd = self::getBdd();

         // execute query
         $media = $bdd->prepare("UPDATE datas SET description=? where id=?");
         $media->execute(array($description, $idData));
 
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
    function deleteData(int $id) {
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
