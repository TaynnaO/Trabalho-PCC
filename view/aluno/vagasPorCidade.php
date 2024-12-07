<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Por Cidade</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>

        .not-result{
            font-size:30px;
            text-align:center;
            margin:50px auto;
            font-weight:600;
        }
        section{
            display:flex;
            justify-content:center;
            margin:30px;
            align-items:center;
            flex-wrap:wrap;
          
        }
        .results{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            background:white;
            color:black;
            flex-wrap:wrap;
            width:350px;
            border-radius:10px;
            height:110px;
            margin:10px;
            padding:5px;
            text-align:center;
        }
        button{
            background:#FFA500;
            color:white;
            border:none;
            margin:10px;
            height:30px;
            width:100px;
            border-radius:12px;
            cursor:pointer;
        }
    </style>
</head>
<body style="background-image:url('https://i.ibb.co/cJgW1Zy/Adobe-Stock-352915097-1.png');  background-repeat: no-repeat;
;     background-size: cover;">
<?php 
session_start();

// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$senha = "";
$dbname = "jmtg_service";

// Conexão com o banco de dados
$dbh = new mysqli($servername, $username, $senha, $dbname);
if ($dbh->connect_error) {
    die("Falha na conexão: " . $dbh->connect_error);
}

// Verifica se o usuário está logado



$matricula = $_SESSION["aluno"];

// Busca os dados do usuário no banco de dados
$dbh = "SELECT * FROM `aluno` WHERE matricula = $matricula and Foto is not null";
$result = $dbh->query($dbh);

// Exibe o formulário para atualização do cadastro
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

echo "<header style='background:white; margin-top:-10px; padding:5px;'>
    <ul>
        <a href='../authenticated/home.php'> <li>
            <img src='..\imagens\jmtg__2_-removebg-preview.png' widht:120px height:120px alt=''class='logo'> 
        </li></a> 
        </li></a>
        <a href='../authenticated/ultimasVagas.php'><li>Ultimas vagas</li></a>
        <a href='../authenticated/vagasCriadas.php'><li>Minhas vagas</li></a>
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
  <a href='curriculo.php'> <li>Currículo</li></a>
  <a href='./logout.php'><li>Sair</li></a>
  </ul>
</div>


    </ul>
</header>";

     }
      

}

  else{

    echo "<header style='background:white; margin-top:-10px; padding:5px;'>
    <ul>
        <a href='../authenticated/home.php'> <li>
            <img src='../imagens/imagens/jmtg__2_-removebg-preview.png' alt=''class='logo'> JMTG
        </li></a> 
        <a href='../authenticated/profissionais.php'><li>
           Profissionais
        </li></a>
        <a href='../authenticated/ultimasVagas.php'><li>Ultimas vagas</li></a>
        <a href='../authenticated/vagasCriadas.php'><li>Minhas vagas</li></a>
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
</header>";
  
  }
?>

<main >
    <div class="title">
    <h1 style='font-weight:300;'>Conectando talentos a oportunidades</h1>
    <h1 style='font-weight:600;'>Encontre sua vaga de emprego</h1>
    </div>
    <form method="get" action="">
        <input type="text" name='vagas' placeholder='Pelo que procura? Digite aqui...'>
        <input type="text" name='local' placeholder='Onde? Qual cidade?'>
        <input type="submit" name="buscar" id="" value='Pesquisar' class='pesquisar'>
    </form>
</main>

<section>
<?php

// Verifica se o formulário foi submetido
if(isset($_GET['buscar'])) {

  // Captura os valores enviados pelo usuário
  $vaga = $_GET['vaga'];
  $local = $_GET['local'];

  // Monta a consulta SQL para selecionar as vagas correspondentes aos termos de busca
  $dbh = "SELECT * FROM vaga WHERE Funcao LIKE '%$vaga%'";

  // Executa a consulta SQL
  $result = $dbh->query($dbh);

  // Verifica se há resultados a serem exibidos
  if ($result->num_rows > 0) {

    // Exibe os resultados
    while($row = $result->fetch_assoc()) {
      echo "<div class='results'>"."
      Função - " . $row["Funcao"]."<br>"."Salario -  ". $row["Salario"]."<a href='login.php'><button>Candidatar</button></a>"."</div>";
    }

  } else {
    echo "<p class='not-result'>Nenhum resultado encontrado.</p>";
  }

  // Fecha a conexão com o banco de dados
  $dbh->close();

}
?>
</section>

</body>
</html>