<h1><a href="?controller=LivrosController&method=listar">Livros </a> | <a href="?controller=UsuarioController&method=listar">Usuarios </a></h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th><a href="?controller=LivrosController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $login_cookie = $_COOKIE['usuario'];
                if(isset($login_cookie)){
                    echo"Bem-Vindo, $login_cookie <br>";
                    
                    if ($Livros){
                        foreach ($Livros as $Livros) {
                            ?>
                            <tr>
                                <td><?php echo $Livros->titulo; ?></td>
                                <td><?php echo $Livros->autor; ?></td>
                                <td><?php echo $Livros->editora; ?></td>
                                <td>
                                    <a href="?controller=LivrosController&method=editar&id=<?php echo $Livros->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="?controller=LivrosController&method=excluir&id=<?php echo $Livros->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">Nenhum registro encontrado</td>
                        </tr>
                        <?php
                    }
                    
                }else{
                    echo"Bem-Vindo, convidado <br>";
                    echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
                    echo"<br><a href='index2.php'>Faça Login</a> Para ler o conteúdo";
                }

            
            ?>
        </tbody>
    </table>
</div>