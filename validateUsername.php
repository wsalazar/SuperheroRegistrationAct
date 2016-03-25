<?php
    require 'setup.php';
    $dir = 'sqlite:superheroRegistrationAct.sqlite';
    $superhero = new Application\Registration\CreateSuperHero(new Application\DataConnectors\SQLiteConnector($dir));
    echo json_encode($superhero->validateUsername());