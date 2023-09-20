CREATE TABLE `fooddb`.`tbl_admin` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(64) NOT NULL , `username` VARCHAR(64) NOT NULL , `pwd` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE tbl_admin (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(64) NOT NULL,
  username VARCHAR(64) NOT NULL,
  pwd VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE `fooddb`.`tbl_order` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `food` VARCHAR(64) NOT NULL , `price` DECIMAL(10.2) NOT NULL , `qty` INT NOT NULL , `total` DECIMAL(10.2) NOT NULL , `order_date` DATETIME NOT NULL , `status_order` VARCHAR(64) NOT NULL , `customer_name` VARCHAR(150) NOT NULL , `customer_contact` VARCHAR(64) NOT NULL , `customer_email` INT(150) NOT NULL , `customer_address` INT(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE tbl_order (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  food VARCHAR(64) NOT NULL,
  price DECIMAL(10.2) NOT NULL,
  qty INT NOT NULL,
  total DECIMAL(10.2) NOT NULL,
  order_date DATETIME NOT NULL,
  status_order VARCHAR(64) NOT NULL,
  customer_name VARCHAR(150) NOT NULL,
  customer_contact VARCHAR(64) NOT NULL,
  customer_email VARCHAR(150) NOT NULL,
  customer_address VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE `fooddb`.`tbl_category` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(100) NOT NULL , `image_name` VARCHAR(255) NOT NULL , `featured` VARCHAR(10) NOT NULL , `active` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE tbl_category (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  featured VARCHAR(10) NOT NULL,
  active VARCHAR(10) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE `fooddb`.`tbl_food` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(100) NOT NULL , `description_food` TEXT NOT NULL , `price` DECIMAL(10.2) NOT NULL , `image_name` VARCHAR(255) NOT NULL , `category_id` INT(10) UNSIGNED NOT NULL , `featured` VARCHAR(10) NOT NULL , `active` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE tbl_food (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  tittle VARCHAR(100) NOT NULL,
  description_food TEXT NOT NULL,
  price DECIMAL(10.2) NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  category_id INT(10) UNSIGNED NOT NULL,
  featured VARCHAR(10) NOT NULL,
  active VARCHAR(10) NOT NULL,
  PRIMARY KEY (id)
);