<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->
<?php include("../partes/conexion.php"); ?>
<?php
if ($_POST) {
    $nombreEmisor = $_SESSION['usuario'];
    $cargoDestinatario = $_POST['cargoDestinatario'];
    $nombreDestinatario = $_POST['nombreDestinatario'];
    $fecha = new DateTime();
    $mensaje = $_POST['mensaje'];
    $sql = "INSERT INTO `mensaje` (`id`, `emisor`, `destinatario`, `mensaje`,`fecha`,`tipo`) VALUES (4, '$nombreEmisor', '$nombreDestinatario', '$mensaje', '$fecha','reclamo');";
    $msjs = $conn->query($sql);
    header("location:h1.1.php");
}
if ($_GET) {
    $id =  $_GET['borrar'];
    // delete data ddbb
    $sql = "DELETE FROM `mensaje` WHERE `mensaje`.`id` =" . $id;
    $conn->query($sql);
    header("location:h1.1.php");
}
#consulta a la base de datos
$msjs = $conn->query("SELECT * FROM `MENSAJE`");
?>
<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sideBar -->
        <div class="w-100">
            <!-- Navbar -->
            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->
            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">
                <!-- section 1 -->
                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <!-- <h1 class="font-weight-bold mb-0">Bienvenido Juan</h1> -->
                                <h1 class="font-weight-bold mb-0">BANDEJA DE ENTRADA</h1>
                                <p class="lead text-muted">Revisa aquí</p>
                            </div>
                            <div class="col-lg-3 col-md-4 d-flex">
                                <button class="btn btn-primary w-100 align-self-center">Redactar</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted" aria-hidden="true">RECIBIDOS</h6>
                                            <h3 class="font-weight-bold"></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">ENVIADOS</h6>
                                            <h3 class="font-weight-bold"></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">BORRADORES</h6>
                                            <h3 class="font-weight-bold"></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">DESTACADOS</h6>
                                            <h3 class="font-weight-bold"></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-8">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">MENSAJE</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="h1.1.php" method="post" enctype="multipart/form-data">
                                            <label for="inputState">DESTINATARIO</label>
                                            <select id="inputState" class="form-control" name="cargoDestinatario">
                                                <option selected>Seleccione el cargo...</option>
                                                <option>Conserjería</option>
                                                <option>Administrador</option>
                                                <option>Vecino</option>
                                                <option>...</option>
                                            </select>
                                            <br>
                                            <input required placeholder="nombre del destinatario" class="form-control" type="text" name="nombreDestinatario" id="">
                                            <br>
                                            ASUNTO
                                            <br>
                                            <input required class="form-control" type="text" name="asunto" id="">
                                            <br>
                                            <textarea required placeholder="Escriba su mensaje" class="form-control" name="mensaje" id="" rows="3"></textarea>
                                            <br>
                                            <button class="btn btn-primary w-100 align-self-center" type="submit">ENVIAR</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-4 d-flex">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">MENSAJE</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12 my-3">
                                            <table class="table"  >
                                                <!-- <thead> -->
                                                    <tr class = "mx-auto">    
                                                        <th>EMISOR</th>
                                                        <th>DESTINATARIO</th>
                                                        <th>MENSAJE</th>
                                                        <th>FECHA</th>
                                                        <th>TIPO</th>
                                                        <th>ACCION</th>
                                                    </tr>
                                                <!-- </thead> -->
                                                <tbody>
                                                    <?php foreach ($msjs as $msj) { ?>
                                                        <tr>     
                                                            <td> <?php echo $msj['emisor']; ?> </td>
                                                            <td> <?php echo $msj['destinatario']; ?> </td>
                                                            <td> <?php echo $msj['mensaje']; ?> </td>
                                                            <td> <?php echo $msj['fecha']; ?> </td>
                                                            <td> <?php echo $msj['tipo']; ?> </td>
                                                            <td> <a class="btn btn-danger" href="?borrar=<?php echo $msj['id']; ?>">Eliminar</a> </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>