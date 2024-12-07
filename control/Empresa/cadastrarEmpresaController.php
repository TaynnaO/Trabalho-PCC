<?php
header('Content-Type: text/html; charset=utf-8;');

//Habilitar exibição de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Iniciar a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '../../../model/DTO/empresaDTO.php';
require_once __DIR__ . '../../../model/DAO/empresaDAO.php';
require_once __DIR__ . '../../../model/DTO/validacoes/validarCpf.php';
require_once __DIR__ . '../../../model/DTO/validacoes/validarEmail.php';
require_once __DIR__ . '../../../model/DTO/validacoes/validarSenha.php';

//Função para coletar e sanitizar dados de entrada com strip_tags
function getPostData($key) {
    return isset($_POST[$key]) ? strip_tags($_POST[$key]) : null;
}

    # recebe os valores enviados do formulário via método post e evita sql injection e valida o tipo de dados
    $nome = strip_tags($_POST["Nome"]);
    $cnpj = strip_tags($_POST["CNPJ"]);
    $endereco = strip_tags($_POST["Endereco"]);
    $cep = strip_tags($_POST["CEP"]);
    $email = strip_tags($_POST["Email"]);
    $telefone = strip_tags($_POST["Telefone"]);
    $senha = strip_tags($_POST["Senha"]);

    //Normaliza o CPF removendo pontos e traços
    $cnpj = str_replace(['.','-'], '', $cnpj);
    $telefone = str_replace(['(',')','','-'], '', $telefone);

    // Validação do CNPJ
    /*if (!ValidadorCNPJ::validar($cnpj)) {
        $_SESSION['erro_alert'] = "CNPJ inválido.";
        $_SESSION['cpf_error'] = "CNPJ inválido.";
        header("Location: ../../view/empresa/cadastroEmpresa.php");
        exit();
    }

    //verifica se o CNPJ já está cadastrado
    $empresaDAO = new EmpresaDAO();
    if (ValidadorCPF::cnpjJaCadastradoEmpresa($cnpj,$adminDAO->dbh)) {
        $_SESSION['erro_alert'] = "o CPF já está cadastrado!";
        $_SESSION['cpf_error'] = "o CPF já está cadastrado!";
        header("Location: ../../view/admin/cadastroAdmin.php");
        exit();
    }*/

    //verifica se o e-mail já está cadastrado
    if (ValidadorEmail::emailJaCadastradoEmpresa($cnpj,$empresaDAO->dbh)) {
        $_SESSION['erro_alert'] = "o e-mail já está cadastrado!";
        $_SESSION['cpf_error'] = "o e-mail já está cadastrado!";
        header("Location: ../../view/empresa/cadastroEmpresa.php");
        exit();
    }

     // Validação da senha
     $senhaValidacao = validarSenha($senha);
     if ($senhaValidacao !== true) {
         $_SESSION['senha_error'] = $senhaValidacao;
         header("Location: ../../view/empresa/cadastroEmpresa.php");
         exit();
     }

    //echo '<prev>'; var_dump($id, $nome, $cnpj, $endereco, $cep, $email, $telefone, $senha, $entrevista_codigo)
    $empresaDTO = new EmpresaDTO();
    $empresaDTO->setId($id);
    $empresaDTO->setNome($nome);
    $empresaDTO->setCnpj($cnpj);
    $empresaDTO->setEndereco($endereco);
    $empresaDTO->setCep($cep);
    $empresaDTO->setEmail($email);
    $empresaDTO->setTelefone($telefone);
    $empresaDTO->setSenha($senha);
    $empresaDTO->setEntrevista_Codigo($entrevista_codigo);

    $empresaDAO = new EmpresaDAO();
    $sucesso = $empresaDAO->newInsert($empresaDTO);

    //echo '<pre>'; var_dump($empresaDTO);exit;

    if($sucesso){
        $_SESSION['sucesso'] = "Cadastro realizado com sucesso. <br> Seja bem-vindo ao JMTG Service. <br> Encontre aqui o colaborador ideal para a sua empresa!";
        header('location: ../../view/empresa/loginEmpresa.php?msg=Usuário cadastrado com sucesso!');
    } else {
        $_SESSION['erro'] = "Aconteceu um problema no cadastramento. <br> Por favor, tente novamente.";
        header('location: ../../view/empresa/loginEmpresa.php?error=Aconteceu um problema no cadastramento!');
    }
    //echo "{$msg}";
    exit();
?>