<?php
defined('BASEPATH') or exit('No direct script access allowed');
$quantidade = 0;
?>

<div class="container">
    <div class="row m-5 justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3>subtrair quantidaes</h3>
                </div>
                <div class="card-body">
                    <h4><?php echo $produto['nome'] ?></h4>
                    <p>Quantidade atual: <?php echo $produto['quantidade'] ?></p>
                    <form method="post" action="<?php echo site_url('Gestao/subtrair/'.$produto['id']) ?>">
                        <div class="form-group">
                            <input class="form-control" type="number" name="count_quantidade" id="count_quantidade">
                        </div>
                        
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