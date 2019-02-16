<?php
// autoloader de base permettent de localiser toutes les classes
spl_autoload_register(function($class) {
    include('class/'.strtolower($class).'.php');
});

// Start session
session_start();
// $currentSession = SessionSingleton::getInstance();
// $currentSession->set('admin', 1);
// var_dump($currentSession->get());

 
try {
    $front = FrontController::getInstance()->dispatch();
} catch (Exception $er) {
    echo $er->getMessage();
}
