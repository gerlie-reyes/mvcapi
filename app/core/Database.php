<?php
class Database
{
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("pgsql:dbname=" . $this->db_name . " host=" . $this->host, $this->user, $this->pass);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        // $this->pdo->beginTransaction();
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        
        // TO DO: Prepare parameter bindings
        $stmt->execute($params);
    
        return $stmt->fetchAll();
    }
}
