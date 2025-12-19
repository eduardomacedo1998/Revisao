<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisao - Login e Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #004085);
        }
        .form-control {
            border-radius: 10px;
        }
        .card-header {
            background: transparent;
            border-bottom: none;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Nome de Usuário</label>
                                <input type="text" id="login_username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="login_password" class="form-label">Senha</label>
                                <input type="password" id="login_password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Cadastro
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="register_username" class="form-label">Nome de Usuário</label>
                                <input type="text" id="register_username" name="usuario_nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_password" class="form-label">Senha</label>
                                <input type="password" id="register_password" name="senha" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_adminxuser" class="form-label">Tipo de Usuário</label>
                                <select id="register_adminxuser" name="adminxuser" class="form-select" required>
                                    <option value="user">Usuário</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>