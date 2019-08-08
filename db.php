<?php

/**
 * connectDB function makes new PDO and return it
 * @return PDO
 */
function connectDB() {
    $db = new PDO('mysql:host=192.168.20.20; dbname=collectorsapp', 'root', '');
    return $db;
}