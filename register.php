<?php
require 'setup.php';
if (isset($_POST['clickMe'])) {
    $dir = 'sqlite:superheroRegistrationAct.sqlite';
    $user = new Registration\CreateSuperHero(new DataConnectors\SQLiteConnector($dir));
    $isCreated = $user->create();
    if ($isCreated) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/success.html');
    }
}
