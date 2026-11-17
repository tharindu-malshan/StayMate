USE staymate;

-- Store each user's email alert preferences.
CREATE TABLE email_alert_preferences (
    preference_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    district VARCHAR(50),
    city VARCHAR(80),
    university_area VARCHAR(150),
    room_type_id INT,
    min_price DECIMAL(10,2),
    max_price DECIMAL(10,2),
    gender_preference ENUM('boys', 'girls', 'any')
        NOT NULL DEFAULT 'any',
    matching_rooms_enabled BOOLEAN NOT NULL DEFAULT FALSE,
    favorite_updates_enabled BOOLEAN NOT NULL DEFAULT FALSE,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id),

    FOREIGN KEY (room_type_id)
        REFERENCES room_types(room_type_id)
) ENGINE=InnoDB;

-- Store password reset token hashes.
CREATE TABLE password_resets (
    reset_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    token_hash CHAR(64) NOT NULL UNIQUE,
    expires_at DATETIME NOT NULL,
    used_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
) ENGINE=InnoDB;