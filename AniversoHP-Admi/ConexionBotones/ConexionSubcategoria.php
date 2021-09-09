<?php
include ("../conexion/conexion.php");
$conn=conectar();

	$v1 = $_POST['Nombre'];
    $v2 = $_POST['NSubcategoria'];
    //campos no llenos al registrarse	 
    if($v1=="" or $v2=="" ){
        echo "<script> alert('Error de Registro porfavor rellene todos los campos');window.location= '../Botones/RegistrarSubcategoria.php' </script>";	
    }else{

        $sql = "INSERT INTO Subcategoria (NombreCategoria,Subcategoria) VALUES ('$v1','$v2')";
        if(mysqli_query($conn,$sql))
			{
                echo "<script>alert ('Ok, datos ingresados');window.location= '../Botones/RegistrarSubcategoria.php'</script>";
			}
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
//Mensaje de conformidad   
?>