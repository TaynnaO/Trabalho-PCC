<?php
session_start();
if (array_key_exists('usuario', $_SESSION) && !isset($_SESSION['usuario']) && !isset($_SESSION['aluno']) ) {
    header('Location: login.php?error=UsuarioNaoAutenticado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/png" href="..\imagens\Logo.svg"/>
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/65f22fe718.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Área do Aluno</title>
</head>
<body>
    <h1>Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['aluno']['Nome']); ?></h1>

    <header>
    <ul>
        <a href='../authenticated/home.php'> <li>
            <img src='..\imagens\jmtg__2_-removebg-preview.png' alt=''class='logo'> 
        </li></a> 
        <a href='../authenticated/profissionais.php'><li>
           Profissionais
        </li></a>
        <a href='../authenticated/ultimasVagas.php'><li>Ultimas vagas</li></a>
        <a href='../authenticated/vagasPorCidade.php'><li>Vagas por cidade</li></a>
        <div class='dropdown'> 
        <div class='perfil-img' style='display:flex; align-items:center; justify-content:center;'>
        <div style='display:flex; flex-direction:column; align-items:center;'>
          <img src='uploads/$row[foto]' style='width:50px; height:50px; border-radius:100%;'>  
          </div>    
    <li class='dropdown-btn'>$row[nome]</li>
    <svg xmlns='http://www.w3.org/2000/svg' style='width:10px; color:green;' viewBox='0 0 320 512'><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/ ></svg>
    </div>
    <ul class='dropdown-menu'>
    <a href='perfil.php'><li>Editar perfil</li></a>
    <a href='../authenticated/profissao.php'> <li>Profissão</li></a>
    <a href='curriculo.php'> <li>Currículo</li></a>
    <a href='./logout.php'><li>Sair</li></a>
    </ul>
    </div>
        </ul>
    </header>

    <p><a href="aluno_list.php">Gerenciar Alunos</a></p>
    <p><a href="./curriculo/imprimir_curriculo.php">Imprimir curriculo</a></p>
    <p><a href="../../auth/logoutAluno.php">Sair</a></p>
</body>
</html>
