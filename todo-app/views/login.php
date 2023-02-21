<?php
session_start();
include '../views/includes/header.php';

use App\Controllers\LoginController;

$userController = new LoginController();

$message = '';
if(isset($_SESSION["id"])){
    header('Location: ../views/index.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $userController->login($email, $password);

//     if ($user == 1) {
//         $_SESSION["login"] = true;
//         $_SESSION["id"] = $userController->selectUserById();
//         header('Location: ../views/index.php');
//     } else {
//         $message = "Invalid email or password.";
//     }
// }
    if ($user) {
        header('Location: ../views/index.php');
    } else {
        $message = "Invalid email or password.";
    }
}

?>

<h1>Login</h1>

<form method="post">
   <div>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
   </div>
   <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
   </div>
   <button type="submit" name="submit">Login</button>
</form>

<p><?php echo $message; ?></p>