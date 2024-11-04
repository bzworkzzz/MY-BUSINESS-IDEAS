<?php
include 'dbconfig.php'; // Include database configuration

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine which table data to insert into based on the form's hidden "table" field
    $table = $_POST['table'];

    switch ($table) {
        case 'Mechanics':
            // Insert into Mechanics table
            $stmt = $conn->prepare("INSERT INTO Mechanics (MechanicID, Name, ContactInfo, Specialty, ExperienceYears) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $_POST['MechanicID'], $_POST['Name'], $_POST['ContactInfo'], $_POST['Specialty'], $_POST['ExperienceYears']);
            break;

        case 'Services':
            // Insert into Services table
            $stmt = $conn->prepare("INSERT INTO Services (ServiceID, ServiceName, Description, Price) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("issd", $_POST['ServiceID'], $_POST['ServiceName'], $_POST['Description'], $_POST['Price']);
            break;

        case 'Inventory':
            // Insert into Inventory table
            $stmt = $conn->prepare("INSERT INTO Inventory (PartID, PartName, PartDescription, QuantityInStock, PricePerUnit) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssdi", $_POST['PartID'], $_POST['PartName'], $_POST['PartDescription'], $_POST['QuantityInStock'], $_POST['PricePerUnit']);
            break;

        case 'MotorServiceRecords':
            // Insert into MotorServiceRecords table
            $stmt = $conn->prepare("INSERT INTO MotorServiceRecords (RecordID, Brand, ModelType, CustomerName, MotorProblems, PlateNumber, AppointmentDate) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssss", $_POST['RecordID'], $_POST['Brand'], $_POST['ModelType'], $_POST['CustomerName'], $_POST['MotorProblems'], $_POST['PlateNumber'], $_POST['AppointmentDate']);
            break;

        case 'ServiceHistory':
            // Insert into ServiceHistory table
            $stmt = $conn->prepare("INSERT INTO ServiceHistory (ServiceHistoryID, VehicleID, ServiceID, MechanicID, ServiceDate, Notes) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiiss", $_POST['ServiceHistoryID'], $_POST['VehicleID'], $_POST['ServiceID'], $_POST['MechanicID'], $_POST['ServiceDate'], $_POST['Notes']);
            break;

        case 'Payments':
            // Insert into Payments table
            $stmt = $conn->prepare("INSERT INTO Payments (PaymentID, RecordID, AmountPaid, PaymentDate, PaymentMethod) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisss", $_POST['PaymentID'], $_POST['RecordID'], $_POST['AmountPaid'], $_POST['PaymentDate'], $_POST['PaymentMethod']);
            break;

        default:
            echo "Invalid table specified.";
            exit();
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Record added successfully to the $table table.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
