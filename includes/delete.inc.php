<?php
require_once 'dbh.inc.php';
require_once 'model.php';

   $db = new database();
   $conn = $db->connection();
   $user = new user($conn);

   $id = $_GET['id'];
   $user->delete($id);
?>