<?php include("../partes/conexion.php");
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "112223333") && ($_POST['contrasenia'] == "112223333")) {
        $_SESSION['usuario'] = "112223333";
        $_SESSION['nombreusuario']= 'Tomas Contador';
        header('Location: ../inicio');
    } elseif (($_POST['usuario'] == "112223334") && ($_POST['contrasenia'] == "112223334")) {
        $_SESSION['usuario'] = "112223334";
        $_SESSION['nombreusuario']= 'Javier Contador';
        header('Location: ../inicio');
    } else {
        echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- CON ESTOS SCRIPTS PUEDES USAR LAS ALERTAS de SWEETALERT Y ALERFITY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario:<input class="form-control" type="text" name="usuario" id="">
                            <br>
                            Contraseña:<input class="form-control" type="password" name="contrasenia" id="">
                            <br>
                            <button class="btn btn-primary w-100 align-self-center " type="submit">Entrar al portafolio</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted"></div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>