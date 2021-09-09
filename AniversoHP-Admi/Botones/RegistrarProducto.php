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
$sql="SELECT * FROM Administrador WHERE Correo='$v1'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

$Categoria=mysqli_query($conn,"SELECT Nombre FROM Categoria");
    if(isset($_POST['Nombre']))
    {
        $Nombre=$_POST['Nombre'];
        echo $Nombre;
    }
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
            <li><a href="../Botones/ConsultaUsuarios.php">Usuarios</a></li>
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
    <div align="center"> 
      <div  class="col-md col-md-8 border  ">
        <div class="formtlo "><h1 class="row justify-content-center">AGREGAR PRODUCTOS</h1></div>
        <form action="../ConexionBotones/ConexionProducto.php" method="POST" enctype="multipart/form-data">
          <div align="center">  
            <div class="col-md col-md-8 my-4">
              <div class="form-floating ">
                <select id="Nombre"name="Nombre" class="form-select" aria-label="Default select example" id="floatingInputGrid" required="">
                <option selected >Seleccionar</option>
                  <?php 
                    while($datos = mysqli_fetch_array($Categoria))
                    {
                  ?>
                  <option value="<?php echo $datos['Nombre']?>"> <?php echo $datos['Nombre']?> </option>
                  <?php
                    }
                  ?> 
                </select>
              <label for="floatingInputGrid py-3">Categoria</label>
              </div>
              <br>
              <div class="form-floating">
              <div id="select2lista" name="Subcategoria"></div>
              <br>
              <div class="form-floating">
              <input type="Text" name="Producto" class="form-control" id="floatingInput"required="">
              <label for="floatingInput">Nombre</label>
              <br>
              <div class="form-floating ">
              <input type="Text" name="Variedad"class="form-control" id="floatingInput"required="">
              <label for="floatingInput">Variedad</label>
              <br>
              <div class="form-floating ">
              <input type="Text" name="Marca"class="form-control" id="floatingInput"required="">
              <label for="floatingInput">Marca</label>
              </div>
              <br>
              <div class="form-floating">
              <input type="Text" name="Formato"class="form-control" id="floatingInput"required="">
              <label for="floatingInput">Formato</label>
              </div>
              <br>
              <div class="form-floating ">
              <input type="Text" name="Precio"class="form-control" id="floatingInput"required="">
              <label for="floatingInput">S/. Precio</label>
              </div>
              <br>
              <div class="form-floating">
              <input  type="file" name="Imagen" class="form-control" id="floatingInput" required="">
              <label for="floatingInput" class="form-label py 3">Imagen de Producto</label>
              </div>  
              <div class="col-12 my-4" >
                <button type="reset" class="btn btn-outline-danger btn-lg">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary btn-lg">Registrar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div> 
  </div> 
  <script type="text/javascript">
	$(document).ready(function(){
		recargarLista();

		$('#Nombre').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"../ConexionBotones/datos.php",
			data:"Nombre=" + $('#Nombre').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>
  </body>


</html>
