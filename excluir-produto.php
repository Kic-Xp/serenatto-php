<?php

use Repository\ProdutoRepository;

require_once "src/conexao-bd.php";
require_once "src/Model/Produto.php";
require "src/Repository/ProdutoRepository.php";

$produtoRepository = new ProdutoRepository($pdo);
$produtoRepository->deletarProduto($_POST["id"]);

header("Location: admin.php");
