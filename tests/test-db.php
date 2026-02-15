<?php

require __DIR__ . '/../Config/DataBase.php';

use Config\DataBase\DataBase;

$db = new DataBase();
$conn = $db->connectPgSQL();

echo "Conexão com o PostgreSQL realizada com sucesso!\n";
