<?php
include_once '../conexion.php';

if ( $_POST['tipocargo'] ) {
    $variable = $_POST['tipocargo'];
    
    // <option>Conserje</option>
    // <option>Administrador</option>
    // <option>Vecino</option>

    //$CONSERJE = $conn->query("SELECT `rut` FROM ADMINISTRATIVO WHERE `conserje` = 'si'");                                                                
    //$ADMIN =  $conn->query("SELECT `rut` FROM ADMINISTRATIVO WHERE `administrador` = 'si'");
    //$VECINO = $conn->query("SELECT `rut`,`nombre`,`apellido` FROM `VECINO`");
    
    switch ($variable) {
        case 'Conserje':
            
            # code...
            $CONSERJE = $conn->query("SELECT `rut`,`nombre`,`apellido` FROM ADMINISTRATIVO WHERE `conserje` = 'si'");
                echo '<option selected>Seleccione el nombre del destinatario...</option>';
            foreach ($CONSERJE as $c) {
                echo '<option>' . $c['nombre'] . '</option>';
            }

            break;
        case 'Administrador':
            # code...
            $ADMIN =  $conn->query("SELECT `rut`,`nombre`,`apellido` FROM ADMINISTRATIVO WHERE `administrador` = 'si'");
            echo '<option selected>Seleccione el nombre del destinatario...</option>';
            foreach ($ADMIN as $co) {
                echo '<option>' . $co['nombre'] . '</option>';
            }
            break;
        case 'Vecino':
            # code...
            $VECINO = $conn->query("SELECT `rut`,`nombre`,`apellido` FROM `VECINO`");
            echo '<option selected>Seleccione el nombre del destinatario...</option>';
            foreach ($VECINO as $v) {
                echo '<option>' . $v['nombre'] . '</option>';
            }
            break;

        default:
            # code...
            
            break;
    }
}


?>
