<?php
    require 'setup.php';
    $dir = 'sqlite:superheroRegistrationAct.sqlite';
    $superhero = new Registration\CreateSuperHero(new DataConnectors\SQLiteConnector($dir));
    echo json_encode($superhero->validateUsername());