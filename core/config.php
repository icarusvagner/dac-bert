<?php

$envFilePath = dirname(__DIR__) . '/.env';

function loadEnv($filePath) {
  if (!file_exists($filePath)) {
    throw new Exception('.env file not found');
  }

  $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  foreach ($lines as $line) {
    if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
      list($key, $value) = explode('=', $line, 2);
      $key = trim($key);
      $value = trim($value);
      if (!array_key_exists($key, $_ENV)) {
        $_ENV[$key] = $value;
      }
    }
  }
}


loadEnv($envFilePath);

class DatabaseConfig {
  public function loadDBHost() {
    return $_ENV['DB_HOST'];
  }

  public function loadDBUser() {
    return $_ENV['DB_USER'];
  }

  public function loadDBPass() {
    return $_ENV['DB_PASS'];
  }

  public function loadDBName() {
    return $_ENV['DB_NAME'];
  }
}
?>
