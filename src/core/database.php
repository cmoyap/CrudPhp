<?php
declare(strict_types=1);
 
namespace App\Core;
 
use PDO;
 
final class Database
{
    private static ?PDO $pdo = null;
 
    public static function connection(): PDO
    {
        if (self::$pdo === null) {
            $dsn = sprintf(
                'pgsql:host=%s;port=%s;dbname=%s',
                Env::get('DB_HOST', 'localhost'),
                Env::get('DB_PORT', '3254'),
                Env::get('DB_NAME', 'deber_1')
            );
 
            self::$pdo = new PDO($dsn, Env::get('DB_USER', ''), Env::get('DB_PASSWORD', ''), [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }
 
        return self::$pdo;
    }
}