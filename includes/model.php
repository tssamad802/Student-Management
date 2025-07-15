<?php
class user {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function get_email($email) {
        $sql = "SELECT * FROM `student_records` WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_records_by_id($id) {
        $stmt = $this->conn->prepare("SELECT * FROM student_records WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($name, $email, $class) {
        $sql = "INSERT INTO `student_records`(`name`, `email`, `class`) VALUES (:name, :email, :class);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':class', $class);
        $stmt->execute();
        header('location: ../index.php?Record_Saved');
        return true;
    }

    public function read() {
        $sql = "SELECT * FROM `student_records`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $name, $email, $class) {
        $sql = "UPDATE `student_records` SET name = :name, email = :email, class = :class WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':class', $class);
        $stmt->execute();
        header('Location: ../index.php?success');
        return true;
    }

    public function delete($id) {
        $sql = "DELETE FROM `student_records` WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: ../index.php?deleted');
        return true;
    }
}

?>