CREATE DATABASE hackademic

CREATE TABLE users
(
Id int,
username varchar(255),
password varchar(255),
first_name varchar(255),
last_name varchar(255)
)

INSERT INTO  `hackademic`.`users` (
`id` ,
`username` ,
`password` ,
`first_name` ,
`last_name`
)
VALUES (
'1',  'pragya',  'ekanshpragya',  'pragya',  'gupta'
);
