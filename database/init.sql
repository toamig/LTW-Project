DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS house;
DROP TABLE IF EXISTS rental;
DROP TABLE IF EXISTS message;

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
  type VARCHAR,
  room INTEGER,
  bathroom INTEGER,
  price DOUBLE,
  published DATE,
  address VARCHAR, 
  location VARCHAR,
  state VARCHAR,
  postCode VARCHAR,  
  description VARCHAR,
  title VARCHAR,
  owner VARCHAR REFERENCES user
);

CREATE TABLE rental (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR REFERENCES user,
  houseID INTEGER REFERENCES house,
  startDate DATE,
  endDate DATE
);

CREATE TABLE message (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  sender VARCHAR REFERENCES user,
  receiver VARCHAR REFERENCES user,
  message VARCHAR
);

-- Preencher base de dados incial

-- User
INSERT INTO user VALUES 
('LucianoLisby' ,'lucianoLisby@gmail.com', '$2y$10$U5hUoiTXIjiZfVkTJOJU3OUCcHh9qhwXtOwtcqg.OrfnMIFQX3Asq', 'Luciano Lisby', '792-806-7761', 'LucianoLisby.jpg'), --password: lucianolisby123
('DenverDebelak' ,'denverDebalk@gmail.com', '$2y$10$iKpRN4wZKXtf7/EylKhoNO5W4wl3bHYH.tP3hGDq4LMZb/gAVwFZm', 'Denver Debelak', '433-917-8029', 'DenverDebelak.jpeg'), --password: denverdebelak456
('JanieJett' ,'janieJett@gamil.com', '$2y$10$LCsVCuqW/AJG3.RG3tlJIOM3GpUVo9MUTTrH5QIID5001sqKwUMBq', 'Janie Jett', '988-992-2571', 'JanieJett.jpg'), --password: janiejett789
('FeFigueredo' ,'feFigueiredo@gmail.com', '$2y$10$jZPzljTlyYtdWA.c/wDSye93U1ua..v64b1kb2ftl2eDM1fFC5yJ6', 'Fe Figueredo', '396-203-3087', 'FeFigueredo.jpeg'), --password: fefigueiredo135
('CruzCervantez' ,'cruzCervantez@gmail.com', '$2y$10$zhsd6ynvi0gJuXRpaoWUIO2OhkcqGoMevCi9O3llixGBhRowtL.GS', 'Cruz Cervantez', '607-609-2255', 'CruzCervantez.jpeg'); --password: cruzcervantez246

-- House
INSERT INTO house VALUES 
(NULL, 'houseExample1.jpg', 'House', 2, 2, 1995000, '2018-10-20', '3432 22nd St', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'Lorem ipsum dolor sit amet', 'LucianoLisby'),
(NULL, 'houseExample2.jpeg', 'House', 2, 2, 1998888, '2016-06-03', '1425 7th Ave', 'Los Angeles', 'CA', '94122', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'Lorem ipsum dolor sit amet', 'DenverDebelak'),
(NULL, 'houseExample3.jpeg', 'House', 2, 2, 2950000, '2009-08-14', '1257-1261 Lombard St', 'Chicago', 'IL', '94109', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'Lorem ipsum dolor sit amet', 'JanieJett'),
(NULL, 'houseExample4.jpeg', 'House', 2, 2, 1005000, '2019-12-09', '51 Innes Court', 'San Francisco', 'CA', '94124', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'Lorem ipsum dolor sit amet', 'FeFigueredo'),
(NULL, 'houseExample5.jpg', 'House', 2, 2, 3009890, '2001-03-28', '250 Peralta Ave', 'San Francisco', 'CA', '94110', 'Charming and well-kept 2 bedroom, 2 bathroom home near parks, trails, and downtown. Home features a xeriscaped, fully-fenced, private back yard with a large shed and patio. Large driveway for off-street parking. Dogs are welcome with a small pet fee. Landlords are open to the possibility of subletting with a proper agreement. Tenants responsible for utilities.', 'Lorem ipsum dolor sit amet', 'CruzCervantez');

-- Rental
INSERT INTO rental VALUES
(NULL, 'LucianoLisby', 5, '2007-01-01', '2007-01-10'),
(NULL, 'DenverDebelak', 1, '2007-01-01', '2007-01-10'),
(NULL, 'JanieJett', 4, '2007-01-01', '2007-01-10'),
(NULL, 'FeFigueredo', 3, '2007-01-01', '2007-01-10'),
(NULL, 'CruzCervantez', 2, '2007-01-01', '2007-01-10');

-- Message
INSERT INTO message VALUES 
(NULL, 'LucianoLisby', 'DenverDebelak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(NULL, 'DenverDebelak', 'LucianoLisby', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(NULL, 'LucianoLisby', 'DenverDebelak', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
(NULL, 'DenverDebelak', 'LucianoLisby', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(NULL, 'JanieJett', 'FeFigueredo', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.'),
(NULL, 'FeFigueredo', 'JanieJett', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.'),
(NULL, 'JanieJett', 'FeFigueredo', 'eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.'),
(NULL, 'FeFigueredo', 'JanieJett', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?'),
(NULL, 'JanieJett', 'FeFigueredo', ' Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'),
(NULL, 'FeFigueredo', 'LucianoLisby', 'Proin blandit faucibus odio, a fermentum turpis volutpat vitae.'),
(NULL, 'LucianoLisby', 'FeFigueredo', 'Curabitur a diam lorem. Maecenas et magna turpis. Morbi sit amet ipsum sit amet magna lobortis feugiat eget non diam.'),
(NULL, 'FeFigueredo', 'LucianoLisby', 'Praesent condimentum purus at diam vestibulum, ut scelerisque mi luctus.'),
(NULL, 'LucianoLisby', 'FeFigueredo', 'Mauris non sodales turpis.'),
(NULL, 'FeFigueredo', 'LucianoLisby', 'Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(NULL, 'LucianoLisby', 'FeFigueredo', 'Proin blandit erat eget magna semper varius. Donec vel metus orci.'),
(NULL, 'FeFigueredo', 'LucianoLisby', 'Interdum et malesuada fames ac ante ipsum primis in faucibus.');