<?php

namespace Config;

class EnvLoader {
    public static function load(string $path): void {
        if (!file_exists($path)) {
            throw new \Exception("Arquivo .env não encontrado em: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignora comentários
            if (strpos(trim($line), '#') === 0) continue;

            // Divide apenas no primeiro '='
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                // Define em ambos para garantir leitura
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}