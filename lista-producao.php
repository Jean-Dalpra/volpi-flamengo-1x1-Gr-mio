<?php
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
$sql = 'SELECT pr.ProducaoID, p.Nome AS Produto, c.Nome AS Cliente, pr.DataProducao
        FROM producao pr
        INNER JOIN produtos p ON pr.ProdutoID = p.ProdutoID
        INNER JOIN clientes c ON pr.ClienteID = c.ClienteID';
$resultado = mysqli_query($conexao, $sql);
?>
 
<main>
  <div class="container">
      <h1>Lista de Produções</h1>
      <a href="./salvar-producao.php" class="btn btn-add">Incluir</a>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Cliente</th>
            <th>Data Produção</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>
                  <td>'.$row['ProducaoID'].'</td>
                  <td>'.$row['Produto'].'</td>
                  <td>'.$row['Cliente'].'</td>
                  <td>'.$row['DataProducao'].'</td>
                  <td>
                    <a href="salvar-producao.php?id='.$row['ProducaoID'].'" class="btn btn-edit">Editar</a>
                    <a href="./action/producao.php?acao=excluir&id='.$row['ProducaoID'].'" class="btn btn-delete">Excluir</a>
                  </td>
                </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
</main>
 
<?php
// include dos arquivos
include_once './include/footer.php';
?>
 
 