<?php include("../partes/head.php"); ?>


<?php include("db.php"); ?>

<?php
//print_r($_POST);

//Recepcion de datos del form
$txtid = (isset($_POST['txtid'])) ? $_POST['txtid'] : "";
$txtnombre = (isset($_POST['txtnombre'])) ? $_POST['txtnombre'] : "";
$txtmensaje = (isset($_POST['txtmensaje'])) ? $_POST['txtmensaje'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
//para comprobar si llega informacion
// echo $txtid."<br>";
//echo $txtnombre."<br>";
//echo $txtmensaje."<br>";
//echo $accion."<br>";

switch ($accion) {
    case "Enviar":
        //INSERT INTO `MENSAJE` (`id`, `emisor`, `destinatario`, `mensaje`, `fecha`, `tipo`) VALUES ('100', 'admin', 'vecino', 'debe realizar pago', '2022-05-12', '');
        // echo "presionando boton enviar";
        //prepara la consulta sql
        $sentenciaSQL = $conn->prepare("INSERT INTO MENSAJE (emisor, destinatario, mensaje, fecha, tipo) VALUES ( 'admin', :destinatario, :mensaje,'12-05-2022','');");
        $sentenciaSQL->bindParam(':destinatario', $txtnombre);
        $sentenciaSQL->bindParam(':mensaje', $txtmensaje);
        //ejecuta la consulta sql
        $sentenciaSQL->execute();
        break;
    case "Cancelar":
        echo "presionando boton cancelar";
        break;
    case "Seleccionar":
        //echo"presionando boton seleccionar";
        $sentenciaSQL = $conn->prepare("SELECT * FROM MENSAJE WHERE id=:id ");
        $sentenciaSQL->bindParam(':id', $txtid);
        $sentenciaSQL->execute();
        $mensajes = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtnombre = $mensajes['destinatario'];
        $txtmensaje = $mensajes['mensaje'];
        break;
    case "Borrar":
        //echo"presionando boton borrar";
        $sentenciaSQL = $conn->prepare("DELETE  FROM MENSAJE WHERE id=:id ");
        $sentenciaSQL->bindParam(':id', $txtid);
        $sentenciaSQL->execute();
        break;
    case "Modificar":
        //echo "modificar";
        $sentenciaSQL = $conn->prepare("UPDATE MENSAJE SET destinatario=:destinatario WHERE  id=:id ");
        $sentenciaSQL->bindParam(':id', $txtid);
        $sentenciaSQL->bindParam(':destinatario', $txtnombre);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conn->prepare("UPDATE MENSAJE SET mensaje=:mensaje WHERE  id=:id ");
        $sentenciaSQL->bindParam(':id', $txtid);
        $sentenciaSQL->bindParam(':mensaje', $txtmensaje);
        $sentenciaSQL->execute();
        break;
}
$sentenciaSQL = $conn->prepare("SELECT * FROM MENSAJE ");
$sentenciaSQL->execute();
$listamensajes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Aviso hacia vecino</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1 id="encabezadoadmin">SECCION AVISOS PARTICULAR O COMUNIDAD</h1>
    <div class="d-flex" id="content-wrappr">
        <?php include("../partes/sidebar.php"); ?>
        <div class="w-100">

            <?php include("../partes/nav.php"); ?>
            <div id="content" class="bg-grey w-300">
                <section>
                    <div class="col-md-12">
                        <p id=subtitulo>Formulario de envio de aviso</p>
                        <form id="formulario" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtid">ID</label>
                                <input type="text" required readonly class="form-control" name="txtid" id="txtid" value="<?php echo $txtid ?>" placeholder="ID:">
                            </div>

                            <div class="form-group">
                                <label for="txtnombre">Destinatario:</label>
                                <input type="text" class="form-control" name="txtnombre" id="txtnombre" value="<?php echo $txtnombre ?>" placeholder="nombre del vecino:">
                            </div>

                            <div class="form-group">
                                <label for="txtamensaje">Mensaje:</label>
                                <input type="text" class="form-control" name="txtmensaje" id="txtmensaje" value="<?php echo $txtmensaje ?>" placeholder="Escriba su mensaje:">
                            </div>

                            <div class="btn-group" role="group" aria-label="">
                                <button type="submit" name="accion" value="Enviar" class="btn btn-succes">Enviar</button>
                                <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                                <button type="submit" name="accion" value="Modificar" class="btn btn-info">Modificar</button>

                            </div>

                        </form>
                    </div>

                </section>

                <section>
                    <div>

                    </div>
                    <div class="col-md-12">
                        Tabla de mensajes
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Destinatario</th>
                                    <th>Mensaje</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listamensajes as $mensaje) {         ?>
                                    <tr>
                                        <td><?php echo $mensaje['id'] ?></td>
                                        <td><?php echo $mensaje['destinatario'] ?></td>
                                        <td><?php echo $mensaje['mensaje'] ?></td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="txtid" id="txtid" value="<?php echo $mensaje['id'] ?>" />
                                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                                            </form>



                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                </section>





            </div>
        </div>
    </div>


</body>

</html>