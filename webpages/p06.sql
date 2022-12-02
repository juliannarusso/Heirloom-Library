-- Active: 1666582800406@@127.0.0.1@3306@site_db
USE site_db;

-- Drop all required tables if they exist before creating.

DROP TABLE IF EXISTS t6_order;
DROP TABLE IF EXISTS t6_cart;
DROP TABLE IF EXISTS t6_customer;
DROP TABLE IF EXISTS t6_employee;
DROP TABLE IF EXISTS t6_product;
DROP TABLE IF EXISTS t6_seller;
DROP TABLE IF EXISTS t6_user;

-- Create the users table.
CREATE TABLE IF NOT EXISTS t6_user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_rank ENUM("Seller", "Employee", "Admin", "Customer") NOT NULL,
    firstname VARCHAR(20),
    lastname VARCHAR(20),
    email VARCHAR(50) NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
  	pass_type ENUM("HASH", "TEXT"),
    status ENUM("Active", "Deleted") NOT NULL
);

-- Create the employees table.
CREATE TABLE IF NOT EXISTS t6_employee (
    emp_id INT PRIMARY KEY AUTO_INCREMENT,
    salary DECIMAL(10, 2) NOT NULL,
    hire_date DATE,
    position VARCHAR(50),
    FOREIGN KEY (emp_id) REFERENCES t6_user(user_id),
  	status ENUM("Active", "Deleted") NOT NULL
);

-- Create the customers table.
CREATE TABLE IF NOT EXISTS t6_customer (
    cus_id INT PRIMARY KEY AUTO_INCREMENT,
    address VARCHAR(50), 
    payment_phone VARCHAR(15),
    payment_type ENUM("Credit", "Debit", "Apple Pay", "Venmo") NOT NULL,
    phone_number CHAR(10), 
    reviews TEXT,
    status ENUM("Active", "Deleted") NOT NULL,
    FOREIGN KEY (cus_id) REFERENCES t6_user(user_id)
  	
);

-- Create the sellers table.
CREATE TABLE IF NOT EXISTS t6_seller (
    sell_id INT PRIMARY KEY AUTO_INCREMENT,
    num_books_sold INT,
    avg_rating DECIMAL(2,1) CHECK (avg_rating >= 1 AND avg_rating <= 10),
    phone VARCHAR(15),
  	address VARCHAR(45),
    rating INT CHECK (rating >= 1 AND rating <= 10),
    comments VARCHAR(200) DEFAULT "N/A",
  	status ENUM("Active", "Deleted") NOT NULL,
    FOREIGN KEY (sell_id) REFERENCES t6_user(user_id)
);

-- Create the products table.
CREATE TABLE IF NOT EXISTS t6_product (
    book_isbn VARCHAR(30) NOT NULL UNIQUE,
    book_id INT AUTO_INCREMENT,
    title VARCHAR(75) NOT NULL, 
    book_price DECIMAL,
    book_condition ENUM("Poor", "Okay", "Good", "Excellent", "Unused") DEFAULT "Good",
    copyright TEXT,
    inv_date DATE,
  	sell_id INT,
  	status ENUM("Active", "Deleted") NOT NULL,
    PRIMARY KEY(book_id),
  	FOREIGN KEY(sell_id) REFERENCES t6_seller(sell_id)
);

-- Create the orders table.
CREATE TABLE IF NOT EXISTS t6_order (
    book_id INT,
    cus_id INT,
    order_date DATE NOT NULL,
    total_price DECIMAL(10, 2),
    qty INT CHECK (qty > 0 AND qty < 1000),
    FOREIGN KEY (book_id) REFERENCES t6_product(book_id),
    FOREIGN KEY (cus_id) REFERENCES t6_customer(cus_id),
    PRIMARY KEY(book_id, cus_id),
  	status ENUM("Active", "Deleted") NOT NULL
);

EXPLAIN t6_user;
EXPLAIN t6_employee;
EXPLAIN t6_customer;
EXPLAIN t6_seller;
EXPLAIN t6_product;
EXPLAIN t6_order;

