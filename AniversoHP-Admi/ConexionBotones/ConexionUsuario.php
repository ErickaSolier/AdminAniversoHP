
<?php
//conexion a la Base de datos (Servidor,usuario,password)
include ("../conexion/conexion.php");
$conn=conectar();
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
	$v1 = $_POST['Nombre'];
	$v2 = $_POST['Cargo'];
	$v3 = $_POST['Correo'];
	$v4 = $_POST['Contrasena'];
    $v5=addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
    
    //campos no llenos al registrarse	 
    if($v1=="" or $v2=="" or $v3=="" or $v4=="" or $v5=="" )	{
        echo "<script> alert('Error de Registro porfavor rellene todos los campos');window.location= '../Botones/CrearUsuario.php' </script>";	
    }else{

        $sql = "INSERT INTO Administrador (Nombre,Cargo,Correo,Contrasena,Foto) VALUES ('$v1', '$v2', '$v3', '$v4', '$v5') ";
        if(mysqli_query($conn,$sql))
			{
                echo "<script>alert ('Ok, datos ingresados');window.location= '../Botones/CrearUsuario.php'</script>";
			}
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
//Mensaje de conformidad   
?>