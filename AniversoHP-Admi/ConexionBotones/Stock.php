<?php
//conexion a la Base de datos (Servidor,usuario,password)
include ("../conexion/conexion.php");
$conn=conectar();
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
	$v1 = $_POST['Codigo'];
    $v2 = $_POST['Actual'];
	$v3 = $_POST['Stock'];
    
    //campos no llenos al registrarse	 
    if($v1=="")	{
        echo "<script> alert('Error de Registro porfavor rellene todos los campos');window.location= '../Botones/ConsultaStock.php' </script>";	
    }else{

        $var=  $v2+ $v3;
        $sql = "UPDATE Producto SET Stock=$var  where CodigoProducto = '$v1'";

        if(mysqli_query($conn,$sql))

			{
                echo "<script>alert ('Ok, datos ingresados');window.location= '../Botones/ConsultaStock.php'</script>";
			}
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
//Mensaje de conformidad   
?>