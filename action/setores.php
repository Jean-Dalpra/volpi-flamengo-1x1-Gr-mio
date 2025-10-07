<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_GET['acao'];
$id = $_GET['id']; 

switch ($acao) {
    case 'excluir':
        $sql = 'DELETE FROM setor WHERE SetorID =' .$id;
        mysqli_query($conexao, $sql);
        header("Location: ../lista-setores.php");
        break;
    }

?>
