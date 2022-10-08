<?php
defined('BASEPATH') or exit('No direct script access allowed');
$quantidade = 0;
?>

<div class="container">
    <div class="row m-5 justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3>Novo produto</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('gestao/novosalvar') ?>">
                        <h4><?php echo $produto['nome'] ?></h4>
                        <label for="">Deseja eliminar?</label>
                        <hr>
                        <div class="text-start">
                            <a href="<?php echo site_url('Gestao/home') ?>" class="btn btn-primary">Cancelar</a>
                            <a href="<?php echo site_url('Gestao/eliminar/'.$produto['id'].'/true') ?>" class="btn btn-primary">Eliminar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>