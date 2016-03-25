<?php
require 'setup.php';
if (isset($_POST['clickMe'])) {
    $dir = 'sqlite:superheroRegistrationAct.sqlite';
    $superhero = new Application\Security\SuperHeroAct(new Application\DataConnectors\SQLiteConnector($dir));
    if (!$superhero->watched()) {
        echo "<meta http-equiv=Refresh content=0;url=login.html?error=error>";
    } else {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/superheroWatched.html');
    }
}