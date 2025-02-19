<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/Migration.php';

$action = $argv[1] ?? 'migrate';

if ($action === 'rollback') {
    Database\Migration::rollback();
} else {
    Database\Migration::run();
}