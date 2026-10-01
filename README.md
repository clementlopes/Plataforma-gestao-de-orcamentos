# Plataforma GO — Gestão de Orçamentos

Sistema web de gestão de orçamentos empresariais, em PHP, com interface
AdminLTE. Foi criado como trabalho escolar e depois modernizado para estar
publicado e demonstrável: o login foi reescrito e a forma de guardar as
palavras-passe deixou de ser `md5()`.

> **Demonstração:** <!-- Troque pelo seu URL do Virtualmin -->
> <!-- https://exemplo.seudominio.pt -->

---

## O que mudou nesta modernização

O código original funcionava, mas tinha práticas que já não são aceitáveis
num servidor público:

| Antes | Agora |
|---|---|
| `md5($senha)` | **SHA256 com sal aleatório por utilizador** |
| Sem regra de tamanho de senha | **Mínimo de 8 caracteres**, validado no servidor |
| `WHERE password = '".md5($_POST)."'` | **Prepared statements** (`mysqli_prepare`) |
| Comparação de strings normal | **`hash_equals()`** (tempo constante) |
| Credenciais no `config.php` | **Ficheiro `.env`**, fora do Git |
| `error_reporting(E_ALL)` sempre ligado | **Só em desenvolvimento** (`APP_DEBUG`) |
| `USERNAME` sem restrição de unicidade | **`UNIQUE`** na base de dados |
| Erros de login ditos por `alert()` | **Mensagem no servidor**, genérica |
| Sem proteção CSRF | **Token CSRF** no formulário |

### Como é guardada uma palavra-passe

A coluna `PASSWORD` deixa de ser um `md5` e passa a guardar:

```text
sha256:6076605ba5d0a4c1167779e9d6ec167d:31332bd8764cbbc60dcd32e7b4ed9a64c5e9f343261f591965efb12dc254d9d6
└┬┘ └──────────────┬──────────────┘ └──────────────────────────┬───────────────────────────┘
 │                │                                             │
algoritmo    sal (16 bytes,        SHA256(sal + senha)
             aleatório por
             utilizador)
```

- O **sal** é sorteado com `random_bytes()` de cada vez que a palavra-passe é
  definida. Duas pessoas com a mesma palavra-passe ficam com hashes diferentes.
- Sem sal, quem tivesse a base de dados podia usar tabelas pré-calculadas
  (rainbow tables) para reverter a maioria das palavras-passe de imediato.
- A comparação usa `hash_equals()`, que demora o mesmo tempo qualquer que seja
  o número de caracteres correctos, impedindo ataques por temporização.

> **Nota honesta:** SHA256 é rápido de computar, e em produção o ideal seria
> `password_hash()` com Argon2id ou bcrypt. O sal por utilizador resolve o
> problema das rainbow tables, mas não o de um atacante com GPU a tentar
> milhões de palpites por segundo. Aqui ficou SHA256 porque era o requisito do
> projecto; num sistema real, usaria `password_hash()`.

---

## Tecnologias

- **Backend:** PHP 7.4+ (testado em PHP 8.2)
- **Base de dados:** MySQL / MariaDB, com `mysqli`
- **Frontend:** HTML5, CSS3, JavaScript
- **Bibliotecas:** Bootstrap 3, AdminLTE, jQuery, DataTables, iCheck, CKEditor, Chart.js
- **Geração de PDF:** TCPDF (`orcamentopdf.php`)

---

## Funcionalidades

**Orçamentos**
- Criar e editar orçamentos, com linhas de artigos e serviços
- Cálculo automático de totais e de IVA por linha
- Exportação para PDF
- Gráficos de valores por período

**Artigos e serviços**
- Registo de artigos e serviços com preço unitário
- Categorias separadas para artigos e para serviços
- Cálculo de IVA por artigo

**Clientes**
- Registo de dados do cliente (NIF, contacto, morada)
- Histórico de orçamentos por cliente

**Utilizadores e empresa**
- Gestão de utilizadores com níveis de permissão (administrador / utilizador)
- Dados da empresa, usados na emissão dos orçamentos
- Cálculo automático de checksum, número e série de orçamento

---

## Instalação

### Requisitos

- PHP 7.4 ou superior, com as extensões `mysqli` e `mbstring`
- MySQL 5.7+ ou MariaDB 10.3+
- Apache (ou qualquer servidor com PHP)

