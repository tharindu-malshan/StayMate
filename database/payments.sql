USE staymate;

-- Store key money, boost and verification payments.
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    property_id INT NOT NULL,
    payment_type ENUM('key_money', 'boost', 'verification')
        NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency CHAR(3) NOT NULL DEFAULT 'LKR',
    payment_status ENUM('pending', 'paid', 'failed', 'refunded')
        NOT NULL DEFAULT 'pending',
    transaction_reference VARCHAR(150) UNIQUE,
    paid_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id),

    FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
) ENGINE=InnoDB;