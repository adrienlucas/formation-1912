<?php

class Database {
    public static ?Database $singleInstance = null;

    private string $host;
    private int $port;
    private string $username;
    private string $password;

    private function __construct(
        string $host,
        int $port,
        string $username,
        string $password
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;

        //mysql_connect()
    }

    public static function getInstance(
        ?string $host = null,
        ?int $port = null,
        ?string $username = null,
        ?string $password = null
    )
    {
        if(self::$singleInstance === null) {
            if($host === null || $port === null || $username ===null || $password ===null) {
                throw new \Exception('You should provide the database credentials when calling getInstance for the first time.');
            }
            self::$singleInstance = new self($host, $port, $username, $password);
        }

        return self::$singleInstance;
    }

    public function query(string $sql): array|int
    {
        // execute SQL
        // return results
    }
}

/** @var Database $database */
$database = Database::getInstance(
    '127.0.0.1', 3306,
    'root', 'toor'
);

$security = new Security($database);

$database1 = Database::getInstance();

$database2 = Database::getInstance();

// $database === $database1 === $database2;

// $database = new Database(); this is now forbidden

$controller = new UserController($database, $security);

class UserListController
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        if(!$this->security->hasRight('ADMIN')) {
            return;
        }
        $this->database->query('SELECT * from user');
        // ...
    }
}