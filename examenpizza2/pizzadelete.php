<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM pizza WHERE id=:id';
$statement = $con->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("Location: pizzaread.php");
}