<?php

namespace Repository;

use Model\Produto;
use PDO;

class ProdutoRepository
{
    private PDO $pdo;
    
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function allProdutos(): array
    {
        $sql = 'SELECT * FROM produtos ORDER BY preco';
        $statement = $this->pdo->query($sql);
        $produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($produto){
            return $this->formarObjeto($produto);
        },  $produtos);
    }

    public function allCafes(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($cafe){
            return $this->formarObjeto($cafe);
        }, $produtosCafe);
    }

    public function allAlmocos(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço'";
        $statement2 = $this->pdo->query($sql2);

        $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($almoco){
            return $this->formarObjeto($almoco);
        }, $produtosAlmoco);
    }

    public function buscar(int $id)
    {
        $sql = 'SELECT * FROM produtos WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }
    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4,$produto->getPreco());
        $statement->bindValue(5, $produto->getImagem());
        $statement->execute();
    }

    public function alteraDadosProduto(Produto $produto)
    {
        $sql = "UPDATE produtos SET `tipo` = :tipo,
                    `nome` = :nome,
                    `descricao` = :descricao,
                    `preco` = :preco
                    WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":tipo", $produto->getTipo());
        $statement->bindValue(":nome", $produto->getNome());
        $statement->bindValue(":descricao", $produto->getDescricao());
        $statement->bindValue(":preco", $produto->getPreco());
        $statement->bindValue(":id", $produto->getId());
        $statement->execute();

        if($produto->getImagem() !== 'logo-serenatto.png'){

            $this->atualizarFoto($produto);
        } else {
            $produto->setImagem('logo-serenatto.png');
        }
    }

    public function deletarProduto(int $id)
    {
        $sql = 'DELETE FROM produtos WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem']
            );
    }
    public function atualizar(Produto $produto)
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4,$produto->getPreco());
        $statement->bindValue(5, $produto->getId());
        $statement->execute();

        if($produto->getImagem() !== 'logo-serenatto.png'){

            $this->atualizarFoto($produto);
        } else {
            $produto->setImagem('logo-serenatto.png');
        }
    }

    private function atualizarFoto(Produto $produto)
    {
        $sql = "UPDATE produtos SET imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getImagem());
        $statement->bindValue(2, $produto->getId());
        $statement->execute();
    }

}