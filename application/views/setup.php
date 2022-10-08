<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row m-5 justify-content-center">
        <div class="col-6">
            <div class="card p-4 text-center">
                <h3>SETUP</h3>
                <div class="text-center m-2">
                    <a href="<?php echo site_url('Inicio/resetdb') ?>" class="btn btn-primary">Reiniciar</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?php echo site_url('Inicio/addusuarios') ?>" class="btn btn-primary">Adicionar usuarios</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?php echo site_url('Inicio/addprodutos') ?>" class="btn btn-primary">Adicionar produtos</a>
                </div>


                <div class="text-center m-2">
                    <a href="<?php echo site_url('Inicio') ?>" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>