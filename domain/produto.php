<?php

class Produto{

public $idproduto;
public $nomeproduto;
public $descricao;
public $preco;
public $idfoto;


public function __construct($db){
    $this->conexao = $db;
}

public function listar(){
    $query = "select * from produto";

    $stmt = $this->conexao->prepare($query);

    $stmt->execute();

    return $stmt;
}



public function cadastro(){
    $query = "insert into produto set nomeproduto=:np, descricao=:d, preco=:p, idfoto=:if";

    $stmt = $this->conexao->prepare($query);

    /*Vamos vincular os dados que veem do app ou navegador com os campos de
    banco de dados
    */
    $stmt->bindParam(":np",$this->nomeproduto);
    $stmt->bindParam(":d",$this->descricao);
    $stmt->bindParam(":p",$this->preco);
    $stmt->bindParam(":if",$this->idfoto);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

}
}

?>