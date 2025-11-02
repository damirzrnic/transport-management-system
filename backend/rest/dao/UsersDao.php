<?php
require_once __DIR__ . "/BaseDao.php";

class UserDao extends BaseDao {

    protected $table_name;
    public function __construct() {
        parent::__construct($this->table_name);
    }

    public function getByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addUser($first_name, $last_name, $email, $password_hash, $role = 'dispatcher', $status = 'active') {
    $query = "INSERT INTO " . $this->table_name . " 
              (first_name, last_name, email, password_hash, role, status, created_at) 
              VALUES 
              (:first_name, :last_name, :email, :password_hash, :role, :status, NOW())";

    $stmt = $this->connection->prepare($query);
    $stmt->bindValue(":first_name", $first_name);
    $stmt->bindValue(":last_name", $last_name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":password_hash", $password_hash);
    $stmt->bindValue(":role", $role);
    $stmt->bindValue(":status", $status);

    $stmt->execute();
    return $this->connection->lastInsertId();
}

public function addManager($first_name, $last_name, $email, $password_hash, $role = 'manager', $status = 'active') {
    $query = "INSERT INTO " . $this->table_name . " 
              (first_name, last_name, email, password_hash, role, status, created_at) 
              VALUES 
              (:first_name, :last_name, :email, :password_hash, :role, :status, NOW())";

    $stmt = $this->connection->prepare($query);
    $stmt->bindValue(":first_name", $first_name);
    $stmt->bindValue(":last_name", $last_name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":password_hash", $password_hash);
    $stmt->bindValue(":role", $role);
    $stmt->bindValue(":status", $status);

    $stmt->execute();
    return $this->connection->lastInsertId();
}

}
?>
