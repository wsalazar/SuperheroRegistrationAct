<?php
require 'setup.php';
if (isset($_POST['clickMe'])) {
    $dir = 'sqlite:superheroRegistrationAct.sqlite';
    $user = new Application\Registration\CreateSuperHero(new Application\DataConnectors\SQLiteConnector($dir));
    $isCreated = $user->create();
    if ($isCreated) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/success.html');
    }
}
