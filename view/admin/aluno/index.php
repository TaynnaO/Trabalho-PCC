<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../layouts/nav.php";

require_once __DIR__ . "/../../model/dao/usuariodao.php";

# cria um objeto da classe UsuarioDAO e chama método para realizar ação.
$dao = new AlunoDAO();
$usuarios = $dao->getAll();
$quantidadeRegistros = count($usuarios);
?>

<main>
    <h1>Alunos</h1>
    <section class="section__btn">
        <a class="btn" href="create.php">Novo</a>
        <a class="btn" href="pesquisarId.php">Pesquisar ID</a>
        <a class="btn" href="../../relatorios/RelatorioUsuarios.php" target="_blank">Imprimir</a>
    </section>

    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
        </div>
    <?php endif; ?>

    <hr>

    <section>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Perfil</th>
                    <th>Ação</th>

                </tr>
            </thead>

            <tbody>
                <?php if ($quantidadeRegistros == "0") : ?>
                    <tr>
                        <td colspan="4">Não existem usuários cadastrados.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <?php $status =  $usuario['status'] == "1" ? "ATIVO" : "INATIVO"; ?>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?= htmlspecialchars($usuario['nome']); ?></td>
                            <td><?= htmlspecialchars($usuario['email']); ?></td>
                            <td><?= htmlspecialchars($status); ?></td>
                            <td><?= htmlspecialchars($usuario['perfil_id']); ?></td>
                            <td class="td__operacao">
                                <a class="btnalterar" href="edit.php?id=<?= $usuario['id']; ?>">Alterar</a>
                                <a class="btnexcluir" href="delete.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>