<?php

namespace App\Models;

abstract class Model
{
    protected $conn;
    
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
}
