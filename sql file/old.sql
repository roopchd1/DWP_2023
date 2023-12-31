

 /* before CASCADE
DROP DATABASE IF EXISTS webshop; */
CREATE DATABASE IF NOT EXISTS webshop;
USE webshop;

-- Table for Brands
CREATE TABLE IF NOT EXISTS `brand` (
    brand_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand_title VARCHAR(100)
);

-- Table for Categories
CREATE TABLE IF NOT EXISTS `category` (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_title VARCHAR(100)
);

-- Table for Products
CREATE TABLE IF NOT EXISTS `products` (
    product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_title VARCHAR(100),
    product_description VARCHAR(255),
    product_keywords VARCHAR(255),
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    product_image1 VARCHAR(255),
    product_image2 VARCHAR(255),
    product_image3 VARCHAR(255),
    product_price VARCHAR(255),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES category(category_id) ON DELETE CASCADE,
    FOREIGN KEY (brand_id) REFERENCES brand(brand_id) ON DELETE CASCADE
);

-- Table for Cart Details
CREATE TABLE cart_details (
    cart_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    ip_address VARCHAR(255),
    quantity INT,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Table for User Registration
CREATE TABLE user_table (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    user_password VARCHAR(255),
    user_image VARCHAR(255),
    user_ip VARCHAR(100),
    user_address VARCHAR(255),
    user_phone VARCHAR(20)
);

-- Create user_orders table
CREATE TABLE `user_orders` (
  `order_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT,
  `amount_due` INT(255),
  `invoice_number` INT(50),
  `total_products` INT(255),
  `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE
);

-- Table for pending orders
CREATE TABLE `orders_pending` (
  `order_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `invoice_number` INT(255) NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT(255),
  `order_status` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE
);

CREATE TABLE `user_payments` (
    `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NOT NULL,
    `invoice_number` INT NOT NULL,
    `amount` INT NOT NULL,
    `payment_mode` VARCHAR(255) NOT NULL,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`) ON DELETE CASCADE
);