DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS house;
DROP TABLE IF EXISTS rental;

CREATE TABLE user (
  username VARCHAR PRIMARY KEY,
  email VARCHAR UNIQUE,
  password VARCHAR,
  name VARCHAR,
  phoneNumber VARCHAR UNIQUE,
  image VARCHAR
);

CREATE TABLE house (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  image VARCHAR,
  title VARCHAR,
  price DOUBLE,
  published DATE,
  address VARCHAR, 
  location VARCHAR,
  state VARCHAR,
  postCode VARCHAR,  
  description VARCHAR,
  owner VARCHAR REFERENCES user
);

CREATE TABLE rental (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR REFERENCES user,
  houseID INTEGER REFERENCES house,
  startDate DATE,
  endDate DATE
);

-- Preencher base de dados incial

-- User
INSERT INTO user VALUES ('LucianoLisby' ,'lucianoLisby@gmail.com', '$2y$10$U5hUoiTXIjiZfVkTJOJU3OUCcHh9qhwXtOwtcqg.OrfnMIFQX3Asq', 'Luciano Lisby', '792-806-7761', 'LucianoLisby.jpeg'); --password: lucianolisby123
INSERT INTO user VALUES ('DenverDebelak' ,'denverDebalk@gmail.com', '$2y$10$EHUIsLXguznQ8vO7bhJhTuzkF03L/Ag1Q6DOIE1HEhncpse6xi2GK', 'Denver Debelak', '433-917-8029', 'DenverDebelak.jpeg'); --password: denverdebelak456
INSERT INTO user VALUES ('JanieJett' ,'janieJett@gamil.com', '$2y$10$LCsVCuqW/AJG3.RG3tlJIOM3GpUVo9MUTTrH5QIID5001sqKwUMBq', 'Janie Jett', '988-992-2571', 'JanieJett.jpg'); --password: janiejett789
INSERT INTO user VALUES ('FeFigueredo' ,'feFigueiredo@gmail.com', '$2y$10$jZPzljTlyYtdWA.c/wDSye93U1ua..v64b1kb2ftl2eDM1fFC5yJ6', 'Fe Figueredo', '396-203-3087', 'FeFigueredo.jpeg'); --password: fefigueiredo135
INSERT INTO user VALUES ('CruzCervantez' ,'cruzCervantez@gmail.com', '$2y$10$zhsd6ynvi0gJuXRpaoWUIO2OhkcqGoMevCi9O3llixGBhRowtL.GS', 'Cruz Cervantez', '607-609-2255', 'CruzCervantez.jpeg'); --password: cruzcervantez246

-- House
INSERT INTO house VALUES (NULL, 'houseExample1.jpg', 'House', 1995000, '2018-10-20', '3432 22nd St', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'LucianoLisby');
INSERT INTO house VALUES (NULL, 'houseExample2.jpeg', 'House', 1998888, '2016-06-03', '1425 7th Ave', 'Los Angeles', 'CA', '94122', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'DenverDebelak');
INSERT INTO house VALUES (NULL, 'houseExample3.jpeg', 'House', 2950000, '2009-08-14', '1257-1261 Lombard St', 'Chicago', 'IL', '94109', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'JanieJett');
INSERT INTO house VALUES (NULL, 'houseExample4.jpeg', 'House', 1005000, '2019-12-09', '51 Innes Court', 'San Francisco', 'CA', '94124', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'FeFigueredo');
INSERT INTO house VALUES (NULL, 'houseExample5.jpg', 'House', 3009890, '2001-03-28', '250 Peralta Ave', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'CruzCervantez');