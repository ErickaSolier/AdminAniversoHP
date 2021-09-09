function Bienvenido(){
    Swal.fire({
        title: '¿Esta seguro de cerrar sesion?',
        icon:'question',
        footer:'Esta es informacion importante!!',
        confirmButtonText: '<a  href="../login.php">SALIR</a> ',
        //cancelButtonText:'Cancelar',
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey:true,
        allowEnterKey:true,
        showCloseButton:true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',   
    });

}




