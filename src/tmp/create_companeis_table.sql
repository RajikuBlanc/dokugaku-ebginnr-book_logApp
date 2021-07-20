DOROP TABLE IF EXISTS reviews;

CREATE TABLE reviews(
     id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(255),
     name VARCHAR(255),
     status VARCHAR(255),
     lank VARCHAR(10),
     text VARCHAR(1000) NOT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET = utf8mb4;

INSERT INTO
     reviews(title, name, text)
VALUES
     ('hello', 'world', 'testtest');