INSERT INTO t6_user VALUES(1, "Admin", "Andrew", "Tokash", "Andrew.Tokash@marist.edu", "ATokash", "ProfAPT0", "HASH", "Active");
INSERT INTO t6_user VALUES(2, "Admin", "Aidan", "O'Leary", "Aidan.OLeary1@marist.edu", "AOleary", "AOpass1$", "HASH", "Active");
INSERT INTO t6_user VALUES(3, "Admin", "Matthew", "Ong", "Matthew.Ong1@marist.edu", "MOng", "MOpass2$", "HASH", "Active");
INSERT INTO t6_user VALUES(4, "Admin", "Andrew", "Riotto", "Andrew.Riotto1@marist.edu", "ARiotto", "ARpass3$", "HASH", "Active");
INSERT INTO t6_user VALUES(5, "Admin", "Julianna", "Russo", "Julianna.Russo3@marist.edu", "JRusso", "JRpass4$", "HASH", "Active");
INSERT INTO t6_user (user_rank, firstname, lastname, email, username, password, pass_type, status) VALUES
    ("Employee", "John", "Smith", "jsmithHLL@gmail.com", "JSmith", 'JSpass5$', 'HASH', 'Active'),
    ("Employee", "Jane", "Anderson", "jandersonHLL@gmail.com", "JAnderson", 'JApass6$', 'HASH', 'Active'),
    ("Employee", "Anthony", "Wright", "AnthonyWright@gmail.com", "AntWright", 'MyHHLP@$$w0rd5', 'HASH', 'Active'),
    ("Employee", "Chris", "Roberts", "crobertsHHL@gmail.com", "CRoberts", 'CRpass8$', 'HASH', 'Active'),
    ("Customer", "Paul", "Lewis", "plewis@gmail.com", "PLewis", 'PLpass9$', 'HASH', 'Active'),
    ("Customer", "William", "Boulton", "WBoulton@aol.com", "Willy", 'WobBeb1202#', 'HASH', 'Active'),
    ("Customer", "Jonathan", "Garcia", "jgarcia@yahoo.com", "jonathan_garcia", 'JGpass11$', 'HASH', 'Active'),
    ("Customer", "Katelyn", "Faranda", "Katelyn.Faranda@gmail.com", "katelyn829", 'snowbells18', 'HASH', 'Active'),
    ("Seller", "Nicholas", "Miller", "nickmiller@gmail.com", "NickMiller", 'NMpass13$', 'HASH', 'Active'),
    ("Seller", "Carey", "Gallagher", "careymg@gmail.com", "CareyG", 'CGpass14$', 'HASH', 'Active'),
    ("Seller", "Mary", "Kate", "mkf23@gmail.com", "MKate", 'MKpass15$', 'HASH', 'Active'),
    ("Seller", "Cole", "Cassidy", "cass100@gmail.com", "CCree", 'CCpass16$', 'HASH', 'Active');

INSERT INTO t6_employee VALUES(6, 56000, CURDATE(), "Bookstore Manager", "Active");
INSERT INTO t6_employee VALUES(7, 64500, CURDATE(), "Publishing Sales Representative", "Active");
INSERT INTO t6_employee VALUES(8, 48000, CURDATE(), "Inventory Management Assistant", "Active");
INSERT INTO t6_employee VALUES(9, 52000, CURDATE(), "Customer Service Representative", "Active");

-- Populate customers table.

INSERT INTO t6_customer (cus_id, address, payment_phone, status) VALUES(10, "82 Logan Street, Poughkeepsie, New York", "8453670674", "Active");
INSERT INTO t6_customer (cus_id, address, payment_phone, status) VALUES(11, "720 Vannella Drive, Qoughpaug, New Jersey", "4582079020", "Active");
INSERT INTO t6_customer (cus_id, address, payment_phone, status) VALUES(12, "25 Carol Avenue, Poughkeepsie, New York", "8454359020", "Active");
INSERT INTO t6_customer (cus_id, address, payment_phone, status) VALUES(13, NULL, NULL, "Deleted");

-- Populate the sellers table.

INSERT INTO t6_seller VALUES(14, 55, 5.5, "4579790476", "85 Vanilla Rd, Poughkeepsie, New York", 8, "N/A", "Active");
INSERT INTO t6_seller VALUES(15, 9, 8.5, "8458972469", "92 Oak Drive, Hopewell Jct, New York", 10, "Books always in perfect condition, includes student comments. Very nice!", "Active");
INSERT INTO t6_seller VALUES(16, 33, 2.2, NULL, NULL, 3, "Books sold are commonly in poor condition.", "Active");

