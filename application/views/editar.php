<?php
defined('BASEPATH') or exit('No direct script access allowed');
$quantidade = 0;
?>

<div class="container">
    <div class="row m-5 justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3>Editar: <?php echo $produto['nome'] ?></h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('gestao/editarsalvar/' . $produto['id']) ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $produto['nome'] ?>">
                        </div>


                        <?php if (isset($mensagem)) : ?>
                            <div class="alert alert-danger text-center">
                                <?php echo $mensagem; ?>
                            </div>
                        <?php endif; ?>
                        
                        <hr>
                        <div class="text-start">
                            <input class="btn btn-primary" type="submit" value="Salvar">
                            <a href="<?php echo site_url('Gestao/home') ?>" class="btn btn-primary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>