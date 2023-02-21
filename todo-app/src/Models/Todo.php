<?php

namespace App\Models;

use PDO;

class Todo
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DBTransaction();
    }

    public function getTodos()
    {
        $stmt = $this->pdo->query("SELECT * FROM todo");
        $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $todos;
    }

    public function addTodo($title)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todo (title) VALUES (:title)");
        $stmt->bindParam(':title', $title);
        return $stmt->execute();
    }

    public function updateTodoStatus($id, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE todo SET status = :status WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function deleteTodo($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM todo WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
