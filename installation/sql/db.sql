CREATE TABLE users (
    id int(11) UNIQUE AUTO_INCREMENT,
    username varchar(255) PRIMARY KEY,
    full_name varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(255) NOT NULL,
    joined datetime NOT NULL,
    last_visit datetime DEFAULT NULL,
    is_activated int(1) DEFAULT 0,
    type int(10) DEFAULT 0,
    token int(10) DEFAULT 0
);

CREATE TABLE articles (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    content LONGTEXT,
    date_posted datetime NOT NULL,
    created_by varchar(255) NOT NULL,
    last_modified datetime DEFAULT NULL,
    last_modified_by varchar(255) DEFAULT NULL,
    ordering int(10) DEFAULT 0,
    is_published int(1) DEFAULT 1
);

CREATE TABLE challenges (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    pkg_name varchar(255) NOT NULL,
    description text,
    author varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    date_posted datetime NOT NULL,
    visibility varchar(255) DEFAULT 'private',
    publish int(10) DEFAULT 0
);

CREATE TABLE classchallenges (
    class_id int(11),
    challenge_id int(11),
    added datetime
);

CREATE TABLE groups (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    date_created datetime NOT NULL,
    archive int(1) DEFAULT 0
);

CREATE TABLE group_memberships (
    id int(11) UNIQUE,
    user_id int(11) NOT NULL ,
    group_id int(11) NOT NULL ,
    date_created datetime NOT NULL,
    PRIMARY KEY (user_id,group_id)
);

CREATE TABLE challenge_attempts (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    user_id int(11) NOT NULL,
    challenge_id int(11) NOT NULL,
    time time NOT NULL,
    status varchar(255) NOT NULL
);