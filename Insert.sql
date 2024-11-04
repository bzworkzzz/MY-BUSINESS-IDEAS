-- Insert a new Mechanic record
USE [your_database_name];
INSERT INTO Mechanics (MechanicID, Name, ContactInfo, Specialty, ExperienceYears)
VALUES (7, 'John Doe', '09123456789', 'Electrical Specialist', '15-20 years');

-- Insert a new Service record
INSERT INTO Services (ServiceID, ServiceName, Description, Price)
VALUES (8, 'Brake Inspection', 'Ensure braking system efficiency', 500.00);

-- Insert a new Inventory record
INSERT INTO Inventory (PartID, PartName, PartDescription, QuantityInStock, PricePerUnit)
VALUES ('BRK-INS-2023-001', 'Brake Pads', 'High-quality brake pads', 150, 350.00);
