<?php
include ("../conexion/conexion.php");
$conn=conectar();
$v1 = $_POST['Codigo'];
$v2 = $_POST['Nombre'];
$v3 = $_POST['Subcategoria'];
$v4 = $_POST['Producto'];
$v5 = $_POST['Variedad'];
$v6 = $_POST['Marca'];
$v7 = $_POST['Formato'];
$v8 = $_POST['Precio'];
$v9=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$sql="UPDATE Producto SET   Categoria='$v2', Subcategoria='$v3',Producto='$v4',Variedad='$v5',Marca='$v6',Formato='$v7',Precio='$v8',Imagen='$v9'  WHERE Codigo='$v1'";
$query=mysqli_query($conn,$sql);
if($query){
    echo "<script > alert('Datos de Usuario actualizado correctamente');window.location= '../Botones/ConsultaStock.php' </script>";
}
?>