<?php

require_once __DIR__ . "/db.php";

$files = glob(__DIR__ . "/migrations/*.php");

foreach ($files as $file) {

    $sql = require $file;

    try {

        $db->exec($sql);

        echo "Migration executed: " . basename($file) . PHP_EOL;

    } catch (PDOException $e) {

        echo "Migration failed: " . $e->getMessage() . PHP_EOL;
    }
}