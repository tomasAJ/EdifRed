<?php 
include("../conexion.php"); 
if ($_POST['rut']) {
    $rut_seleccionado = $_POST['rut'];
    
    $lista_usuarios=$conn->prepare(" SELECT rut,nombre FROM VECINO ");
    $lista_usuarios->execute();
    $usuarios = $lista_usuarios->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        if(  $usuario['rut'] == $rut_seleccionado ) {
            echo '<option selected>' . $usuario['nombre'] . '</option>';
            
        }
            echo '<option>' . $usuario['nombre'] . '</option>';        
    }
}       
?>