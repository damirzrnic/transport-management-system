<?php
require_once __DIR__ . "/BaseDao.php";

class QuoteDao extends BaseDao {

    protecte $table_name;
    public function __construct() {
        parent::__construct($this->table_name);
    }

    public function getOpenQuotes() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = 'open'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getQuotesByUser($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE created_by = :user_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":user_id", $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getQuoteById($quote_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE quote_id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":id", $quote_id);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>
