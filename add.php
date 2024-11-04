<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Record</title>
</head>
<body>
    <h2>Add a New Record</h2>
    <form action="add.php" method="POST">
        <!-- Include form fields here -->
        <input type="submit" name="submit" value="Add Record">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        // Add data to database using models
        include 'models.php';
        $mechanics = new Mechanics($conn);
        $mechanics->addMechanic($_POST['id'], $_POST['name'], $_POST['contact'], $_POST['specialty'], $_POST['experience']);
        echo "Record added successfully!";
    }
    ?>
</body>
</html>
