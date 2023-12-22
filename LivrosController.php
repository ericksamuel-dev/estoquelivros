<?php
class LivrosController extends Controller{

    public function listar(){
        $Livros = Livros::all();
        return $this->view('grade',['Livros' => $Livros]);
    }

    public function criar(){
        return $this->view('form');
    }

    public function excluir($dados){
        $id = (int) $dados['id'];
        $Livros = Livros::destroy($id);
        return $this->listar();
    }

    public function editar($dados){
        $id = (int) $dados['id'];
        $Livros = Livros::find($id);

        return $this->view('form', ['Livros' => $Livros]);
    }

    public function salvar(){
        $Livros = new Livros;
        $Livros->titulo = $this->request->titulo;
        $Livros->autor = $this->request->autor;
        $Livros->editora = $this->request->editora;
        if($Livros->save()){
            return $this->listar();
        }
    }

    public function atualizar($dados){
        $id = (int) $dados['id'];
        $Livros = Livros::find($id);
        $Livros->titulo = $this->request->titulo;
        $Livros->autor = $this->request->autor;
        $Livros->editora = $this->request->editora;
        $Livros->save();

        return $this->listar();
    }
}
?>
