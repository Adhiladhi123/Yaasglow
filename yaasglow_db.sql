CREATE TABLE inventory (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255),
  stock_quantity INT,
  update_type VARCHAR(50),
  updated_by VARCHAR(20),
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
