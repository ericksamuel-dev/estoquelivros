<?php
class Livros
{
    private $atributos;

    public function __construct()
    {

    }

    public function __set(string $atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get(string $atributo)
    {
        return $this->atributos[$atributo];
    }

    public function __isset(string $atributo)
    {
        return isset($this->atributos[$atributo]);
    }

    private function escapar($dados)
    {
        if (is_string($dados) & !empty($dados))
            return "'" . addslashes($dados) . "'";
            elseif(is_bool($dados))
                return $dados ? 'TRUE' : 'FALSE';
            elseif($dados !== '')
                return $dados;
            else
                return 'NULL';
    }

    private function preparar($dados)
    {
        $resultado = array();
        foreach ($dados as $k => $v) {
            if (is_scalar($v)) {
                $resultado[$k] = $this->escapar($v);
            }
        }
        return $resultado;
    }

    public function save(){
        $colunas = $this->preparar($this->atributos);
        if(!isset($this->id)){
             $query = "INSERT INTO Livros (".
             implode(', ', array_keys($colunas)) .") VALUES (".
             implode(', ', array_values($colunas)) .");";
        }
        else{
            foreach($colunas as $key => $value) {
                if($key !== 'id')
                $definir[] = "{$key}={$value}";
            }
            $query = "UPDATE Livros SET ".
            implode(', ', $definir) ." WHERE id='$this->id';";
        }
        if($conexao = Conexao::getInstance()){
            $stmt = $conexao->prepare($query);
            if($stmt->execute()){
                return $stmt->rowCount();
            }
        }
        return false;
    }

    public static function count(){
        $conexao = Conexao::getInstance();
        $count = $conexao->exec("SELECT count(*) FROM Livros;");
        if($count){
            return (int)$count;
        }
        return false;
    }


    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM Livros;");
        $result = array();
        if($stmt->execute()){
            while($rs = $stmt->fetchObject(Livros::class)){
                $result[] = $rs;
            }
        }
        if(count($result) > 0){
            return $result;
        }
        return false;
    }

    public static function destroy($id){
        $conexao = Conexao::getInstance();
        if($conexao->exec("DELETE FROM Livros WHERE id='{$id}';")){
            return true;
        }
        return false;
    }

    public static function find($id){
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM Livros WHERE id='{$id}';");
        if($stmt->execute()){
            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchObject('Livros');
                if($resultado)
                    return $resultado;
            }
        } 
        return false;
    }
    
}
?>