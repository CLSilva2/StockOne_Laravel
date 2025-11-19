<?php

// Script temporário para testar conexão MySQL
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testando conexão MySQL...\n\n";

$config = config('database.connections.mysql');

echo "Host: " . $config['host'] . "\n";
echo "Port: " . $config['port'] . "\n";
echo "Database: " . $config['database'] . "\n";
echo "Username: " . $config['username'] . "\n";
echo "Password: " . (empty($config['password']) ? '(vazia)' : '***') . "\n\n";

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};port={$config['port']};charset={$config['charset']}",
        $config['username'],
        $config['password']
    );
    echo "✓ Conexão com MySQL bem-sucedida!\n\n";
    
    // Verificar se o banco existe
    $stmt = $pdo->query("SHOW DATABASES LIKE '{$config['database']}'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Banco de dados '{$config['database']}' existe!\n";
    } else {
        echo "✗ Banco de dados '{$config['database']}' NÃO existe!\n";
        echo "\nPara criar o banco, execute no MySQL:\n";
        echo "CREATE DATABASE {$config['database']} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;\n";
    }
} catch (PDOException $e) {
    echo "✗ Erro na conexão: " . $e->getMessage() . "\n\n";
    
    if (strpos($e->getMessage(), 'Access denied') !== false) {
        echo "SOLUÇÃO:\n";
        echo "1. Verifique a senha do usuário root no MySQL\n";
        echo "2. No XAMPP, o usuário root geralmente tem senha VAZIA\n";
        echo "3. Se tiver senha, configure no arquivo .env:\n";
        echo "   DB_PASSWORD=sua_senha_aqui\n";
        echo "\n4. Para redefinir a senha do root no MySQL:\n";
        echo "   - Abra o MySQL Workbench ou phpMyAdmin\n";
        echo "   - Ou execute no terminal MySQL:\n";
        echo "     ALTER USER 'root'@'localhost' IDENTIFIED BY '';\n";
    }
}




