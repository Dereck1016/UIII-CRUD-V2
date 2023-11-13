<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $ciudad = $_POST['ciudad'];
  $estado = $_POST['estado'];
  $codigo_postal = $_POST['codigo_postal'];
  $correo_electronico = $_POST['correo_electronico'];
  $query = "INSERT INTO tbl_clientes(nombre, apellido,direccion,ciudad,estado,codigo_postal,correo_electronico) VALUES ('$nombre', '$apellido', '$direccion', '$ciudad', '$estado', '$codigo_postal', '$correo_electronico')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>