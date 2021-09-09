<?php
include ("../conexion/conexion.php");
$conn=conectar();
$v1 = $_POST['Codigo'];
$v2 = $_POST['Nombre'];
$v3 = $_POST['Cargo'];
$v4 = $_POST['Correo'];
$v5 = $_POST['Contrasena'];
$v6=addslashes(file_get_contents($_FILES['Foto']['tmp_name']));

$sql="UPDATE Administrador SET   Nombre='$v2', Cargo='$v3',Correo='$v4',Contrasena='$v5',Foto='$v6'  WHERE Codigo='$v1'";
$query=mysqli_query($conn,$sql);
if($query){
    echo "<script > alert('Datos de Usuario actualizado correctamente');window.location= '../Botones/ConsultaUsuarios.php' </script>";
}
?>