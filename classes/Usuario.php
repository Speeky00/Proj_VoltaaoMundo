<?php

class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipo;

    public function __construct($id=false){
        if($id){
            $this->id=$id;
            $this->carregar();
        }
    }

    public function listar(){
        $sql="SELECT u.id,u.nome,u.email,u.senha,t.tipo FROM usuarios u JOIN TIPO t WHERE u.tipo=t.id";
        include "classes/conexao.php";
        $resultado=$conexao->query($sql);
        $lista=$resultado->fetchAll();
        return $lista;
    }

    public function carregar(){
        $sql="SELECT * FROM usuarios WHERE id=".$this->id;
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

    public function atualizar(){
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo = :tipo WHERE id = :id";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
    public function excluir(){
        $sql="DELETE FROM usuarios WHERE id = :id";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
}
?>