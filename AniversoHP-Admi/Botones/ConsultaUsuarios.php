<?php
session_start();
$v1=$_SESSION['Correo'];
$v2=$_SESSION['Contrasena'];
if(!isset($v1)){
  echo "<script>alert ('Inicie sesion para loguearse');window.location= '../login.html'</script>";
}
//conexion a la Base de datos (Servidor,usuario,password)
include ("../conexion/conexion.php");
$conn=conectar();
$sql1="SELECT * FROM Administrador WHERE Correo='$v1'";
$query=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($query);

$sql="SELECT * FROM Administrador";
$result = mysqli_query($conn, $sql);

//cuantos reultados hay en la busqueda
$num_resultados = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../estilos/menu.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../script/icons.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../script/sweetAlert.js"></script>
    <title>Menu</title>
  </head>

  <body> 
  <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="">
      <h3 id="logo">Menu</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
          <a class="nav-link" id="link" onclick="Bienvenido()">
          <span class="fas fa-sign-out-alt"></span>
          Cerrar Sesion<span class="sr-only">(current) </span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="wrapper fixed-left">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Bienvenido</h3>
        <div align="center">
          <img class="foto"src="data:image/jpg;base64,<?php echo base64_encode($row['Foto']);?>"  class="img-fluid" alt="">
        </div>
        <h5><?php echo $row['Nombre']?> 
        </h5>
        <div>
        <div align="center">
        <a href="../Botones/Micuenta.php?Codigo=<?php echo $row['Codigo'] ?> "class="btn btn-outline-dark">Mi cuenta</a>
        </div>
        </div>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="../menu/menu.php"><span class="fas fa-home"></span>Home</a>
        </li>
        <li>
          <a href="CrearUsuario.php"><span class="fas fa-user-cog"></span>Crear Usuario</a>
        </li>
        <li class="submenu">
          <a ><span class="fas fa-clipboard"></span>Registrar<span class="caret"></span></a>
          <ul class="children">
            <li><a href="RegistrarCategoria.php"> Categoria</a></li>
            <li><a href="RegistrarSubcategoria.php"> Subcategoria</a></li>
            <li><a href="RegistrarProducto.php"> Producto</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a ><span class="fas fa-hands-helping"></span>Consultas<span class="caret"></span></a>
          <ul class="children">
            <li><a href="../Botones/ConsultaStock.php">Stock</a></li>
            <li><a href="../Botones/ConsultaUsuarios.php">Usuario</a></li>
          </ul>
        </li> 
        <li>
 
        </li>
          <div align="center">
            <img class="logo-menu"src="../imagenes/logo.menu.JPG" class="img-fluid" alt="">
          </div> 
        </li>
      </ul>
    </nav> 
    <div id="content" >
        <div class="container mt-5"> 
            <table class="table table-bordered " >
                <thead class="table-success table-striped" >
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Correo</th>
                        <th>Contrasena</th>
                        <th>Foto</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    echo "<p>Número de usuarios encontrados: ".$num_resultados."</p>";
                    for ($i=0; $i <$num_resultados; $i++) {
                        $row = mysqli_fetch_array($result); 
                    ?>
                        <tr>
                        <th><?php  echo $row['Codigo']?></th>
                        <th><?php  echo $row['Nombre']?></th>
                        <th><?php  echo $row['Cargo']?></th>
                        <th><?php  echo $row['Correo']?></th>   
                        <th><?php  echo $row['Contrasena']?></th> 
                        <th><img src="data:image/jpg;base64,<?php echo base64_encode($row['Foto']);?>" style="height:70px;width:70px";/></th>    
                        <th><a href="../ConexionBotones/ActualizarUsuario.php?Codigo=<?php echo $row['Codigo'] ?> "class="btn btn-info">&#x270D;Editar</a></th>
                        <th><a href="../ConexionBotones/EliminarUsuario.php?Codigo=<?php echo $row['Codigo'] ?> "class="btn btn-danger">&#10060;Eliminar</a></th>                                       
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
   
    

