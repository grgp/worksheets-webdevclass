CREATE TABLE Users (
	username varchar(255) PRIMARY KEY,
	email varchar(255) UNIQUE,
	password varchar(255)
);

CREATE TABLE Comments (
   	comment_id int PRIMARY KEY auto_increment,
	name varchar(255),
	email varchar(255),
	content text
);