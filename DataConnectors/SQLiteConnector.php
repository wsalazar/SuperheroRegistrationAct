<?php

namespace DataConnectors;

use PDO;

/**
 * Class SQLiteConnector
 * @package DataConnectors
 */
class SQLiteConnector extends PDO
{
    /**
     * @var
     */
    protected $_pdo;

    /**
     * SQLiteConnector constructor.
     * @param $dir
     */
    public function __construct($dir)
    {
        parent::__construct($dir);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $this->_createTable();
    }

    /**
     * @Description: If table does not exist create it. It also creates an index so that username is a unique field
     * for validateUsername.
     */
    private function _createTable()
    {
        $this->exec('CREATE TABLE IF NOT EXISTS superhero_users(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              email TEXT NOT NULL,
                              name TEXT NOT NULL,
                              password TEXT NOT NULL,
                              username TEXT NOT NULL,
                              register_date datetime NOT NULL,
                              last_login datetime
                              )');
        $this->exec('CREATE UNIQUE INDEX IF NOT EXISTS superhero_users_username_uindex ON superhero_users(username)');
    }

    /**
     * @param $query
     * @param array $params
     * @return bool
     */
    public function executeQuery($query, array $params)
    {
        try {
            $statement = $this->prepare($query);
            $statement->execute($params);
            return $statement->rowCount() > 0;
        } catch(\PDOException $e){
            echo 'Exception in Select query: ' . $e->getMessage();
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return array
     */
    public function select($query, array $params)
    {
        try {
            $statement = $this->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch(\PDOException $e){
            echo 'Exception in Select query: ' . $e->getMessage();
        }
    }

}