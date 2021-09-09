<?php
function conectar(){
    $user="admin";
    $pass="975334045";
    $server="database-vet.cjs8imr27frn.us-east-2.rds.amazonaws.com";
    $db="aniversohp";
    $conn=new mysqli($server,$user,$pass,$db);
    if($conn->connect_error){
        die("Error de conexion: " . mysqli_connect_error());
    }else{
        return $conn;
    }
}
?>