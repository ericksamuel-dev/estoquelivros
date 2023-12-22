<h1><a href="?controller=LivrosController&method=listar">Livros </a> | <a href="?controller=UsuarioController&method=listar">Usuarios </a></h1>
<div class="container">
    <form action="?controller=Livroscontroller&<?php echo isset($Livros->id) ? "method=atualizar&id={$Livros->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Livros</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Título:</label>
                <input type="text" class="form-control col-sm-8" name="titulo" id="titulo" value="<?php
                echo isset($Livros->titulo) ? $Livros->titulo : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Autor:</label>
                <input type="text" class="form-control col-sm-8" name="autor" id="autor" value="<?php
                echo isset($Livros->autor) ? $Livros->autor : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Editora:</label>
                <input type="text" class="form-control col-sm-8" name="editora" id="editora" value="<?php
                echo isset($Livros->editora) ? $Livros->editora : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($Livros->id) ? $Livros->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="?controller=LivrosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>