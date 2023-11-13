<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="2" class="form-control" placeholder="apellido"></textarea>
          </div>
          <div class="form-group">
            <textarea name="direccion" rows="2" class="form-control" placeholder="direccion"></textarea>
          </div>
          <div class="form-group">
            <textarea name="ciudad" rows="2" class="form-control" placeholder="ciudad"></textarea>
          </div>
          <div class="form-group">
            <textarea name="estado" rows="2" class="form-control" placeholder="estado"></textarea>
          </div>
          <div class="form-group">
          <input name="codigo_postal" type="number" class="form-control"  placeholder=" codigo_postal">
        </div>
        <div class="form-group">
          <input name="correo_electronico" type="email" class="form-control" placeholder="correo_electronico">
        </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nombre</th>
            <th>apellido</th>
            <th>direccion</th>
            <th>ciudad</th>
            <th>estado</th>
            <th>codigo postal</th>
            <th>correo electronico</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_clientes";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['codigo_postal']; ?></td>
            <td><?php echo $row['correo_electronico']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>