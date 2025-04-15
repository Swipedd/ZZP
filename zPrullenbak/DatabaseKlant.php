<?php
require_once "Database.php";
Class User extends DB{
 
    public function registerUser($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->run("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)", ["name"=>$name, "email"=>$email, "password"=>$hash]);
    }
    public function login($email) {
        return $this->run("SELECT * from user WHERE email = :email", ["email"=>$email])->fetch();
    }
}
?>