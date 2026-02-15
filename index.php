<?php

require_once __DIR__ . '/config/EnvLoader.php';
require_once __DIR__ . '/config/DataBase.php';

use Config\EnvLoader;
use Config\DataBase\DataBase;

// 1. CARREGAR AS VARIÁVEIS PRIMEIRO
// Isso preenche o $_ENV com os dados do seu arquivo .env
EnvLoader::load(__DIR__ . '/.env');

// 2. AGORA VOCÊ PODE USAR O BANCO
// Internamente, a classe DataBase vai conseguir ler o $_ENV['DB_HOST'], etc.
try {
    $db = new DataBase();
    $pdo = $db->connectPgSQL();
    
    echo "Conectado com sucesso ao banco!";
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}