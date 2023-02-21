<?php

namespace App\Controllers;

use App\Models\Todo;

class TodoController
{
    private $todo;

    public function __construct()
    {
        $this->todo = new Todo();
    }

    public function index()
    {
        return $this->todo->getTodos();
    }

    public function add($title)
    {
        return $this->todo->addTodo($title);
    }

    public function update($id, $status)
    {
        return $this->todo->updateTodoStatus($id, $status);
    }

    public function delete($id)
    {
        // if (isset($_POST['id'])) {
        //     $id = $_POST['id'];
        //     $this->todo->deleteTodo($id);
        //     header("Location: index.php");
        // }
        return $this->todo->deleteTodo($id);
    }
}
