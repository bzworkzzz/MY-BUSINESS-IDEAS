<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Records</title>
</head>
<body>
    <h2>Records</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Specialty</th>
                <th>Experience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'models.php';
            $mechanics = new Mechanics($conn);
            $result = $mechanics->getMechanics();
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['MechanicID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['ContactInfo']}</td>
                        <td>{$row['Specialty']}</td>
                        <td>{$row['ExperienceYears']}</td>
                        <td>
                            <a href='update.php?id={$row['MechanicID']}'>Update</a> | 
                            <a href='delete.php?id={$row['MechanicID']}'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
