<?php
//conexion a la Base de datos (Servidor,usuario,password)
include ("../conexion/conexion.php");
$conn=conectar();
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
	$v1 = $_POST['Nombre'];
	$v2 = $_POST['Subcategoria'];
	$v3 = $_POST['Producto'];
    $v4 = $_POST['Variedad'];
	$v5 = $_POST['Marca'];
    $v6 = $_POST['Formato'];
    $v7 = $_POST['Precio'];
    $v8=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
    
    //campos no llenos al registrarse	 
    if($v1=="" or $v2=="" or $v3=="" or $v5=="" or $v6=="" or $v7==""or $v8==""  )	{
        echo "<script> alert('Error de Registro porfavor rellene todos los campos');window.location= '../Botones/RegistrarProducto.php' </script>";	
    }else{

        $sql = "INSERT INTO Producto (Categoria,Subcategoria,Producto,Variedad,Marca,Formato,Precio,Imagen,Stock) VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', '$v8','0') ";
        if(mysqli_query($conn,$sql))
			{
                echo "<script>alert ('Ok, datos ingresados');window.location= '../Botones/RegistrarProducto.php'</script>";
			}
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
//Mensaje de conformidad   
?>