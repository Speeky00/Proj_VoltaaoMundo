<?php

class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($id=false){
        if($id){
            $this->id=$id;
            $this->carregar();
        }
    }

    public function listar(){
        $sql="SELECT * FROM usuarios";
        include "classes/conexao.php";
        $resultado=$conexao->query($sql);
        $lista=$resultado->fetchAll();
        return $lista;
    }

    public function carregar(){
        $sql="SELECT * FROM WHERE id=".$this->id;
        include "classes/conexao.php";
        $resultado=$conexao->query($sql);
        $linha=$resultado->fetch();

        $this->id=$linha['id'];
        $this->nome=$linha['nome'];
        $this->email=$linha['email'];
        $this->senha=$linha['senha'];
    }

    public function inserir(){
        $sql="INSERT INTO usuarios(nome,email,senha)VALUES(
            '{$this->nome}',
            '{$this->email}',
            '{$this->senha}'
        )";
        include "Classes/conexao.php";
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
    }
}
?>