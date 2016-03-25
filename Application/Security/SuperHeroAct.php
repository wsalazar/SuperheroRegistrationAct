<?php

namespace Application\Security;

use Application\DataConnectors\DatabaseConnector;
use Application\Request\FormRequest;

class SuperHeroAct extends FormRequest
{
    /**
     * @var \PDO
     */
    private $_connector;

    /**
     * SuperHeroAct constructor.
     * @param \PDO $connector
     */
    public function __construct(\PDO $connector)
    {
        $this->_connector = $connector;
    }

    /**
     * @return bool
     */
    public function watched()
    {
        $username = $this->post('username');
        $enteredPassword = $this->post('password');
        $dateTimeObject = new \DateTime();
        $dateTimeZone = new \DateTimeZone(date_default_timezone_get());
        $dateTimeObject->setTimezone($dateTimeZone);
        $lastLoginDate = $dateTimeObject->format('Y-m-d H:i:s');
        $selectQuery = "SELECT id, password FROM superhero_users where username=:username";
        $params = array(
            'username' => $username,
        );
        $results = $this->_connector->select($selectQuery, $params);
        foreach($results as $result) {
            $actualPassword = $result['password'];
            if (password_verify($enteredPassword, $actualPassword)) {
                $updateQuery = "UPDATE superhero_users set last_login=:lastLogin WHERE username =:username";
                $params = array(
                    'lastLogin' => $lastLoginDate,
                    'username' => $username,
                );
                return $this->_connector->executeQuery($updateQuery, $params) == true;
            } else {
                return false;
            }
        }
    }
}