<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>
    <h2>Update Record</h2>
    <form action="update.php" method="POST">
        <!-- Form fields populated with current data here -->
        <input type="submit" name="update" value="Update Record">
    </form>
    <?php
    if (isset($_POST['update'])) {
        // Update data in the database
        include 'models.php';
        $mechanics = new Mechanics($conn);
        // Call the update method here
        echo "Record updated successfully!";
    }
    ?>
</body>
</html>
