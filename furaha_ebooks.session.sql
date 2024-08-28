CREATE TABLE orders (
    order_no INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(255) NOT NULL,
    books VARCHAR(255) ,
    contacts VARCHAR(20) NULL,
    delivery_location VARCHAR(128),
    delivery_time VARCHAR(128),
    delivery_fee INT,
    books_price INT,
    total INT,
    status VARCHAR(128),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (order_no, customer_name, books, contacts, delivery_location, delivery_time, delivery_fee, books_price, total, status, created_at)
    VALUES (1, 'Adinani', 'Atomic Habits', '0624789267', 'Sinza Madukani', 'Tomorrow 5PM', 3000, 20000, 23000, 'Paid', NOW()),
           (2, 'Joeey', 'The 5 Am Club', '078238492', 'Posta Mpya', 'Today 3:30PM', 4500, 18000, 22500, 'Not Paid', NOW()),
           (3, 'King Kino', 'Why Men Love Bitches', '0743271893', 'Makumbusho', '8AM', 2500, 22000, 24500, 'Not Paid', NOW());

SELECT * FROM orders;
