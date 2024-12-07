<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/styleLoginEmpresa.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login da Empresa</title>
  </head>
  <body>
    <div class="main-login">
      <div class="left-login">
        <h1>Faça login<br>E descubra um<br>Novo Talento</h1>
      </div>
      <div class="right-login">
        <div class="logo">
          <img src="../../assets/img/jmtg__2_-removebg-preview.png" alt="logo">
        </div>
        <form class="card-login" action="../../auth/loginEmpresa.php" method="post">
          <h1>LOGIN</h1>
          <div class="textfield">
            <label for="cnpj">Usuário:</label>
            <input type="text" name="cnpj" placeholder="CNPJ" required />
            <i class="bx bxs-user"></i>
          </div>
          <div class="textfield">
            <label for="senha">Senha: </label>
            <input type="password" name="senha" placeholder="Senha" required />
            <i class="bx bxs-lock-alt"></i>
          </div>
          <div class="forgot_password">
            <label><input type="checkbox" />Lembrar</label>
          </div>
          <div class="forgot_password">
            <a href="../../recuperar_senha/empresa/recoverEmpresa.html"> Esqueci minha senha! </a>
          </div>
          <button type="submit" class="btn-login" onclick="login()">Login</button>
          <div class="register-link">
            <p>Não tem acesso? <a href="../../view/empresa/cadastroEmpresa.php">Registre-se</a></p>
          </div>
          <div class="admin-login">
            <a href="../../view/admin/loginAdmin.php">Entrar como Administrador</a>
          </div>
          <div class="voltar">
            <p><a href="../../index.html">Voltar</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
