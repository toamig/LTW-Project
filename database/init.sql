DROP TABLE IF EXISTS rental;
DROP TABLE IF EXISTS user;


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
  published DATE, 
  location VARCHAR,   
  description VARCHAR,
  username VARCHAR REFERENCES users,
);

-- Preencher base de dados incial