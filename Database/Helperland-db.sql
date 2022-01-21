-- 'Contact_Table' structure
CREATE TABLE `Contact_Table` (
	`Id` INT NOT NULL AUTO_INCREMENT,
	`First_Name` varchar(255) NOT NULL,
	`Last_Name` varchar(255) NOT NULL,
	`Email` varchar(255) NOT NULL UNIQUE,
	`Phone` varchar(255) NOT NULL UNIQUE,
	`Message` TEXT(255) DEFAULT 'Message',
	PRIMARY KEY (`Id`)
);

-- Customer's all tables

--Structure of 'Book_Service_Customer' table 
CREATE TABLE `Book_Service_Customer` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(255) NOT NULL UNIQUE,
	`phone` varchar(255) NOT NULL UNIQUE,
	`cust_id` INT(255) NOT NULL,
	`cust_name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

--Structure of 'Service_request_details' table
CREATE TABLE `Service_request_details` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`request_id` INT NOT NULL,
	`service_address` varchar(255) NOT NULL,
	`billing_address` varchar(255) NOT NULL,
	`extra_services_id` INT(10) NOT NULL DEFAULT 'null',
	`service_date` DATE(255) NOT NULL,
	`service_time` TIMESTAMP(255) NOT NULL,
	`duration` INT(255) NOT NULL DEFAULT '3',
	`postalcode` INT(11) NOT NULL DEFAULT 'null',
	`payment` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

--Structure of 'service_request_history_customer' table
CREATE TABLE `service_request_history_customer` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`request` INT NOT NULL,
	`service_provider_id` INT NOT NULL,
	`status` varchar(255) NOT NULL DEFAULT 'pending',
	`rate` INT(255) NOT NULL,
	PRIMARY KEY (`id`)
);

-- General required details of all users
--Structure of 'User_details' table
CREATE TABLE `User_details` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Dob` DATE NOT NULL DEFAULT 'null',
	`Language` varchar(255) NOT NULL DEFAULT 'null',
	`role` varchar(255) NOT NULL DEFAULT 'customer',
	`address_id` INT NOT NULL,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`phone` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL UNIQUE DEFAULT 'null',
	PRIMARY KEY (`id`)
);

-- Service Provider's all tables
--Structure of 'upcoming_services_sp' table
CREATE TABLE `upcoming_services_sp` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`accepted_service_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);


--Structure of 'new_service_request_sp' table
CREATE TABLE `new_service_request_sp` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`service_request_id` INT NOT NULL,
	`status` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

--Structure of 'service_history_sp' table
CREATE TABLE `service_history_sp` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`sp_id` INT NOT NULL,
	`rate` INT NOT NULL,
	PRIMARY KEY (`id`)
);

-- Admin's all tables
--Structure of 'user_management_admin' table
CREATE TABLE `user_management_admin` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_details_id` INT NOT NULL,
	`adress_id` INT NOT NULL,
	`service_adress` INT NOT NULL,
	PRIMARY KEY (`id`)
);


--Structure of `service_requests_admin` table
CREATE TABLE `service_requests_admin` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`service_details` INT NOT NULL,
	PRIMARY KEY (`id`)
);

