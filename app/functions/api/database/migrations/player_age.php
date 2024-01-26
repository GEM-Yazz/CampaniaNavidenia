<?php

try {
    $age = $database::statement('SELECT age FROM wp_players');
} catch (Exception $e) {
    $database::statement('ALTER TABLE wp_players
        ADD COLUMN age INT(2) NOT NULL AFTER email
    ');
}
