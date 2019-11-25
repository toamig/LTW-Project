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

/*
INSERT INTO user VALUES ('LucianoLisby' ,'lucianoLisby@gmail.com', 'lucianolisby123', 'Luciano Lisby');
INSERT INTO user VALUES ('DenverDebelak' ,'denverDebalk@gmail.com', 'denverdebalk456', 'Denver Debelak');
INSERT INTO user VALUES ('JanieJett' ,'janieJett@gamil.com', 'janiejett789', 'Janie Jett');
INSERT INTO user VALUES ('FeFigueredo' ,'feFigueiredo@gmail.com', 'fefigueiredo135', 'Fe Figueredo');
INSERT INTO user VALUES ('CruzCervantez' ,'cruzCervantez@gmail.com', 'cruzcervantez246', 'Cruz Cervantez');

INSERT INTO rental VALUES (1, title, 1995000, '2018-10-20', '3432 22nd St, San Francisco, CA 94110', description, 'LucianoLisby');
INSERT INTO rental VALUES (2, title, 1998888, '2016-06-03', '1425 7th Ave, San Francisco, CA 94122', description, 'DenverDebelak');
INSERT INTO rental VALUES (3, title, 2950000, '2009-08-14', '1257-1261 Lombard St, San Francisco, CA 94109', description, 'JanieJett');
INSERT INTO rental VALUES (4, title, 1005000, '2019-12-09', '51 Innes Court, San Francisco, CA 94124', description, 'FeFigueredo');
INSERT INTO rental VALUES (5, title, 3009890, '2001-03-28', '250 Peralta Ave, San Francisco, CA 94110', description, 'CruzCervantez');
*/

