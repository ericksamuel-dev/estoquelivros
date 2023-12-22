<h1><a href="?controller=LivrosController&method=listar">Livros </a> | <a href="?controller=UsuarioController&method=listar">Usuarios </a></h1>
<div class="container">
    <form action="?controller=usuariocontroller&<?php echo isset($usuario->id) ? "method=atualizar&id={$usuario->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Usuario</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário:</label>
                <input type="text" class="form-control col-sm-8" name="login" id="login" value="<?php
                echo isset($usuario->login) ? $usuario->login : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha:</label>
                <input type="password" class="form-control col-sm-8" name="senha" id="senha" value="<?php
                echo isset($usuario->senha) ? $usuario->senha : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo de Acesso:</label>                
                <input type="text" class="form-control col-sm-8" name="tipo_de_acesso" id="tipo_de_acesso" value="<?php
                echo isset($usuario->tipo_de_acesso) ? $usuario->tipo_de_acesso : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($usuario->id) ? $usuario->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="?controller=UsuarioController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>