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
  image VARCHAR,
  title VARCHAR,
  price DOUBLE,
  published DATE,
  address VARCHAR, 
  location VARCHAR,
  state VARCHAR,
  postCode VARCHAR,  
  description VARCHAR,
  username VARCHAR REFERENCES user
);

-- Preencher base de dados incial

INSERT INTO user VALUES ('LucianoLisby' ,'lucianoLisby@gmail.com', 'lucianolisby123', 'Luciano Lisby');
INSERT INTO user VALUES ('DenverDebelak' ,'denverDebalk@gmail.com', 'denverdebalk456', 'Denver Debelak');
INSERT INTO user VALUES ('JanieJett' ,'janieJett@gamil.com', 'janiejett789', 'Janie Jett');
INSERT INTO user VALUES ('FeFigueredo' ,'feFigueiredo@gmail.com', 'fefigueiredo135', 'Fe Figueredo');
INSERT INTO user VALUES ('CruzCervantez' ,'cruzCervantez@gmail.com', 'cruzcervantez246', 'Cruz Cervantez');

INSERT INTO rental VALUES (1, 'houseExample1.jpg', 'House', 1995000, '2018-10-20', '3432 22nd St', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'LucianoLisby');
INSERT INTO rental VALUES (2, 'houseExample2.jpeg', 'House', 1998888, '2016-06-03', '1425 7th Ave', 'Los Angeles', 'CA', '94122', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'DenverDebelak');
INSERT INTO rental VALUES (3, 'houseExample3.jpeg', 'House', 2950000, '2009-08-14', '1257-1261 Lombard St', 'Chicago', 'IL', '94109', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'JanieJett');
INSERT INTO rental VALUES (4, 'houseExample4.jpeg', 'House', 1005000, '2019-12-09', '51 Innes Court', 'San Francisco', 'CA', '94124', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'FeFigueredo');
INSERT INTO rental VALUES (5, 'houseExample5.jpg', 'House', 3009890, '2001-03-28', '250 Peralta Ave', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'CruzCervantez');