### 1. Base de dados

Crie uma base de dados e importe o ficheiro:

```bash
mysql -u root -p -e "CREATE DATABASE gestao CHARACTER SET utf8;"
mysql -u root -p gestao < "Base dados/gestao.sql"
```

O ficheiro cria a estrutura e uns utilizadores de demonstração.

### 2. Configuração

Copie o ficheiro de exemplo e ajuste os valores:

```bash
cp .env.example .env
```

```ini
DB_SERVER=localhost
DB_USERNAME=gestao
DB_PASSWORD=a-sua-password
DB_DATABASE=gestao
APP_DEBUG=false
```

### 3. Servir os ficheiros

Com XAMPP/Laragon, copie a pasta para `htdocs` e abra no navegador.
Ou, a partir da linha de comandos:

```bash
php -S localhost:8000
```

### 4. Entrar

| Utilizador | Palavra-passe | Permissões |
|---|---|---|
| `admin` | `admin2026` | Administrador |
| `user` | `user2026` | Utilizador |
| `rui` | `rui2026` | Utilizador |
| `marta` | `marta2026` | Utilizador |
| `tiago` | `tiago2026` | Utilizador |

> Troque estas palavras-passe antes de colocar o site online. Como hacerlo
> está descrito na secção seguinte.

### Dados de demonstração

O ficheiro `Base dados/gestao.sql` traz dados de exemplo pensados para uma
demonstração: 12 clientes, 16 artigos, 9 serviços, 29 orçamentos em todos os
estados possíveis (pedido, aceite, rejeitado e realizado) e 9 cheques.

As datas são **fixas em 2026**, e não calculadas a partir de `CURDATE()`. O
dashboard filtra por data corrente, por isso os widgets só ficam preenchidos
enquanto o relógio estiver dentro de 2026 — em Janeiro de 2027 os valores
mensais e o gráfico ficam vazios. Para uma demonstração ao longo do tempo,
ajuste as datas em `Base dados/gestao.sql` (ou consulte a nota em
"Notas e limitações").

A empresa incluída é fictícia (`TechStore Informática, Lda`), com NIF e IBAN de
formato português válido para demonstração.

---

## Publicação no Virtualmin

### 1. Ficheiros

Carregue o conteúdo do repositório para a pasta pública do domínio
(normalmente `~/domains/seudominio.pt/public_html`), pelo **File Manager**,
**FTP** ou `rsync`:

```bash
rsync -av --exclude='.git' --exclude='.env' ./ user@seudominio.pt:~/domains/seudominio.pt/public_html/
```

O `.env` fica de fora de propósito — copie-o à mão no servidor.

### 2. Base de dados e utilizador

Em **Virtualmin → Edit Server → MySQL**, crie uma base de dados e um
utilizador. Anote o nome da base e a password gerada.

### 3. Importar o SQL

Em **Webmin → Servers → MySQL**, ou por linha de comandos:

```bash
mysql -u NOMEUTILIZADOR -p NOMEBASEDADOS < gestao.sql
```

### 4. Configurar o `.env`

No File Manager, edite `.env` no servidor e ponha os valores do passo 2:

```ini
DB_SERVER=localhost
DB_USERNAME=NOMEUTILIZADOR
DB_PASSWORD=PASSWORDGERADA
DB_DATABASE=NOMEBASEDADOS
APP_DEBUG=false
```

### 5. Permissões

```bash
chmod 640 .env
```

O `.env` só deve ser legível pelo PHP, por isso convém que não fique
legível por outros utilizadores do servidor.

### 6. Ligar o domínio e ativar HTTPS

Em **Virtualmin → Edit Server**, confirme o nome do domínio e ative
**SSL** com Let's Encrypt. Com HTTPS activo, os cookies de sessão passam a
ser marcados como `Secure` automaticamente.

### 7. Confirmar que está tudo certo

Abra `https://seudominio.pt/` e entre com `admin` / `admin2026`.

---

## Trocar a palavra-passe de um utilizador

As palavras-passe são guardas com sal, por isso não se pode escrever
directamente na base de dados. Use o script incluído, por SSH:

```bash
php tools/gerar_hash.php "a-nova-palavra-passe"
```

Depois, em `phpMyAdmin` ou na consola MySQL:

