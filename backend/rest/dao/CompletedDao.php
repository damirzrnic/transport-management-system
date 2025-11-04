<?php
require_once __DIR__ . "/BaseDao.php";

class CompletedLoadDao extends BaseDao {

    protected $table_name;
    public function __construct() {
        parent::__construct($this->table_name);
    }

    public function getRecentDeliveries($limit = 10) {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY delivered_at DESC LIMIT :limit";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = :status";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":status", $status);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
