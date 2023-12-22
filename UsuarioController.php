<?php
class UsuarioController extends Controller
{

    public function listar()
    {
        $usuario = Usuario::all();
        return $this->view('usuarioGrade', ['usuario' => $usuario]);
    }

    public function criar()
    {
        return $this->view('usuarioForm');
    }

    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('usuarioForm', ['usuario' => $usuario]);
    }

    public function salvar()
    {
        $usuario           = new Usuario;
        $usuario->login     = $this->request->login;
        $usuario->senha = hash('sha256', $this->request->senha);
        $usuario->tipo_de_acesso    = $this->request->tipo_de_acesso;
        if ($usuario->save()) {
            return $this->listar();
        }
    }

    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $usuario           = Usuario::find($id);
        $usuario->login     = $this->request->login;
        $usuario->senha = hash('sha256', $this->request->senha);
        $usuario->tipo_de_acesso    = $this->request->tipo_de_acesso;
        $usuario->save();

        return $this->listar();
    }

    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::destroy($id);
        return $this->listar();
    }
}