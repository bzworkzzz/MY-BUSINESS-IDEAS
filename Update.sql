-- Update a Mechanic's contact information
USE [your_database_name];
UPDATE Mechanics
SET ContactInfo = '09876543210'
WHERE MechanicID = 1;

-- Update a Service's price
UPDATE Services
SET Price = 600.00
WHERE ServiceID = 1;

-- Update the quantity in stock for a part in the Inventory
UPDATE Inventory
SET QuantityInStock = 145
WHERE PartID = 'MO-10W40-2023-001';
