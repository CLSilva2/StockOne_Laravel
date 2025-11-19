# Instruções para Configurar MySQL no XAMPP

## Problema
O MySQL está rejeitando conexões do usuário root sem senha.

## Solução 1: Remover Senha do Root no MySQL

1. **Abra o MySQL Workbench**
2. **Tente conectar** ao servidor local (localhost/127.0.0.1)
3. **Se pedir senha**:
   - Se souber a senha, use ela
   - Se não souber, pode precisar redefinir

4. **Execute este SQL no MySQL Workbench** (depois de conectar):

```sql
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
FLUSH PRIVILEGES;
```

5. **Ou se preferir, crie um novo usuário**:

```sql
CREATE USER 'laravel'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'laravel'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

Depois altere no `.env`:
```
DB_USERNAME=laravel
DB_PASSWORD=
```

## Solução 2: Criar o Banco de Dados

Depois de conseguir conectar, execute:

```sql
CREATE DATABASE IF NOT EXISTS stockone 
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;
```

## Solução 3: Verificar se o MySQL está rodando no XAMPP

1. Abra o **XAMPP Control Panel**
2. Verifique se o **MySQL** está com status "Running" (verde)
3. Se não estiver, clique em **Start** ao lado do MySQL

## Solução 4: Verificar Porta do MySQL

No XAMPP, o MySQL geralmente usa a porta **3306**, mas pode estar configurado diferente.

1. No XAMPP Control Panel, clique em **Config** ao lado do MySQL
2. Selecione **my.ini**
3. Procure por `port=3306`
4. Se estiver diferente, ajuste no `.env`:

```
DB_PORT=3307
```

## Teste Manual

Após configurar, teste a conexão executando:

```bash
php artisan tinker
```

E depois:

```php
DB::connection()->getPdo();
```

Se funcionar, aparecerá: `PDO Object`

## Arquivos SQL Prontos

Foram criados 2 arquivos SQL para você executar no MySQL Workbench:

1. **fix_mysql_root.sql** - Remove senha do root
2. **create_database.sql** - Cria o banco stockone

Execute-os na ordem no MySQL Workbench.




