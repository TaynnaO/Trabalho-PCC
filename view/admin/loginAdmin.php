<?php
// Iniciar a sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/styleLoginAdmin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login do Administrador</title>
  </head>
  <body>
    <div class="main-login">
      <div class="logo-texto">
          <div class="logo">
            <img src="../../assets/img/jmtgBRANCO-removebg-preview.png" alt="logo">
          </div>
          <div class="left-login">
            <h1>Faça login<br>E descubra um<br>Mundo de Possibilidades</h1>
          </div> 
      </div>
      <div class="right-login">
        <div class="form">
        <form class="card-login" action="../../auth/loginAdmin.php" method="post">
          <h1>LOGIN</h1>
          
          <!-- Exibição das mensagens de erro ou sucesso -->
          <?php
              if (isset($_SESSION['msg'])) {
                  echo "<div class='msg " . $_SESSION['msg']['tipo'] . "' id='#'>" . $_SESSION['msg']['mensagem'] . "</div>";
                  unset($_SESSION['msg']);
              }
          ?> 
          <div class="textfield">
            <label for="CPF">CPF:</label>
            <input type="text" name="CPF" id="CPF" placeholder="CPF" required autocomplete="off" />
            <i class="bx bxs-user"></i>
          </div>
          <div class="textfield">
            <label for="Senha">Senha:</label>
            <input type="password" name="Senha" id="Senha" placeholder="Senha" required autocomplete="off" />
            <i class="bx bxs-lock-alt"></i>
          </div>
          <div class="forgot_password">
            <label><input type="checkbox" />Lembrar</label>
          </div>
          <div class="forgot_password">
            <a href="../../recuperar_senha/admin/recoverAdmin.html">Esqueci minha senha!</a>
          </div>
          <button type="submit" class="btn-login">Login</button>
          <div class="register-link">
            <p>Não tem acesso? <a href="../admin/cadastroAdmin.php">Registre-se</a></p>
          </div>
          <div class="voltar">
            <p><a href="../../index.html">Voltar</a></p>
          </div>
        </form>

        </div>
      </div>
    </div>
  </body>
</html>
