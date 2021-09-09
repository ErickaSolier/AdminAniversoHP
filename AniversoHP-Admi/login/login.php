
<?php
include ("../conexion/conexion.php");
$conn=conectar();
session_start(); 
    //capturando datos
  	$v1 = $_POST['Correo'];
	$v2 = $_POST['Contrasena'];
	//$sql="SELECT *  FROM Usuario";
    //$sql.=" WHERE DNI='".$v1."' AND Contrasena='".$v2."' AND Rol='".$v3."'";
	$sql="SELECT * FROM Administrador WHERE Correo ='$v1' and Contrasena = '$v2'";
	$queryusuario = mysqli_query($conn,$sql);
	$nr = mysqli_num_rows($queryusuario);  

if ($nr==1)  
	{ 
  $_SESSION['Correo']=$v1;
  $_SESSION['Contrasena']=$v2;
	echo "<script > alert('Bienvenido usuario');window.location= '../menu/menu.php' </script>";
}			
else
	{
	echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../login.html' </script>";
	}

?>
