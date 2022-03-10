<?php
function connect()
{
    static $dbh;
    if(!$dbh)
    {
        $dsn = 'mysql:dbname=portfolio;host=localhost';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
    }
    return $dbh;
}
?>