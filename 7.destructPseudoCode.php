<?php


class Database
{
    private $socketConnection;

    public function __construct(
        string $host,
        string $user,
        string $password,
    )
    {
        // $this->socketConnection = mysql_connect($host, $user, $password);
        echo "Connection à la DB...\n";
    }

    public function __destruct()
    {
        // mysql_close($this->socketConnection);
        echo "Déconnection de la DB !\n";
    }

    public function select(string $tablename, string $whereClause): array
    {
        // mysql_query($this->socketConnection, 'SELECT * from $tablename WHERE $whereClause')
        echo "Execution d'un select...\n";

        return [];
    }

}

function doSomethingOnDatabase() {
    $database = new Database('127.0.0.1', 'root', 'toor');
    $database->select('user', 'is_admin=1');
}

doSomethingOnDatabase();

doSomethingOnDatabase();


