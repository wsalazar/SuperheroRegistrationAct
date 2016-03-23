<?php
    require 'setup.php';
    $dir = 'sqlite:makerbotdb.sqlite';
//var_dump($_POST, 'haha');
//exit;
    $superhero = new Registration\CreateSuperHero(new DataConnectors\SQLiteConnector($dir));
//    header ("Content-Type:text/xml");
    echo json_encode($superhero->validateUsername());
//    header("Location: http://".$_SERVER['HTTP_HOST'].'/superheroWatched.html');
//        $username = trim($_POST['username']);
//        $password = trim($_POST['password']);
//        var_dump($username, $password);
//        $dateTimeObject = new DateTime();
//        $dateTimeZone = new DateTimeZone(date_default_timezone_get());
//        $dateTimeObject->setTimezone($dateTimeZone);
//        $lastLoginDate = $dateTimeObject->format('Y-m-d H:i:s');
//        $dir = 'sqlite:makerbot.sqlite';
//        $db = new PDO($dir) or die('cannot connect to sqlite');
//        $selectQuery = "SELECT id FROM makerbot_users where username='".$username."' and password='".$password."'";
//
//        try {
//            $results = $db->query($selectQuery) or die('Could not write to table');
//            foreach($results as $row) {
//                echo $row['id'] . '<br />';
//                $userId = $row['id'];
//                $updateQuery = "UPDATE makerbot_users set last_login='".$lastLoginDate."'";
//                $db->exec($updateQuery) or die('Could not write to table');
//
//            }
//        } catch(PDOException $e) {
//            echo 'Exception in Select query: ' . $e->getMessage();
//        }