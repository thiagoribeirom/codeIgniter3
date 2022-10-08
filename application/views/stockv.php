<?php
defined('BASEPATH') or exit('No direct script access allowed');
$quantidade = 0;
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-9 text-start">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?php echo site_url('Gestao/novo') ?>" class="btn btn-primary">Novo produto</a>
                <a href="<?php echo site_url('Gestao/movimentos') ?>" class="btn btn-primary">Movimentações</a>
            </div>
        </div>

        <div class="col-3 text-end">
            <a href="<?php echo site_url('Inicio/logout') ?>" class="btn btn-primary">Logout</a>
        </div>
    </div>

    <hr>

    <div class="row m-5 justify-content-center">
        <div class="col">
            <?php if(count($produtos) == 0): ?>
                <p class="text-center">Não existe produtos</p>
                <?php else: ?>
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $p) : ?>
                        <?php $quantidade += 1; ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url("Gestao/editar/$p[id]") ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <?= $p['nome'] ?>
                            </td>
                            <td><?= $p['quantidade'] ?></td>
                            <td>
                                <a href="<?php echo site_url("Gestao/adicionar/$p[id]") ?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                                <a href="<?php echo site_url("Gestao/subtrair/$p[id]") ?>"><i class=" fa fa-minus-square" aria-hidden="true"></i></a>
                                <a href="<?php echo site_url("Gestao/eliminar/$p[id]") ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <strong>Quantidade: <?= $quantidade; ?></strong>
        </div>
    </div>
</div>

<?php endif; ?>