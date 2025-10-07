<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
$sql = 'SELECT p.ProdutoID, p.Nome, p.Preco AS Preco, c.Nome AS Categoria
        FROM produtos p
        INNER JOIN categorias c ON p.CategoriaID = c.CategoriaID';
$resultado = mysqli_query($conexao, $sql);
?>
 
<main>
 
  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
           <?php
            $sql = "SELECT CargoID, Nome, TetoSalarial FROM cargos;";
            $resultado = mysqli_query($conexao, $sql);
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
           
            echo "<tr>";
              echo "<td>" . $row["CargoID"] . "</td>";
              echo "<td>" . $row["Nome"] ."</td>";
              echo "<td>" . $row["TetoSalarial"] ."</td>";
              echo "<td>
                <a href='salvar-produtos.php?id=". $row["ProdutoID"] . "' class='btn btn-edit'>Editar</a>
                <a href='./action/produtos.php?id=" . $row["ProdutoID"] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
              </td>";
            echo "</tr>";
            }
            ?>
        </tbody>
      </table>
    </div>
 
<?php
  // include dos arquivox
  include_once './include/footer.php';
  ?>
 