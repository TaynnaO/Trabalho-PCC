<?php
// Iniciar a sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styleForm.css">
    <link rel="stylesheet" href="../../assets/css/mensagens.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../assets/js/cadastro.js"></script>
    <title>Cadastro Administrador</title>
</head>
<body>
<div class="msg">
        <span>
            <!-- Mensagem de sucesso -->
            <?php if (isset($_SESSION['sucesso'])): ?>
                <div class="msgsucesso">
                    <?php echo $_SESSION['sucesso']; ?>
                </div>
                <?php unset($_SESSION['sucesso']); // Limpa a mensagem após exibi-la ?>
            <?php endif; ?>

            <!-- Mensagem de erro -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="msgerro">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); // Limpa a mensagem após exibi-la ?>
            <?php endif; ?>
        </span>
    </div>
    <div class="imagem-cadastro">
        <h1>Faça a diferença que você <br> quer ver no mundo</h1>
        <h1 class="subtitle">Entre para a família JMTG!</h1>
    </div>
    <div class="tab-container">
        <form action="../../control/Admin/cadastrarAdminController.php" id="formCadastroAdmin" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
            <div class="tab">
                <button class="tablinks active" onclick="openTab(event, 'tab1')">Cadastro inicial</button>
                <button class="tablinks" onclick="openTab(event, 'tab2')">Dados pessoais</button>
                <button class="tablinks" onclick="openTab(event, 'tab3')">Termo</button>
            </div>
            <div id="tab1" class="tab-content active">
                <div class="cadastro-inicial">
                    <h1>Cadastro inicial</h1>
                    <div class="caixa-input">
                        <label for="Nome">Nome: </label>
                        <input id="Nome" type="text" name="Nome" placeholder="Digite o seu nome" required>
                    </div>
                    <div class="caixa-input">
                        <label for="Email">Email</label>
                        <input id="Email" type="email" placeholder ="Digite seu e-mail" name="Email" required>
                        <?php if (isset($_SESSION['email_error'])): ?>
                            <span style="color:#000000;">
                                <?php echo $_SESSION['email_error']; ?>
                            </span>
                        <?php unset($_SESSION['email_error']); 
                        // Limpa a mensagem após exibi-la ?>
                        <?php endif; ?>
                    </div>
                    <div class="caixa-input">
                        <label for="Senha">Senha</label>
                        <input id="Senha" type="password" placeholder="Crie uma senha" name="Senha" required>
                        <span id="mensagemErroSenha" class="erro"></span>
                        <?php if (isset($_SESSION['senha_error'])): ?>
                            <span style="width: 100%; color: #000000;">
                                <?php echo $_SESSION['senha_error']; ?>
                            </span>
                        <?php unset($_SESSION['senha_error']); // Limpa a mensagem apexibi-la ?>
                        <?php endif; ?>
                    </div>
                    <div class="caixa-input">
                        <label for="confirmSenha">Confirme sua senha</label>
                        <input id="confirmSenha" type="password" placeholder="Digite sua senha novamente" name="confirmSenha">
                    </div>
                    <input type="button" value="Próximo" onclick="nextTab()">
                </div>
            </div>
            <div id="tab2" class="tab-content">
                <div id="dadosPessoais">
                    <h1>Dados pessoais</h1>
                    <div id="caixa-input">
                        <label for="CPF">CPF</label>
                        <input id="CPF" type="text" placeholder="xxx.xxx.xxx-xx" name="CPF" required>
                        <span id="mensagemErroCpf" class="erro"></span>
                            <?php if (isset($_SESSION['cpf_error'])): ?>
                                <span style="color:#000000;"><?php echo $_SESSION['cpf_error']; ?></span>
                            <?php unset($_SESSION['cpf_error']); // Limpa a mensagem após exibi-la ?>
                            <?php endif; ?>
                    </div>
                    <div id="caixa-input">
                        <label for="Funcao">Função</label>
                        <input id="Funcao" type="text" placeholder ="Digite a sua funcao" name="Funcao" required>
                    </div>
                    <div id="caixa-input">
                        <label for="Descricao">Descricao</label> 
                        <input id="Descricao" type="text" placeholder="Descreva a sua funcao" name="Funcao" required>
                    </div>
                    <div id="caixa-input">
                        <label for="Telefone">Telefone</label>
                        <input id="Telefone" type="tel" placeholder="(xx) xxxxx-xxxx" name="Telefone" required>
                    </div>

                    <div class="btnsDadosPessoais">
                    <button onclick="prevTab()" class="btnAnteriorDadosPessoais" style="background:red; margin:5px;">Anterior</button>
                    <input type="button" value="Próximo" onclick="nextTab()" style="margin:5px;">
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab-content">
                <h1>Termos de uso</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum libero pariatur incidunt culpa, ex 
                mollitia dolore porro ducimus temporibus amet ea corporis ad optio error animi repell
                at sed aspernatur quod!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum libero pariatur incidunt culpa, ex 
                mollitia dolore porro ducimus temporibus amet ea corporis ad optio error animi repell
                at sed aspernatur quod!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum libero pariatur incidunt culpa, ex 
                mollitia dolore porro ducimus temporibus amet ea corporis ad optio error animi repell
                at sed aspernatur quod!</p>
                <div class="check-termos-de-uso">
                <input type="checkbox" name="meucheckbox"></div>
                <div class="btn-termos-de-uso">
                <button onclick="prevTab()">Anterior</button>
                <input type="submit" value="Finalizar cadastro" onclick="nextTab()">
                </div>
            </div>
        </form>
    </div>

    <script src="../../assets/js/mascaras.js"></script>
</body>
</html>

<style>
  .tab-content h1{
    color:white;
    text-align:center;
  }

  .tab-content p{
    color:white;
    font-size:16px;
    line-height:1.5;
  }

  .btn-termos-de-uso{
    display:flex;
    align-items:center;
    justify-content:center;
  }

  .btn-termos-de-uso input[type="submit"]{
    background-color: green;
    color: white;
    font-size:16px;
    width:180px;
    height:35px;
    border-radius: 5px;
    border:none;
    outline: none;
    padding-left: 5px;
    margin:10px;
  }

  .check-termos-de-uso {
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
  }

  .btn-termos-de-uso button{
    background-color: #6396d8;
    color: white;
    font-size:16px;
    width:180px;
    height:35px;
    border-radius: 5px;
    border:none;
    outline: none;
    padding-left: 5px;
    margin:10px;
  }

  #dadosPessoais #caixa-input{
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin:10px;
  }

  #dadosPessoais #caixa-input label{
    color:white;
  }

  #dadosPessoais{
    display:flex;
    justify-content: center;
    flex-direction: column;
    align-items:center;
    margin:20px auto;
  }

  #dadosPessoais input{
    width:400px;
    height:35px;
    border-radius: 5px;
    border:none;
    outline: none;
    padding-left: 5px;
    margin:0;
  }

  #dadosPessoais h1{
    color:white;
  }

  #dadosPessoais input[type="button"]{
    background-color: #6396d8;
    color: white;
    font-size:16px;
    width:180px;
  }

  .btnAnteriorDadosPessoais{
    background-color: #6396d8;
    color: white;
    font-size:16px;
    width:180px;
    height:35px;
    border-radius: 5px;
    border:none;
    outline: none;
    padding-left: 5px
  }

  .btnsDadosPessoais{display:flex; align-items:center;}
</style>