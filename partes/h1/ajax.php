<?php
include_once '../conexion.php';

session_start();

if ( $_POST['tipocargo'] ) {

    $variable = $_POST['tipocargo'];
     
    switch ($variable) {
        case 'Conserje':

            $conserjes = $conn->query("SELECT `rut`,`nombre`,`apellido` FROM ADMINISTRATIVO WHERE `conserje` = 'si'");

            echo '<option selected> Seleccione el nombre del destinatario... </option>';

            foreach ($conserjes as $conserje) {
                echo '<option>' . $conserje['nombre'] . '</option>';
                // echo '<option>' . $conserje['nombre'] . ' ' . $conserje['apellido'] . '</option>';                
            }
            break;
        case 'Administrador':

            $administradores =  $conn->query("SELECT `rut`,`nombre`,`apellido` FROM ADMINISTRATIVO WHERE `administrador` = 'si'");

            echo '<option selected> Seleccione el nombre del destinatario... </option>';

            foreach ($administradores as $administrador) {
                echo '<option>' . $administrador['nombre']  . '</option>';
                // echo '<option>' . $administrador['nombre'] . ' '. $administrador['apellido'] . '</option>';
            }
            break;
        case 'Vecino':

            $vecinos = $conn->query("SELECT `rut`,`nombre`,`apellido` FROM `VECINO`");

            echo '<option selected> Seleccione el nombre del destinatario... </option>';

            foreach ($vecinos as $vecino) {
                if($_SESSION['usuario'] != $vecino['rut'] ) {
                    echo '<option>' . $vecino['nombre']  . '</option>';
                    // echo '<option>' . $vecino['nombre'] . ' ' . $vecino['apellido'] . '</option>';
                }   
            }
            break;
        default:
            break;
    }

}

?>