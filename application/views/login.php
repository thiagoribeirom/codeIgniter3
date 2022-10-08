<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
    <div class="row m-5 justify-content-center">
        <div class="col-6">
            <div class="card p-4 text-start">
                <form action="<?php echo site_url('Inicio/verificarlogin');?>" method="post">
                    <div class="mb-3">
                        <label for="user" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Logar</button>
                </form>
            </div>
        </div>
    </div>
</div>