<?php

$database::statement('CREATE TABLE IF NOT EXISTS wp_player_targets(
    id INT NOT NULL AUTO_INCREMENT,
    player_id INT NOT NULL,

    fullname VARCHAR(100) NOT NULL,
    age VARCHAR(5) NOT NULL,
    relationship VARCHAR(5) NOT NULL,
    genre VARCHAR(5) NOT NULL,

    behaviour1 VARCHAR(5) NOT NULL,
    behaviour2 VARCHAR(5) NOT NULL,
    behaviour3 VARCHAR(5) NOT NULL,

    activity1 VARCHAR(5) NOT NULL,
    activity2 VARCHAR(5) NOT NULL,
    activity3 VARCHAR(5) NOT NULL,

    importance INT(1) NOT NULL,
    gift VARCHAR(100) NOT NULL,

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (player_id) REFERENCES wp_players(id)
)');
