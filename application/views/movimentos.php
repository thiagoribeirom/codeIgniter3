<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-9 text-start">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?php echo site_url('Inicio/') ?>" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        <div class="col-3 text-end">
        <a href="<?php echo site_url('Gestao/limpartudo') ?>" class="btn btn-primary">Limpar tudo</a>
        </div>
    </div>

    <hr>

    <div class="row m-5 justify-content-center">
        <div class="col">
            <?php if (count($movimentos) == 0) : ?>
                <p class="text-center">Não existe movimentos</p>
            <?php else : ?>
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Movimentos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movimentos as $p) : ?>
                            <tr>
                                <td><?= $p['data'] ?></td>
                                <td><?= $p['nome'] ?></td>
                                <td><?= $p['quantidade'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    </div>
</div>

<?php endif; ?>