<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
 
    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a>
       
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descricao</th>
              <th>Ação</th>
           
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT
            categorias.CategoriaID AS CategoriaID,
            categorias.Nome AS categoria_nome,
            categorias.Descricao AS descricao
             FROM
            categorias";
            $resultado = mysqli_query($conexao, $sql);
 
            while($row = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
              <td><?php echo $row['CategoriaID'] ?></td>
              <td><?php echo $row['categoria_nome'] ?></td>
              <td><?php echo $row['descricao'] ?></td>
 
              <td>
                <a href="salvar-categorias.php?id=" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </main>
 
  <?php
  // include dos arquivox
  include_once './include/footer.php';
  ?>