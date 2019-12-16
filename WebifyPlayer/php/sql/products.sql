--- Credits André Restivo
--- Modified for SQLite by João Rocha da Silva

DROP TABLE IF EXISTS category;

CREATE TABLE category (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR NOT NULL
);

DROP TABLE IF EXISTS product;

CREATE TABLE product (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR NOT NULL,
  price NUMERIC(5,2) NOT NULL,
  cat_id INTEGER REFERENCES category NOT NULL
);

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  username VARCHAR PRIMARY KEY,
  password VARCHAR
);

INSERT INTO category(name) VALUES ('Fruits');

INSERT INTO product (name, price, cat_id) VALUES ('Apples', '9.99', 1);
INSERT INTO product (name, price, cat_id) VALUES ('Oranges', '4.99', 1);
INSERT INTO product (name, price, cat_id) VALUES ('Pears', '3.99', 1);
INSERT INTO product (name, price, cat_id) VALUES ('Pineapples', '2.99', 1);
INSERT INTO product (name, price, cat_id) VALUES ('Bananas', '7.99', 1); 

INSERT INTO category (name) VALUES ('Clothes');

INSERT INTO product (name, price, cat_id) VALUES ('Shirt', '3.99', 2);
INSERT INTO product (name, price, cat_id) VALUES ('Jeans', '12.99', 2);
INSERT INTO product (name, price, cat_id) VALUES ('Sweat Shirt', '9.99', 2);

