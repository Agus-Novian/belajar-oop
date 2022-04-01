<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Kdf\BelajarOop\Core\Route;
use Kdf\BelajarOop\Config\Database;
use Kdf\BelajarOop\Controller\HomeController;
use Kdf\BelajarOop\Controller\CategoryController;

Database::getConnection();
// production
// Database::getConnection('mysql', 'prod');

Route::add('GET', '/', HomeController::class, 'index', []);
Route::add('GET', '/categories', CategoryController::class, 'category', []);
Route::add('POST', '/categories', CategoryController::class, 'postCategory', []);

Route::run();
