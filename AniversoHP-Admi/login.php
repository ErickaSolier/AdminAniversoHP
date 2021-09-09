
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos/login.css"/>
    <title>Login AniversoHP</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./imagenes/Logo.JPG" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">Iniciar Sesion</h1>
            <form method="post" action="./login/login.php" class="was-validated">
              <div class="form-row"> 
                <div class=" custom-control col-lg-7">
                  <input type="email" name="Correo" id="Correo"class="form-control is-invalid my-3 p-4 " placeholder="Email-Address" required="">
                </div> 
              </div> 
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" name="Contrasena" id="Contrasena" class="form-control is-invalid my-3 p-4" placeholder="Contraseña" required="">
                </div> 
              </div>
              <div class="ub1">
                <input type="checkbox" onclick="verpassword()" >Mostrar contraseña
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="Submit" class="btn1 mt-3 mb-5">Ingresar</button>
                </div> 
              </div>
          </form>
          </div>
        </div>
      </div>
    </section>  
  </body>
  <script>
    function verpassword(){
        var tipo = document.getElementById("Contrasena");
        if(tipo.type == "password")
        {
            tipo.type = "text";
        }
        else
        {
            tipo.type = "password";
        }
    }
  </script>    
</html>