-- General addresses of users
--Structure of `Address` table
CREATE TABLE `Address` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Street_name` varchar(255) NOT NULL DEFAULT 'null',
	`House_number` varchar(255) NOT NULL DEFAULT 'null',
	`Postal_code` INT(11) NOT NULL DEFAULT 'null',
	PRIMARY KEY (`id`)
);

-- Structure of `extra_services` table(wich will use for showing list of extra selected services by customers)
CREATE TABLE `extra_services` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`cabinate` BOOLEAN NOT NULL DEFAULT 'no',
	`fridge` BOOLEAN NOT NULL DEFAULT 'no',
	`oven` BOOLEAN NOT NULL DEFAULT 'no',
	`laundry` BOOLEAN NOT NULL DEFAULT 'no',
	`windows` BOOLEAN NOT NULL DEFAULT 'no',
	`pet` BOOLEAN NOT NULL DEFAULT 'no',
	PRIMARY KEY (`id`)
);

-- Strucure of `role` table
CREATE TABLE `role` (
	`id` INT(25) NOT NULL AUTO_INCREMENT,
	`role` INT(25) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

-- three kind of users
-- Structure for 'user' table
CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`customer` BOOLEAN NOT NULL DEFAULT 'yes',
	`service_provider` BOOLEAN NOT NULL DEFAULT 'no',
	`admin` BOOLEAN NOT NULL DEFAULT 'no',
	PRIMARY KEY (`id`)
);


-- Foreign key contraints

-- Constraints for table `Book_Service_Customer`
ALTER TABLE `Book_Service_Customer` ADD CONSTRAINT `Book_Service_Customer_fk0` FOREIGN KEY (`cust_id`) REFERENCES ``(``);

-- Constraints for table `Service_request_details`
ALTER TABLE `Service_request_details` ADD CONSTRAINT `Service_request_details_fk0` FOREIGN KEY (`request_id`) REFERENCES `Book_Service_Customer`(`id`);
ALTER TABLE `Service_request_details` ADD CONSTRAINT `Service_request_details_fk1` FOREIGN KEY (`extra_services_id`) REFERENCES `extra_services`(`id`);

-- Constraints for table `service_request_history_customer`
ALTER TABLE `service_request_history_customer` ADD CONSTRAINT `service_request_history_customer_fk0` FOREIGN KEY (`request`) REFERENCES `Service_request_details`(`id`);
ALTER TABLE `service_request_history_customer` ADD CONSTRAINT `service_request_history_customer_fk1` FOREIGN KEY (`service_provider_id`) REFERENCES `upcoming_services_sp`(`id`);

-- Constraints for table `User_details`
ALTER TABLE `User_details` ADD CONSTRAINT `User_details_fk0` FOREIGN KEY (`role`) REFERENCES `role`(`id`);
ALTER TABLE `User_details` ADD CONSTRAINT `User_details_fk1` FOREIGN KEY (`address_id`) REFERENCES `Address`(`id`);

-- Constraints for table `upcoming_services_sp`
ALTER TABLE `upcoming_services_sp` ADD CONSTRAINT `upcoming_services_sp_fk0` FOREIGN KEY (`accepted_service_id`) REFERENCES `new_service_request_sp`(`id`);

-- Constraints for table `new_service_request_sp`
ALTER TABLE `new_service_request_sp` ADD CONSTRAINT `new_service_request_sp_fk0` FOREIGN KEY (`service_request_id`) REFERENCES `Service_request_details`(`id`);

-- Constraints for table `service_history_sp`
ALTER TABLE `service_history_sp` ADD CONSTRAINT `service_history_sp_fk0` FOREIGN KEY (`sp_id`) REFERENCES `upcoming_services_sp`(`id`);

-- Constraints for table `user_management_admin`
ALTER TABLE `user_management_admin` ADD CONSTRAINT `user_management_admin_fk0` FOREIGN KEY (`user_details_id`) REFERENCES `User_details`(`id`);
ALTER TABLE `user_management_admin` ADD CONSTRAINT `user_management_admin_fk1` FOREIGN KEY (`adress_id`) REFERENCES `Address`(`id`);
ALTER TABLE `user_management_admin` ADD CONSTRAINT `user_management_admin_fk2` FOREIGN KEY (`service_adress`) REFERENCES `Service_request_details`(`id`);

-- Constraints for table  `service_requests_admin`
ALTER TABLE `service_requests_admin` ADD CONSTRAINT `service_requests_admin_fk0` FOREIGN KEY (`service_details`) REFERENCES `Service_request_details`(`id`);

-- Constraints for table  `role`
ALTER TABLE `role` ADD CONSTRAINT `role_fk0` FOREIGN KEY (`role`) REFERENCES `users`(`id`);















