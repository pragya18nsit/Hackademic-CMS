CREATE DATABASE hackademic

CREATE TABLE users
(
Id int,
username varchar(255),
password varchar(255),
first_name varchar(255),
last_name varchar(255),
is_admin varchar(255)
)

INSERT INTO  `hackademic`.`users` (
`id` ,
`username` ,
`password` ,
`first_name` ,
`last_name` ,
`is_admin`
)
VALUES (
'1',  'pragya',  'ekanshpragya',  'pragya',  'gupta', '0'
);



CREATE TABLE addarticle
(
id int,
username varchar(255),
title varchar(255),
content text,
date_posted date
)
