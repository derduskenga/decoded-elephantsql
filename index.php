<?php
    include_once 'user.php';
    include_once 'db.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    $event = $_POST['event'];
    if($event == "register"){
        //register
        $fullName = $_POST['fullName'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User($username, $password);
        $user->setFullName($fullName);
        echo $user->register($pdo);
    }else {
        //login
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User($username, $password);
        echo $user->login($pdo);
    } 
?>