<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class StudentManager extends AbstractManager
{
    public const TABLE = 'Student';

    /**
     * Insert new item in database
     */
    public function insert(array $student)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (firstname, lastname, photo, class_id) VALUES (:firstname, :lastname, :photo, :class_id)");
        $statement->bindValue('firstname', $student['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $student['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('photo', $student['photo'], \PDO::PARAM_STR);
        $statement->bindValue('class_id', $student['class'], \PDO::PARAM_INT);

        $statement->execute();
        //return (int)$this->pdo->lastInsertId();
    }

}