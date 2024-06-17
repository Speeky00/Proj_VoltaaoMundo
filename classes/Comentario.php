<?php
class Comentario{
    public $id;
    public $comentario;
    public $userid;
    public $status;

    public function __construct($id=false){
        if($id){
            $this->id=$id;
            $this->carregar();
        }
    }

    public function listar(){
        $sql="SELECT c.id, c.comentario, u.email as email, c.status FROM comentarios c JOIN usuarios u ON c.userid = u.id WHERE c.status=1";
        include "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarespera(){
        $sql="SELECT c.id, c.comentario, u.email as email, c.status FROM comentarios c JOIN usuarios u ON c.userid = u.id WHERE c.status=2";
        include "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarrejeitadas(){
        $sql="SELECT c.id, c.comentario, u.email as email, c.status FROM comentarios c JOIN usuarios u ON c.userid = u.id WHERE c.status=3";
        include "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar(){
        $sql="SELECT c.id, c.comentario, u.email as email, c.status FROM comentarios c JOIN usuarios u ON c.userid = u.id WHERE c.id = :id";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();

        $this->id = $linha['id'];
        $this->userid = $linha['userid'];
        $this->comentario = $linha['comentario'];
        $this->status = $linha['status'];
    }

    public function inserir(){
        $sql="INSERT INTO comentarios (comentario, userid, status) VALUES (:comentario, :userid, :status)";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':comentario', $this->comentario);
        $stmt->bindParam(':userid', $this->userid);
        $stmt->bindParam(':status', $this->status);
        $stmt->execute();
        echo "Registro gravado com sucesso!";
    }

    public function excluir(){
        $sql="DELETE FROM comentarios WHERE id = :id";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function atualizar(){
        $sql = "UPDATE comentarios SET status = :status WHERE id = :id";
        include "classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
}
?>
