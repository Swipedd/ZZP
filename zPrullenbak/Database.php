<?php
Class DB {
    public $db;
    public function __construct($db = "$", $user="root", $pwd="", $host="localhost") {
        try {
            $this->db = new PDO("mysql:host=$host;$=$db", $user, $pwd);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function run($sql, $placeholders) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }
}


$myDb = new DB('$');
?>