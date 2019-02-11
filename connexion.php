<?php

    try {

        // Identifiers
        $host = 'localhost';
        $dbName = 'projet1';
        $user = 'root';
        $password = 'root';

        // Connection to database
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password);
        
        // Errors management
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $error) {

        // Display errors
        echo "Échec : " . $error->getMessage();

    }

?>