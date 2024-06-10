<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "campusportal_db";

    private $dbh;
    private $error;
    private $stmt;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create a new PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function read($query) {
        // Prepare statement
        $this->stmt = $this->dbh->prepare($query);

        // Execute statement
        if ($this->stmt->execute()) {
            // Fetch all results
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function save($query) {
        // Prepare and execute the query
        $this->stmt = $this->dbh->prepare($query);
        return $this->stmt->execute();
    }
}

?>