<?php
session_start();
require '../Validator/Validator.php';

class Database {
    private $id =0;
    private $username = "";
    private $email = "";
    private $password ="";
    private $connected = false;

    

    private $pdo;

    function __construct($databaseName, $databaseHost, $databaseUser, $databasePassword){
        try {
            $this->pdo = new PDO("mysql:host=".$databaseHost.";dbname=".$databaseName.", '".$databaseUser."', '".$databasePassword."'");
        } catch (\Throwable $th) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function register($username, $password, $email){
        $validate = new Validator();
        if($validate->validateText($username) & $validate->validateText($password) & $validate->validateEmail($email)){
            $req = "INSERT INTO users (username, password, email) VALUES (".$username.",".$password.",".$email.")";
            $stmt = $pdo->prepare($req);
            $stmt->exec();
        }else{
            return "erreur pas valide";
        }
        
    }

    function connect($username, $password){
        $validate = new Validator();
        if($validate->validateText($username) & $validate->validateText($password)){
            $req = "SELECT * FROM users WHERE username == ".$username." AND password == ".$password;
            $reponse = $pdo->query($req);
            while($reponse->fetch()){
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
            }
        }else{
            return "erreur pas valide";
        }
    }
    function disconnect(){
        session_destroy();
    }

    function updateUsername($username){
        $validate = new Validator();
        if($validate->validateText($username)){
            $req = "UPDATE users SET username = ".$username." WHERE username == ".$_SESSION['username'];
            $reponse = $pdo->query($req);
        }else{
            return "mauvais pseudo";
        }
    }

    function updateEmail($email){
        $validate = new Validator();
        if($validate->validateText($email)){
            $req = "UPDATE users SET email = ".$email." WHERE email == ".$_SESSION['email'];
            $reponse = $pdo->query($req);
        }else{
            return "mauvais pseudo";
        }
    }

    function delAccount($email){
        $req = "DELETE FROM users WHERE email = ".$email;
        $reponse = $pdo->query($req);
    }

}