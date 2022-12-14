<!-- head -->
<?php include('head.php') ?>
<!-- fin head -->

<?php include("../../partes/conexion.php"); ?>

<?php

#consulta a la base de datos
$usuario = $_SESSION['usuario'];
$mensajes = $conn->query("SELECT * FROM `MENSAJE` WHERE (emisor='$usuario' OR destinatario='$usuario') ");

$vecinos = $conn->query("SELECT `rut`,`nombre` FROM `VECINO` UNION SELECT `rut`, `nombre` FROM `ADMINISTRATIVO`");

if ($_POST) {

    $cargoDestinatario = $_POST['cargoDestinatario'] . "";

    $nombreDestinatario = $_POST['nombreDestinatario'] . "";

    $rutEmisor = $_SESSION['usuario'] . "";

    foreach ($vecinos as $vecino) {

        if ($vecino['nombre'] == $nombreDestinatario) {
            $rutDestinatario = $vecino['rut'];
        }
    }

    $mensaje = $_POST['mensaje'];
    $fechaActual = new DateTime();

    $fecha = $fechaActual->format('Y-m-d') . "";

    $tipo = $_POST['tipo'];
    if($tipo=='Seleccione tipo de mensaje'){
        $tipo=" ";
    }
    

    $sql = "INSERT INTO `MENSAJE` (`id`, `emisor`, `destinatario`, `mensaje`,`fecha`,`tipo`) VALUES (NULL,'$rutEmisor','$rutDestinatario','$mensaje',  '$fecha' , '$tipo')";

    $insert = $conn->query($sql);

    header("location:redactar.php");
}

if ($_GET) {

    $id =  $_GET['borrar'];

    // delete data ddbb
    $sql = "DELETE FROM `MENSAJE` WHERE `MENSAJE`.`id` =" . $id;
    $conn->query($sql);

    header("location:redactar.php");
}

?>

<body>

    <div class="d-flex" id="content-wrapper">

        <!-- sideBar -->
        <?php include('sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            <?php include('nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <!-- section 1 -->
                <?php include('../bandeja.php') ?>

                <section class="bg-light py-3">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-4 col-md-4">

                                <div class="card rounded-0">

                                    <div class="card-header bg-light">

                                        <h6 class="font-weight-bold mb-0">
                                            MENSAJE
                                        </h6>

                                    </div>

                                    <div class="card-body">

                                        <form action="redactar.php" method="post" enctype="multipart/form-data">

                                            <label for="inputState1">
                                                DESTINATARIO
                                            </label>

                                            <select required id="inputState1" class="form-control" name="cargoDestinatario" onchange="getSelectValue(this.value);">

                                                <option selected>Seleccione el cargo del destinatario...</option>
                                                <option>Conserje</option>
                                                <option>Administrador</option>
                                                <option>Vecino</option>
                                                <option>...</option>

                                            </select>

                                            <br>

                                            <select required id="inpu" class="form-control" name="nombreDestinatario">

                                                <option selected>Seleccione el nombre del destinatario...</option>

                                            </select>
                                            <br>
                                            ASUNTO
                                            <br>
                                            <select required id="tipodeAsunto" class="form-control" name="tipo">

                                                <option> </option>

                                            </select>

                                            <br>
                                            MENSAJE
                                            <br>

                                            <input required onkeypress="return ((event.charCode >=32 && event.charCode <= 34) ||(event.charCode >=39 && event.charCode <= 41)||(event.charCode ==44 )||(event.charCode==6)||(event.charCode >=48 && event.charCode <=58)||(event.charCode >= 63 && event.charCode <= 90)||(event.charCode >= 97 && event.charCode <= 122))"
                                            oninput="useRegex();" placeholder="Escriba su mensaje" class="form-control" type="text" name="mensaje" id="input-text">

                                            <br>

                                            <button class="btn btn-primary w-100 align-self-center" type="submit">ENVIAR</button>

                                        </form>

                                    </div>

                                </div>
                                <br>
                            </div>
                            <br>
                            <br>

                            <div class="col-lg-12 col-md-12">

                                <div class="card rounded-0">

                                    <div class="card-header bg-light">

                                        <h6 class="font-weight-bold mb-0">MENSAJES</h6>

                                    </div>

                                    <div class="card-body d-flex">

                                        <div class="col-lg-12 my-3">

                                            <div class="table-responsive">

                                                <table class="table">
                                                    <thead>
                                                        <tr class="mx-auto">
                                                            <th>EMISOR</th>
                                                            <th>DESTINATARIO</th>
                                                            <th>MENSAJE</th>
                                                            <th>FECHA</th>
                                                            <th>TIPO</th>
                                                            <th>ACCI??N</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $listaVecinos = $vecinos->fetchAll();
                                                        foreach ($mensajes as $msj) {
                                                            foreach ($listaVecinos as $vecino) {
                                                                if ($vecino['rut'] == $msj['emisor']) {
                                                                    $EMISOR = $vecino['nombre'];
                                                                }
                                                                if ($vecino['rut'] == $msj['destinatario']) {
                                                                    $DESTINATARIO = $vecino['nombre'];
                                                                }
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $EMISOR; ?></td>
                                                                <td><?php echo $DESTINATARIO; ?></td>

                                                                <td>
                                                                    <?php echo     ucfirst($msj['mensaje']); ?></td>

                                                                <td>
                                                                    <?php
                                                                    $fecha_mensaje = new DateTime($msj['fecha']);
                                                                    echo $fecha_mensaje->format('d-m-Y');
                                                                    ?>
                                                                </td>

                                                                <td><?php echo ucfirst($msj['tipo']); ?></td>
                                                                <td> <a class="btn btn-danger" href="?borrar= <?php echo $msj['id']; ?> "> Eliminar </a> </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>

                                            </div>

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

    <script type="text/javascript">
        function getSelectValue(value) {

            $('#inpu').html('');

            var xhttp = new XMLHttpRequest();

            xhttp.open('POST', 'ajax.php', true);

            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                document.getElementById('inpu').innerHTML = xhttp.responseText;
            }

            xhttp.send('tipocargo=' + value);
            
            if(value == 'Administrador'){
                document.getElementById('tipodeAsunto').innerHTML = 
                '<option selected>Seleccione tipo de mensaje</option>' +
                '<option >Venta</option>'+
                '<option >Arriendo</option>'+
                '<option >Aviso</option>'+
                '<option >Comunicado</option>'+
                '<option >Citaci??n</option>'+
                '<option >Gastos comunes</option>'+
                '<option >Importante</option>'+
                '<option >Publicidad</option>'+
                '<option >Corte de agua</option>'+
                '<option >Reclamo</option>';
            }          
            else{
                if(value == 'Vecino'){
                    document.getElementById('tipodeAsunto').innerHTML = 
                    '<option selected>Seleccione tipo de mensaje</option>'+  
                    '<option >Reclamo</option>'+
                    '<option >Aviso</option>';
                }
            }
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

</body>

</html>