USE staymate;

-- Store property listings.
CREATE TABLE properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NOT NULL,
    room_type_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    monthly_rent DECIMAL(10,2) NOT NULL,
    key_money DECIMAL(10,2) NOT NULL DEFAULT 0,
    district VARCHAR(50) NOT NULL,
    city VARCHAR(80) NOT NULL,
    university_area VARCHAR(150),
    address VARCHAR(255) NOT NULL,
    latitude DECIMAL(10,7),
    longitude DECIMAL(10,7),
    gender_preference ENUM('boys', 'girls', 'any')
        NOT NULL DEFAULT 'any',
    facilities TEXT,
    availability ENUM('available', 'occupied')
        NOT NULL DEFAULT 'available',
    approval_status ENUM('pending', 'approved', 'rejected')
        NOT NULL DEFAULT 'pending',
    is_verified BOOLEAN NOT NULL DEFAULT FALSE,
    boost_until DATETIME,
    is_deleted BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (owner_id)
        REFERENCES users(user_id),

    FOREIGN KEY (room_type_id)
        REFERENCES room_types(room_type_id)
) ENGINE=InnoDB;

-- Store image locations for each property.
CREATE TABLE property_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    image_path VARCHAR(500) NOT NULL,

    FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
) ENGINE=InnoDB;