
















-- before CASCADE
/* -- DROP DATABASE IF EXISTS webshop;
CREATE DATABASE IF NOT EXISTS webshop;
USE webshop;

-- Table for Brands
CREATE TABLE IF NOT EXISTS `brand` (
    brand_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand_title VARCHAR(100) DEFAULT NULL
);

-- Table for Categories
CREATE TABLE IF NOT EXISTS `category` (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_title VARCHAR(100) DEFAULT NULL
);

-- Table for Products
CREATE TABLE IF NOT EXISTS `products` (
    product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_title VARCHAR(100) DEFAULT NULL,
    product_description VARCHAR(255) DEFAULT NULL,
    product_keywords VARCHAR(255) DEFAULT NULL,
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    product_image1 VARCHAR(255) DEFAULT NULL,
    product_image2 VARCHAR(255) DEFAULT NULL,
    product_image3 VARCHAR(255) DEFAULT NULL,
    product_price VARCHAR(255) DEFAULT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255) DEFAULT NULL
        CHECK (status IN ('Active', 'Inactive')),
    FOREIGN KEY (category_id) REFERENCES category(category_id),
    FOREIGN KEY (brand_id) REFERENCES brand(brand_id)
);

-- Table for Cart Details
CREATE TABLE cart_details (
    cart_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    ip_address VARCHAR(255) DEFAULT NULL,
    quantity INT DEFAULT NULL,
    UNIQUE KEY `unique_cart_product` (`cart_id`, `product_id`), -- Unique constraint for cart_id and product_id
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Table for User Registration
CREATE TABLE user_table (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) DEFAULT NULL,
    user_email VARCHAR(100) DEFAULT NULL,
    user_password VARCHAR(255) DEFAULT NULL,
    user_image VARCHAR(255) DEFAULT NULL,
    user_ip VARCHAR(100) DEFAULT NULL,
    user_address VARCHAR(255) DEFAULT NULL,
    user_phone VARCHAR(20) DEFAULT NULL
);

-- Create user_orders table
CREATE TABLE `user_orders` (
  `order_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT DEFAULT NULL,
  `amount_due` INT(255) DEFAULT NULL,
  `invoice_number` INT(50) DEFAULT NULL,
  `total_products` INT(255) DEFAULT NULL,
  `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `order_status` VARCHAR(255) DEFAULT NULL
        CHECK (order_status IN ('Pending', 'Complete')),
  FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`)
);

-- Table for pending orders
CREATE TABLE `orders_pending` (
  `order_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `invoice_number` INT(255) NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT(255) DEFAULT NULL,
  `order_status` VARCHAR(255) NOT NULL
        CHECK (order_status IN ('Pending', 'Complete')),
  PRIMARY KEY (`order_id`, `user_id`, `product_id`),  -- Combined primary key
  FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`),
  FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
);

CREATE TABLE `user_payments` (
    `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NOT NULL,
    `invoice_number` INT NOT NULL,
    `amount` INT NOT NULL,
    `payment_mode` VARCHAR(255) NOT NULL
        CHECK (payment_mode IN ('VISA Card', 'Paypal', 'MobilePay', 'Pay Offline')),
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`)
);
 */

