<<<<<<< HEAD
# Plataforma GO

**Plataforma GO** é um sistema web de gestão empresarial desenvolvido em PHP com interface baseada no template AdminLTE.
O sistema permite gerenciar produtos, serviços, clientes, orçamentos e utilizadores de forma eficiente.
Este projeto foi desenvolvido para fins educativos já a alguns anos, por isso se encontra com algumas funções obsoletas

## Características

- Interface administrativa responsiva baseada no AdminLTE
- Gestão de artigos/serviços com categorias
- Gestão de clientes
- Sistema de orçamentos
- Controle de utilizadores
- Gestão de IVA (Imposto sobre Valor Acrescentado)
- Layout responsivo para uso em diferentes dispositivos

## Requisitos

- Servidor web (Apache recomendado)
- PHP 5.6 ou superior
- MySQL 5.5 ou superior
- Extensões PHP:
  - mysqli
  - JSON
  - Session

## Instalação

### 1. Configuração do base de Dados

1. Crie uma base de dados MySQL chamado `gestao`
2. Configure os dados no arquivo `config.php`:

```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'gestao');
```
> Nota: "root não é aconselhavel,por ter privilégios absolutos"

### 2. Configuração do Servidor Web

1. Coloque os arquivos do projeto na pasta do seu servidor web (ex: htdocs no XAMPP)
2. Acesse a aplicação através do navegador (ex: http://localhost/pgo/)
3. Faça login com os dados abaixo.

> Nota: utilizador: user, senha:user

### 3. Estrutura do Projeto

- `config.php` - Configuração da conexão com o base de dados
- `dbcontroller.php` - Classe para controle da base de dados
- `artigos.php` - Gerenciamento de artigos/produtos
- `artigos1.php` - Adição/edição de artigos
- `categoria1.php` - Gerenciamento de categorias de artigos
- `categoria2.php` - Gerenciamento de categorias de serviços
- `clientes.php` - Gerenciamento de clientes
- `servicos.php` - Gerenciamento de serviços
- `empresa.php` - Informações da empresa
- `session.php` - Controle de sessões
- `bootstrap/` - Framework CSS
- `dist/` - Arquivos de estilo e scripts do AdminLTE
- `plugins/` - Plugins JavaScript e componentes adicionais

## Funcionalidades

### Gestão de Artigos
- Adicionar, editar e excluir artigos
- Associar artigos a categorias
- Definir preços unitários
- Aplicar percentuais de IVA aos artigos

### Gestão de Serviços
- Registo de serviços oferecidos
- Categorização de serviços
- Gestão de preços e descrições

### Gestão de Clientes
- Registo completo de informações dos clientes
- Histórico de orçamentos

### Gestão de Orçamentos
- Criar / editar orçamentos para clientes
- Visualizar orçamentos anteriores

### Gestão de Utilizadores
- Controle de acesso com diferentes níveis de permissão
- Sistema de login e logout

## Tecnologias Utilizadas

- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **Framework CSS**: Bootstrap 3
- **Template**: AdminLTE
- **Base de Dados**: MySQL
- **Bibliotecas JavaScript**: jQuery, DataTables

## Segurança

- O sistema inclui controle de sessão
- Utiliza conexão mysqli para proteger contra SQL injection

## Licença

Este projeto utiliza o template AdminLTE como base.
Verifique o arquivo Licence original do AdminLTE para mais detalhes.