-- Populate the products table.

INSERT INTO t6_product (book_isbn, book_id, title, book_price, book_condition, copyright, inv_date, sell_id, status) VALUES
    ("013521064X", 1, "Engineering Software Products", 34.99, "Excellent", "Pearson", CURDATE(), 14, "Active"),
    ("0123820200", 2, "Database Modeling and Design", 18.99, "Poor", "Morgan Kaufmann 2011", CURDATE(), 15, "Active"),
    ("1840788275", 3, "PHP and MySQL in Easy Steps", 5.99, "Unused", "East Steps Limited", "2022-09-22", 16, "Active"),
    ("1484241428", 4, "Java Program Design", 16.23, "Unused", "Apress 2019", "2022-10-01", 14, "Active"),
    ("1517900417", 5, "Toxic Meritocracy of Video Games", 18.45, "Poor", "Univ of Minnesota Press", CURDATE(), 15, "Active"),
    ("0470519827", 6, "Coding Theory - Algorithms...", 53.89, "Excellent", "Wiley-Interscience", CURDATE(), 16, "Active"),
    ("1119409535", 7, "Applied Statistics and Probability for Engineers", 33.99, "Excellent", "Wiley 2018", CURDATE(), 14, "Active"),
    ("0473334461", 8, "Psychology Workbook for Writers", 15.99, "Unused", "Wooden Tiger Press", CURDATE(), 15, "Active"),
    ("1337395250", 9, "Fundamentals of Financial Management", 67.30, "Good", "Cengage 2019", "2020-07-03", 15, "Active"),
    ("0748689788", 10, "Handbook of Creative Writing", 7.99, "Good", "Edinburge University Press 2014", "2022-08-15", 15, "Active"),
    ("1284056244", 11, "Essentials of Discrete Mathematics", 43.84, "Okay", "Jones and Bartlett Learning", CURDATE(), 16, "Active"),
    ("0060555661", 12, "The Intelligent Investor", 13.99, "Poor", "Collins Business 2003", CURDATE(), 14, "Active"),
    ("0199267189", 13, "The Oxford Shakespeare", 34.99, "Okay", "Oxford University Press, USA", CURDATE(), 14, "Active"),
    ("0190903996", 14, "Technology, Activism, and Social Justice in a Digital Age", 24.99, "Excellent", "Oxford University Press", "2022-05-12", 15, "Active"),
    ("1484242173", 15, "Practical Quantum Computing for Developers", 66.99, "Good", "Apress", CURDATE(), 14, "Active");

-- Populate the customer orders table.

INSERT INTO t6_order (book_id, cus_id, order_date, total_price, qty, status) VALUES 
    (2, 10, "2022-09-09", 18.99, 1, "Active"),
    (4, 12, CURDATE(), 16.12, 1, "Active"),
    (9, 13, CURDATE(), 133.98, 2, "Active"),
    (3, 10, "2022-09-14", 5.99, 1, "Active"),
    (1, 10, "2022-09-15", 69.98, 2, "Active"),
    (15, 12, CURDATE(), 66.99, 1, "Active"),
    (12, 12, CURDATE(), 13.99, 1, "Active"),
    (7, 10, "2022-08-01", 33.99, 1, "Active"),
    (6, 11, CURDATE(), 53.89, 1, "Active"),
    (6, 12, CURDATE(), 53.89, 1, "Active"),
    (14, 12, "2022-09-29", 24.99, 1, "Active"),
    (11, 11, CURDATE(), 43.84, 1, "Active");

    -- cart table. Every cart has its own Id and foreign key for Customer ID. Show book id foreign key, title, price. 
    CREATE TABLE IF NOT EXISTS t6_cart (
      cart_id INT PRIMARY KEY AUTO_INCREMENT,
      cus_id INT NOT NULL, 
      book_id INT NOT NULL,
      book_title VARCHAR(75) NOT NULL,
      book_price DECIMAL,
      FOREIGN KEY (cus_id) REFERENCES t6_customer(cus_id),
      FOREIGN KEY (book_id) REFERENCES t6_product(book_id)
    );

    