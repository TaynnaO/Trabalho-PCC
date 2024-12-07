<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-nd-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if (isset($_GET['Matricula'])) {
                                $usuario_id = mysqli_real_escape_string($conexao, $_GET['Matricula']);
                                $bdh = "SELECT * FROM usuarios WHERE id='$matricula'";
                                $query = mysqli_query($conexao, $bdh);

                                if (mysqli_num_rows($query) > 0) {
                                    $aluno = mysqli_fetch_array($query);
                        ?>
                        <form action="../../../control/Aluno/alterarAlunoController.php" method="POST">
                            <input type="hidden" name="Matricula" value="<?=$matricula['Matricula']?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="Nome" value="<?=$aluno['Nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de Nascimento</label>
                                <input type="date" name="data_nascimento" value="<?=$usuario['Data_Nascimento']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>E-mail</label>
                                <input type="text" name="email" value="<?=$usuario['Email']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="Senha" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                        } else {
                            echo '<h5>Usuário não encontrado!</h5>';
                        }
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php require_once __DIR__ . "/../../../layouts/footer.php"; ?>