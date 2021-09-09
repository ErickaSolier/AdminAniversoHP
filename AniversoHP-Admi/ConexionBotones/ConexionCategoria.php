<?php
include ("../conexion/conexion.php");
$conn=conectar();

	$v1 = $_POST['Nombre'];

    //campos no llenos al registrarse	 
    if($v1=="" ){
        echo "<script> alert('Error de Registro porfavor rellene todos los campos');window.location= '../Botones/RegistrarCategoria.php' </script>";	
    }else{

        $sql = "INSERT INTO Categoria (Nombre) VALUES ('$v1') ";
        if(mysqli_query($conn,$sql))
			{
                echo "<script>alert ('Ok, datos ingresados');window.location= '../Botones/RegistrarCategoria.php'</script>";
			}
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
//Mensaje de conformidad   
?>