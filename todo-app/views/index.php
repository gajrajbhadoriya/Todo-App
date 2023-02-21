<?php
 session_start();
include '../views/includes/header.php';


use App\Controllers\TodoController;
use App\Controllers\LoginController;

// $select = new LoginController;
// if(isset($_SESSION["id"])){
//     $user = $select->idUser($_SESSION["id"]);
// }

//  $todos = (new App\Controllers\LoginController())->getTodos();

// echo $_SESSION['email'];
// echo $_SESSION['']; 

$todos = new TodoController();
$todos = $todos->index();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <h1><?php $user; ?></h1>
    <form method="post" action="actions/add.php">
        <input type="text" name="title" placeholder="Enter Todo Title">
        <button type="submit">Add Todo</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Title</th> 
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?php echo $todo['title']; ?></td>
                <td>
                    <form method="post" action="actions/changeStatus.php">
                        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                        <select name="status" onchange="this.form.submit()">
                            <option value="0" <?php if ($todo['status'] === 0)  {
                                echo "selected";
                            } ?>>Incomplete</option>
                            <option value="1" <?php if ($todo['status'] === 1) {
                                echo "selected";
                            } ?>>Complete</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="post" action="actions/delete.php">
                        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <form method="post" action="actions/signout.php">
                        <input type="hidden" name="id">
                        <button type="submit">Logout</button>
                    </form>
        </tbody>
    </table>
</body>
</html>