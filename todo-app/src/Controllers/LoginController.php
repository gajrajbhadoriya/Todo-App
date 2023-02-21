<?php

namespace App\Controllers;

use App\Models\login;

class LoginController
{
    private $user;
    private $db;

    public function __construct()
    {
        // $this->db = new DBTransaction();
        $this->user = new login($this->db);
    }

    public function login()
    {
        $message = '';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->user->login($email, $password);
            if ($user['password'] == $password or $user['email'] == $email) {
                header('Location: ../views/index.php');
            } else {
                $message = "please check your email or password";
            }
        }
    }
}
