<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
 
    <div class="container">
        <h1>Lista de funcionarios</h1>
        <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a>
       
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Cargo</th>
              <th>Setor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT
            funcionarios.funcionarioID AS FuncionarioID,
            funcionarios.Nome AS funcionario_nome,
            cargos.Nome AS cargo_nome,
            setor.Nome AS setor_nome
             FROM
            funcionarios
             INNER JOIN
             setor ON funcionarios.SetorID = setor.SetorID
             INNER JOIN
             cargos ON funcionarios.CargoID = cargos.CargoID";
 
            $resultado = mysqli_query($conexao, $sql);
 
            while($row = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
              <td><?php echo $row['FuncionarioID'] ?></td>
              <td><?php echo $row['funcionario_nome'] ?></td>
              <td><?php echo $row['cargo_nome'] ?></td>
              <td><?php echo $row['setor_nome'] ?></td>
              <td>
                <a href="salvar-funcionarios.php?id=" class="btn btn-edit">Editar</a>
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