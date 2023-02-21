<?php

namespace App\Models;

use PDO;

class login
{
    private $db;

    public function __construct()
    {
        $this->db = new DBTransaction();
    }

    public function login($email, $password)
    {
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
        // var_dump($user);
        // if (password_verify($password, $user['password'])) {
        //     return $user;
        // } else {
        //     return false;
        // }
    }

    // public function idUser(){
    //     return $this->id;
    // }

    // public function selectUserById($id){
    //     $sql = "SELECT * FROM user WHERE id = :id ";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    //     $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $user_id;
    // }
}
