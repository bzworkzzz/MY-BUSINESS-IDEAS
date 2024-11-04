<?php
include 'config.php';
include 'models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mechanics = new Mechanics($conn);
    $mechanics->deleteMechanic($id);
    echo "Record deleted successfully!";
    header("Location: list.php"); // Redirect to the listing page
    exit();
}
?>
