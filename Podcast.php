<?php
require_once "Database.php";

class Podcast {
    private $conn;
    private $table = "podcasts";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $category, $speaker, $image) {
        $sql = "INSERT INTO " . $this->table . " (title, category, speaker, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $category, $speaker, $image]);
    }

    public function update($id, $title, $category, $speaker, $image) {
        $sql = "UPDATE " . $this->table . " SET title=?, category=?, speaker=?, image=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $category, $speaker, $image, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
