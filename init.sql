DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS rental;

CREATE TABLE user (
  username VARCHAR PRIMARY KEY,
  email VARCHAR,
  password VARCHAR,
  name VARCHAR
);

CREATE TABLE rental (
  id INTEGER PRIMARY KEY,
  title VARCHAR,
  price FLOAT,
  published INTEGER, 
  location VARCHAR,   
  description VARCHAR,
  username VARCHAR REFERENCES users,
);
