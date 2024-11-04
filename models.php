<?php
// Database configuration
include 'dbconfig.php'; // include this for database connection

// Base Model Class for common database methods
class BaseModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    protected function executeQuery($sql, $params, $types) {
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        return $stmt;
    }
}

// Mechanics Model
class Mechanics extends BaseModel {
    public function addMechanic($id, $name, $contact, $specialty, $experience) {
        $sql = "INSERT INTO Mechanics (MechanicID, Name, ContactInfo, Specialty, ExperienceYears) VALUES (?, ?, ?, ?, ?)";
        $this->executeQuery($sql, [$id, $name, $contact, $specialty, $experience], "issss");
    }

    public function getMechanics() {
        $sql = "SELECT * FROM Mechanics";
        return $this->conn->query($sql);
    }
}

// Services Model
class Services extends BaseModel {
    public function addService($id, $name, $description, $price) {
        $sql = "INSERT INTO Services (ServiceID, ServiceName, Description, Price) VALUES (?, ?, ?, ?)";
        $this->executeQuery($sql, [$id, $name, $description, $price], "issd");
    }

    public function getServices() {
        $sql = "SELECT * FROM Services";
        return $this->conn->query($sql);
    }
}

// Inventory Model
class Inventory extends BaseModel {
    public function addPart($partID, $name, $description, $quantity, $price) {
        $sql = "INSERT INTO Inventory (PartID, PartName, PartDescription, QuantityInStock, PricePerUnit) VALUES (?, ?, ?, ?, ?)";
        $this->executeQuery($sql, [$partID, $name, $description, $quantity, $price], "sssid");
    }

    public function getInventory() {
        $sql = "SELECT * FROM Inventory";
        return $this->conn->query($sql);
    }
}

// Motor Service Records Model
class MotorServiceRecords extends BaseModel {
    public function addRecord($id, $brand, $model, $customer, $problems, $plate, $date) {
        $sql = "INSERT INTO MotorServiceRecords (RecordID, Brand, ModelType, CustomerName, MotorProblems, PlateNumber, AppointmentDate) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->executeQuery($sql, [$id, $brand, $model, $customer, $problems, $plate, $date], "issssss");
    }

    public function getRecords() {
        $sql = "SELECT * FROM MotorServiceRecords";
        return $this->conn->query($sql);
    }
}

// Service History Model
class ServiceHistory extends BaseModel {
    public function addHistory($id, $vehicleID, $serviceID, $mechanicID, $date, $notes) {
        $sql = "INSERT INTO ServiceHistory (ServiceHistoryID, VehicleID, ServiceID, MechanicID, ServiceDate, Notes) VALUES (?, ?, ?, ?, ?, ?)";
        $this->executeQuery($sql, [$id, $vehicleID, $serviceID, $mechanicID, $date, $notes], "iiiiss");
    }

    public function getServiceHistory() {
        $sql = "SELECT * FROM ServiceHistory";
        return $this->conn->query($sql);
    }
}

// Payments Model
class Payments extends BaseModel {
    public function addPayment($id, $recordID, $amount, $date, $method) {
        $sql = "INSERT INTO Payments (PaymentID, RecordID, AmountPaid, PaymentDate, PaymentMethod) VALUES (?, ?, ?, ?, ?)";
        $this->executeQuery($sql, [$id, $recordID, $amount, $date, $method], "iisss");
    }

    public function getPayments() {
        $sql = "SELECT * FROM Payments";
        return $this->conn->query($sql);
    }
}


?>