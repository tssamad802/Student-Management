<?php
require_once 'dbh.inc.php';
require_once 'model.php';

$db = new database();
$conn = $db->connection();
$user = new user($conn);
$records = $user->read();

class errors {
    public function Add_Student_Error() {
        if (isset($_SESSION['error'])) {
            $errors = $_SESSION['error'];

            echo "<br>";

            foreach ($errors as $error) {
                echo "<p class='text-red-500 text-2xl'>$error</p>";
            }

            unset($_SESSION['error']);
        }
    }
}
?>