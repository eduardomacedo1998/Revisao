<p align="center">
    <h1>📚 Revisão - Plataforma de Gerenciamento de Disciplinas</h1>
</p>

<p align="center">
    Uma aplicação web moderna desenvolvida com <strong>Laravel</strong> para gerenciar disciplinas e temas de revisão, permitindo que usuários organizem seus estudos de forma eficiente.
</p>

---

## 📋 Sobre o Projeto

**Revisão** é uma plataforma educacional que permite aos usuários:

- ✅ Criar uma conta e fazer login seguro
- 📝 Cadastrar e gerenciar disciplinas
- 🎯 Organizar temas de revisão por disciplina
- 👤 Perfil de usuário com tipos (Usuário comum e Administrador)
- 📊 Acompanhar suas atividades de revisão

O projeto foi desenvolvido com foco em proporcionar uma experiência intuitiva e moderna para estudantes que desejam organizar suas rotinas de revisão.

---

## 🛠️ Tecnologias Utilizadas

- **Framework**: Laravel 11
- **Linguagem**: PHP 8+
- **Banco de Dados**: PostgreSQL
- **Front-end**: Bootstrap 5
- **Autenticação**: Sistema customizado com sessões
- **Padrão de Arquitetura**: MVC com Service Layer e Repository Pattern

---

## 🚀 Funcionalidades Principais

### Autenticação
- Registro de novos usuários
- Login com validação de credenciais
- Sistema de sessão para manter usuário logado
- Tipos de usuário (Admin e User)

### Gerenciamento de Disciplinas
- Criar novas disciplinas
- Adicionar temas de revisão
- Visualizar disciplinas cadastradas
- Associar disciplinas a usuários

### Interface Moderna
- Design responsivo com Bootstrap 5
- Navegação intuitiva
- Alertas de sucesso/erro
- Painel de usuário personalizado

---

## 📁 Estrutura do Projeto

```
Revisao/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── UserControllers.php
│   ├── Models/
│   │   └── User.php
│   ├── Repositories/
│   │   └── UserReposytori.php
│   └── Services/
│       └── UserService.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   └── 2025_12_18_000003_create_disciplinas_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── layout.blade.php
│       ├── welcome.blade.php
│       └── home.blade.php
├── routes/
│   └── web.php
└── .env
```

---

## 🔧 Instalação e Configuração

### Pré-requisitos
- PHP 8.0+
- Composer
- PostgreSQL
- Laravel 11

### Passos de Instalação

1. **Clone o repositório**
   ```bash
   git clone https://github.com/eduardomacedo1998/Revisao.git
   cd Revisao
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o arquivo .env**
   ```bash
   cp .env.example .env
   ```
   Atualize as variáveis de banco de dados:
   ```
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=revisao
   DB_USERNAME=postgres
   DB_PASSWORD=sua_senha
   ```

4. **Gere a chave da aplicação**
   ```bash
   php artisan key:generate
   ```

5. **Execute as migrações**
   ```bash
   php artisan migrate
   ```

6. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

A aplicação estará disponível em `http://localhost:8000`

---

## 📝 Rotas Principais

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/` | Página de login e cadastro |
| POST | `/login` | Autenticar usuário |
| POST | `/register` | Registrar novo usuário |
| GET | `/home` | Página inicial do usuário (protegida) |
| GET | `/users` | Listar todos os usuários (JSON) |

---

## 👥 Tipos de Usuário

### Usuário Comum
- Acessar apenas suas próprias disciplinas
- Gerenciar seus temas de revisão

### Administrador
- Acessar todas as disciplinas
- Gerenciar usuários (futura implementação)
- Estatísticas gerais da plataforma (futura implementação)

---

## 🗄️ Schema do Banco de Dados

### Tabela: usuarios
```sql
- usuario_id (PK)
- usuario_nome
- senha
- adminxuser (0 = user, 1 = admin)
- created_at
- updated_at
```

### Tabela: disciplinas
```sql
- disciplina_id (PK)
- usuario_id (FK)
- nome_disciplina
- tema_revisao
- data_entrada
```

---

## 🔐 Segurança

- Validação de entrada em todos os formulários
- Proteção CSRF com tokens Laravel
- Sessões seguras
- Senhas armazenadas (implementar hash com bcrypt em produção)

---

## 🚧 Roadmap Futuro

- [ ] Hash de senha com bcrypt
- [ ] Redefinição de senha por email
- [ ] Dashboard com estatísticas
- [ ] Sistema de notas e comentários
- [ ] Compartilhamento de disciplinas
- [ ] API RESTful completa
- [ ] Testes automatizados
- [ ] Deploy em produção

---

## 🤝 Contribuindo

Contribuições são bem-vindas! Por favor, faça um fork do projeto e envie um pull request com suas melhorias.

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

---

## 👨‍💻 Autor

**Eduardo Macedo**
- GitHub: [@eduardomacedo1998](https://github.com/eduardomacedo1998)

---

## 📞 Suporte

Para dúvidas ou sugestões, abra uma issue no repositório GitHub.

---

**Desenvolvido com ❤️ para estudantes que querem organizar suas revisões**