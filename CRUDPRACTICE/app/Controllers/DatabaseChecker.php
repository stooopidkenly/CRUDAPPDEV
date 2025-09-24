<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class DatabaseChecker extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            echo "Database connection successful!";
        } catch (\Exception $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
