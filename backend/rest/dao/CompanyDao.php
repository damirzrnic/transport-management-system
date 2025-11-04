<?php
require_once __DIR__ . "/BaseDao.php";

class CompanyDao extends BaseDao {

    protected $table_name;
    public function __construct() {
        parent::__construct($this->table_name);
    }

    public function getByType($type) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE type = :type";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":type", $type);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function searchByName($name) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :name";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":name", "%" . $name . "%");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
