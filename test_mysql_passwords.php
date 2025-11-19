<?php

// Script para testar senhas comuns do XAMPP
require __DIR__ . '/vendor/autoload.php';

$passwords = ['', 'root', '123456', 'xampp'];

echo "Testando senhas comuns do XAMPP...\n\n";

foreach ($passwords as $password) {
    try {
        $pdo = new PDO(
            "mysql:host=127.0.0.1;port=3306;charset=utf8mb4",
            'root',
            $password
        );
        
        $pwd_display = $password === '' ? '(vazia)' : $password;
        echo "✓ SUCESSO com senha: {$pwd_display}\n";
        
        // Verificar se o banco existe
        $stmt = $pdo->query("SHOW DATABASES LIKE 'stockone'");
        if ($stmt->rowCount() > 0) {
            echo "  ✓ Banco 'stockone' existe!\n";
        } else {
            echo "  ✗ Banco 'stockone' NÃO existe - precisa criar\n";
        }
        
        echo "\nConfigure no .env:\n";
        echo "DB_PASSWORD=" . ($password === '' ? '' : $password) . "\n";
        exit(0);
    } catch (PDOException $e) {
        $pwd_display = $password === '' ? '(vazia)' : $password;
        echo "✗ Falhou com senha: {$pwd_display}\n";
    }
}

echo "\n✗ Nenhuma das senhas comuns funcionou.\n";
echo "\nSOLUÇÃO:\n";
echo "1. Abra o MySQL Workbench\n";
echo "2. Conecte ao servidor local\n";
echo "3. Veja qual senha você usa para conectar\n";
echo "4. Adicione no arquivo .env:\n";
echo "   DB_PASSWORD=sua_senha_aqui\n";
echo "\n5. Se quiser remover a senha do root, execute no MySQL:\n";
echo "   ALTER USER 'root'@'localhost' IDENTIFIED BY '';\n";
echo "   FLUSH PRIVILEGES;\n";




