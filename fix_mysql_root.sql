-- Script SQL para corrigir o usuário root no MySQL
-- Execute este script no MySQL Workbench

-- Opção 1: Remover senha do root (deixar vazio)
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
FLUSH PRIVILEGES;

-- Se a opção 1 não funcionar, tente:
-- Opção 2: Criar um novo usuário sem senha
-- CREATE USER 'root'@'localhost' IDENTIFIED BY '';
-- GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;
-- FLUSH PRIVILEGES;

-- Depois de executar, teste a conexão:
-- SELECT USER(), CURRENT_USER();