```sql
UPDATE utilizadores
SET PASSWORD = 'sha256:osal:...'
WHERE USERNAME = 'admin';
```

Ou, mais simples, entre na aplicação como administrador e use
**Utilizadores → editar → Password**.

---

## Estrutura do projecto

```
.
├── index.php              Página de login
├── login_check.php        Autenticação (prepared statements, hash_equals)
├── auth.php               Hashing de senhas, CSRF, limitação de tentativas
├── env.php                Leitura do ficheiro .env
├── config.php            Ligação à base de dados
├── session.php            Sessão e funções de acesso a dados
├── logout.php             Terminar sessão
├── home.php               Painel principal
├── utilizadores.php      Lista de utilizadores
├── utilizadores_1.php     Criar / editar utilizadores
├── clientes.php           Lista de clientes
├── artigos.php            Lista de artigos
├── servicos.php           Lista de serviços
├── verorcamento.php       Lista de orçamentos
├── orcamentopdf.php       Exportação para PDF
├── dbcontroller.php       Helpers de base de dados
├── tools/
│   └── gerar_hash.php     Gera hashes de senha pela linha de comandos
├── tests/
│   └── testes_auth.php    Testes da autenticação
├── Base dados/
│   └── gestao.sql         Estrutura e dados de demonstração
├── bootstrap/  dist/  plugins/  js/  img/   Front-end (AdminLTE)
└── .env.example           Exemplo de configuração
```

---

## Verificação

A parte de autenticação tem uma suite de testes em `tests/testes_auth.php`,
que corre contra uma base de dados MySQL/MariaDB real e não precisa de
framework de testes. São **108 testes** (PHP 8.2, MariaDB 10.4), a cobrir:

- formato do hash, tamanho e unicidade do sal
- aceitação e rejeição conforme o tamanho da senha, de 1 a 8 caracteres,
  incluindo caracteres multibyte
- login válido, senha errada, utilizador inexistente, campos vazios
- rejeição dos antigos hashes `md5` (não há migração: a base foi recriada)
- tentativas de injecção de SQL no nome de utilizador e em campos de texto
- token CSRF válido, inválido, vazio e de tipo errado
- bloqueio ao fim de 5 tentativas, e expiração ao fim de 60 segundos
- cookies de sessão `HttpOnly` e `SameSite=Lax`
- criação e edição de utilizadores, incluindo a regra dos 8 caracteres

Para correr:

```bash
mysql -u root -e "CREATE DATABASE gestao_teste CHARACTER SET utf8;"
mysql -u root gestao_teste < "Base dados/gestao.sql"
php tests/testes_auth.php
```

(defina `PGO_TEST_DB=gestao_teste` se o nome da base for diferente)

A verificar à mão, num navegador:

- com a senha errada aparece "Credenciais inválidas", sem dizer qual dos
  dois campos falhou;
- aceder a `/home.php` sem sessão devolve um redireccionamento para o login;
- criar um utilizador com 7 caracteres mostra um erro no formulário.

---

## Notas e limitações

Coisas que continuam a valer a pena fazer, e que ficaram de fora desta
modernização por não serem o pedido inicial:

- **Passar as restantes páginas a prepared statements.** O login foi
  reescrito; o resto da aplicação ainda monta SQL por concatenação, o que
  mantém risco de injecção de SQL.
- **Usar `password_hash()` com Argon2id**, em vez de SHA256 com sal.
- **XSS:** a saída foi escapada com `htmlspecialchars()` nas páginas de
  utilizadores, mas o resto da aplicação ainda precisa da mesma revisão.
- **Limitação de tentativas por IP.** Aactual é por sessão, o que um atacante
  contorna facilmente abrindo outra sessão.
- **A caixa "Lembrar-me"** original não fazia nada. Passou a guardar apenas o
  nome de utilizador, para preencher o formulário. Um auto-login a sério
  exigiria um token assinado ou uma tabela de tokens.
- **Bootstrap 3 e AdminLTE** estão desatualizados; as versões actuais usariam
  um suporte de navegador diferente.

---

## Licença

O código do projecto usa a licença MIT.

A pasta `dist/`, `bootstrap/` e partes de `plugins/` vêm do template
**AdminLTE**, também MIT — ver `LICENSE`.

<!-- Autoria: preencha aqui o seu nome e GitHub -->
