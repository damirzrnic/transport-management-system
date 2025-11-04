<?php
require_once __DIR__ . "/BaseDao.php";

class ActiveLoadDao extends BaseDao {

    protected $table_name;
    public function __construct() {
        parent::__construct($this->table_name);
    }

    public function getInTransitLoads() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = 'in_transit'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByCarrier($carrier_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE carrier_id = :carrier_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":carrier_id", $carrier_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
