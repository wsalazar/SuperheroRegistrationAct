<?php

namespace Application\Registration;

use Application\Request\FormRequest;

class CreateSuperHero extends FormRequest
{
    /**
     * @var \PDO
     */
    private $_connector;

    /**
     * CreateSuperHero constructor.
     * @param \PDO $connector
     */
    public function __construct(\PDO $connector)
    {
        $this->_connector = $connector;
    }

    /**
     * @Description: Ajax call to determine if username exists already.
     * @return mixed
     */
    public function validateUsername()
    {
        $username = $this->post('username');
        $selectQuery = "SELECT id FROM superhero_users where username=:username";
        $params = array(
            'username' => $username,
        );
        $results = $this->_connector->select($selectQuery, $params);
        return $results;
    }

    /**
     * @return bool
     */
    public function create()
    {
        $email = $this->post('email');
        $fullname = $this->post('fullname');
        $username = $this->post('username');
        $password = $this->post('password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT );
        $dateTimeObject = new \DateTime();
        $dateTimeZone = new \DateTimeZone(date_default_timezone_get());
        $dateTimeObject->setTimezone($dateTimeZone);
        $registrationDate = $dateTimeObject->format('Y-m-d H:i:s');
        $insertQuery = "INSERT INTO superhero_users(email,name,password,username,register_date)
                        VALUES(:email, :fullname, :password, :username, :registeredDate)";
        $params = array(
            'email' => $email,
            'fullname' => $fullname,
            'password' => $hashedPassword,
            'username' => $username,
            'registeredDate' => $registrationDate
        );
        return $this->_connector->executeQuery($insertQuery, $params) == true;
    }
}