<?php

namespace Config\DataBase;

use PDO;
use PDOException;

class DataBase {
    private PDO $connection;

    public function connectPgSQL(): PDO {
        try {
            // Busca os dados carregados do .env
            $host = $_ENV['DB_HOST_01'] ?? 'localhost';
            $port = $_ENV['DB_PORT_01'] ?? 5432;
            $db   = $_ENV['DB_NAME_01'] ?? '';
            $user = $_ENV['DB_USER_01'] ?? '';
            $pass = $_ENV['DB_PASS_01'] ?? '';

            $dsn = "pgsql:host={$host};port={$port};dbname={$db}";

            $this->connection = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            return $this->connection;
        } catch (PDOException $e) {
            throw new PDOException("Erro de conexão: " . $e->getMessage());
        }
    }
}