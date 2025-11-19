<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Criando usuario admin...\n\n";

// Verificar se já existe
$existing = \App\Models\User::where('email', 'admin@stockone.com')->first();

if ($existing) {
    echo "Usuario ja existe!\n";
    echo "Email: admin@stockone.com\n";
    echo "Senha: admin123\n\n";
    echo "Se nao souber a senha, execute no MySQL:\n";
    echo "UPDATE users SET password = '" . bcrypt('admin123') . "' WHERE email = 'admin@stockone.com';\n";
    exit(0);
}

// Criar novo usuário
$user = new \App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@stockone.com';
$user->password = bcrypt('admin123');
$user->save();

echo "✓ Usuario criado com sucesso!\n\n";
echo "Credenciais de login:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📧 Email: admin@stockone.com\n";
echo "🔑 Senha: admin123\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo "Acesse: http://127.0.0.1:8000/admin\n";




