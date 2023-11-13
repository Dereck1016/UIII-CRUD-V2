<?php
include("db.php");
$nombre = '';
$apellido= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_clientes WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $ciudad = $row['ciudad'];
    $estado = $row['estado'];
    $codigo_postal = $row['codigo_postal'];
    $correo_electronico = $row['correo_electronico'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $ciudad = $_POST['ciudad'];
  $estado = $_POST['estado'];
  $codigo_postal = $_POST['codigo_postal'];
  $correo_electronico = $_POST['correo_electronico'];

  $query = "UPDATE tbl_clientes set nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', ciudad = '$ciudad', estado = '$estado', codigo_postal = '$codigo_postal', correo_electronico = '$correo_electronico' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="apellido" class="form-control" cols="30" rows="10"><?php echo $apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="direccion" class="form-control" cols="30" rows="10"><?php echo $direccion;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="ciudad" class="form-control" cols="30" rows="10"><?php echo $ciudad;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="estado" class="form-control" cols="30" rows="10"><?php echo $estado;?></textarea>
        </div>
        <div class="form-group">
          <input name="codigo_postal" type="number" class="form-control" value="<?php echo $codigo_postal; ?>" placeholder="Update codigo_postal">
        </div>
        <div class="form-group">
          <input name="correo_electronico" type="email" class="form-control" value="<?php echo $correo_electronico; ?>" placeholder="Update correo_electronico">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>