<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];

   require_once 'dbh.inc.php';
   require_once 'model.php';
   require_once 'contr.php';

   $db = new database();
   $conn = $db->connection();
   $controller = new controller($conn);
   $user = new user($conn);
   $errors = [];

   
   try {
    if ($controller->is_empty_inputs($name, $email, $class)) {
        $errors[] = "please fill in all fields";
    }

    if ($controller->is_name_invalid($name)) {
        $errors[] = "name is invalid";
    }

    if ($controller->is_email_invalid($email)) {
         $errors[] = "email is invalid";
    }

    if ($controller->is_class_invalid($class)) {
        $errors[] = "class is invalid";
    }

    if ($errors) {
        session_start();
        $_SESSION['error'] =  $errors;
        header('Location: ../add-student.php?error');
        exit;
    }

    $user->update($id, $name, $email, $class);
    
   } catch (PDOException $e) {
    die("Query Failed : " . $e->getMessage());
}
} else {
    header('Location: ../edit-student.php');
    exit;
}
?>