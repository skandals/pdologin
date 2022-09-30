<?php

class Database {
 
    private string $host = 'localhost';
    private string $user = 'sfiso';
    private mixed $pass = '357890';
    private string $dbname = 'pdologin';

    private PDO|null $pdo;    

    protected function connect() {

        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        $this->pdo = new PDO($dsn, $this->user, $this->pass);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }



}