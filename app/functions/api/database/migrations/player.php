<?php

$database::statement('CREATE TABLE IF NOT EXISTS wp_players(
    id INT NOT NULL AUTO_INCREMENT,

    firstname VARCHAR(70) NOT NULL,
    lastname VARCHAR(70) NOT NULL,
    dni VARCHAR(10) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    age INT(2) NOT NULL,
    department VARCHAR(70) NOT NULL,
    province VARCHAR(70) NOT NULL,
    district VARCHAR(70) NOT NULL,

    politics INT(1) NOT NULL,
    terms INT(1) NOT NULL,

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    PRIMARY KEY (id)
)');
