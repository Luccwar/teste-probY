# Teste ProbY

Olá, este projeto foi desenvolvido como parte de uma avaliação para o ProbY.

## Tabelas de Conteúdo

- [Instalação](#instalação)
- [Rodar o Projeto](#rodar-o-projeto)
- [Funcionalidades](#funcionalidades)

## Instalação

### 1. Pré-requisitos

Certifique-se de ter os seguintes requisitos instalados:

- PHP 8.3 e Laravel 11 - O projeto foi desenvolvido com estas versões dos frameworks. É possível que funcione com versões anteriores, mas não é garantido;
- Composer em sua versão mais atualizada;
- Banco de Dados Relacional PostgreSQL 16 e pgAdmin4;
- NodeJS em sua versão mais atualizada.

### 2. Passos para instalar o projeto

- Clone o repositório:

```bash
git clone https://github.com/Luccwar/teste-probY.git
```

- Acesse o projeto

```bash
cd teste-probY-main
```

- Instale as dependências do Back-End:

```bash
composer install
npm install
```

### 3. Banco de Dados

- Copie o arquivo `.env.example` para `.env` (se `.env` não existir, crie o arquivo na pasta raiz do projeto) e ajuste as configurações específicas do banco de dados:

O exemplo abaixo está configurado com PostgreSQL. Substitua as configurações de acordo com o seu banco de dados. 

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=probY
DB_USERNAME=postgres
DB_PASSWORD=123456
```

Para garantir que as mensagens exibidas pelo sistema estejam em Português Brasileiro, certifique-se de que as opções de idioma em `.env` estejam configuradas como abaixo:

```env
APP_LOCALE=pt-BR
APP_FALLBACK_LOCALE=pt-BR
APP_FAKER_LOCALE=pt-BR
```

- Após configurar o arquivo `.env`, utilize o comando abaixo para gerar uma chave de criptografia e evitar erros no projeto:

```bash
php artisan key:generate
```

- Execute o comando `migrate` para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

- Por fim, utilize o comando `db:seed` para popular o banco de dados com um usuários e projetos, destaque para um usuário administrador pré-configurado, ele possui as credenciais que você utilizará no login, estas são:

    - **Nome**: Admin  
    - **Email**: admin@admin.com  
    - **Senha**: 123456  

```bash
php artisan db:seed --class=DatabaseSeeder
```

## Rodar o Projeto

### 1. Servidor Backend

- Inicie o servidor Laravel:

```bash
php artisan serve
```

O Back-End estará disponível em `http://127.0.0.1:8000` (ou conforme configurado no arquivo `.env`).

### 2. Credenciais de Acesso

O banco de dados já está populado com as seguintes credenciais de login:

- **Email**: admin@admin.com  
- **Senha**: 123456  

### 3. Rotas do Sistema

1. **Página Inicial/Rota de Login**: `http://127.0.0.1:8000/login`  
2. **Rota de Usuários**: `http://127.0.0.1:8000/users` (Acessível apenas se autenticado)  
3. **Rota de Projetos**: `http://127.0.0.1:8000/projects` (Acessível apenas se autenticado)  

## Funcionalidades

- No projeto atual, você pode criar, editar, excluir e listar cadastros de usuários e projetos. 
- O sitema bloqueia usuários não autenticados de acessarem certas rotas.
- Todos os formulários de criação e edição de cadastros possuem validações no back-end para garantir a integridade dos dados.

**Nota:** Tanto a interface Bootstrap quanto o banco de dados PostgreSQL foram escolhidos pela minha afinidade com estes, já os utilizei diversas vezes, especialmente durante a faculdade.
