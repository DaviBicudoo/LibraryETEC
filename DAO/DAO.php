<?php

namespace App\DAO;

use PDO;

abstract class DAO extends PDO
{
    protected static $conexao = null;

    public function __construct()
    {
        $dsn = "mysql:host=localhost" . $_ENV['db']['host'] . ";dbname=biblioteca" 
             . $_ENV['db']['database'];

        if (self::$conexao == null) 
        {
            self::$conexao = new PDO(
                $dsn,
                $_ENV['db']['user'],
                $_ENV['db']['pass'],
                [
                    PDO::ATTR_PERSISTENT => true,                    
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
                ]
            ); 
        } 
    } 
} 