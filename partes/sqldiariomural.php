<?php
include_once 'conexion.php';
//session_start();
$diario =  $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");
$diarioaux = $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");

$venta = $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");
$aviso =  $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");
$arriendo =  $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");
$diario =  $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Arriendo')or(tipo='Venta')or(tipo='Diario') or (tipo='Aviso') ");
$vecinos = $conn->query("SELECT * FROM `VECINO`");
$vecinosaux = $conn->query("SELECT * FROM `VECINO`");
?>

<div class="row">
    <div class="col-4">
        <div id="list-example" class="list-group"  >
            
            <?php
            $j=1;
            $nombre;
            foreach ($arriendo as $publicacion) {
                if($publicacion['tipo'] == "Arriendo"){
                    foreach($vecinos as $v){
                        if($v['rut'] == $publicacion['emisor']){
                            $nombre= $v['nombre'].' '. $v['apellido'];
                            break;
                        }
                    }
                    echo '<a class="list-group-item list-group-item-action" name="'.$publicacion['tipo'].'-'.$publicacion['mensaje'].'-'.$publicacion['fecha'].'-'.$nombre.' " onclick="aviso(name);" >'. $publicacion['tipo'] . '</a>';
                    $j++;
                    
                }
            }
           
            foreach ($venta as $publicacion) {
                if($publicacion['tipo'] == "Venta"){
                    echo '<a class="list-group-item list-group-item-action" name="'.$publicacion['tipo']."-".$publicacion['mensaje'].'-'.$publicacion['fecha'].'-'.$nombre.'" onclick="aviso(name);" >'. $publicacion['tipo'] . '</a>';
                    $j++;            
                }
                
            }
            foreach ($aviso as $publicacion) {
                if($publicacion['tipo'] == "Aviso"){
                    echo '<a class="list-group-item list-group-item-action" name="'.$publicacion['tipo']."-".$publicacion['mensaje'].'-'.$publicacion['fecha'].'-'.$nombre.'" onclick="aviso(name);" >'. $publicacion['tipo'] . '</a>';
                    $j++;              
                }
                
            }
            foreach ($venta as $publicacion) {
                if($publicacion['tipo'] == "Diario"){
                    echo '<a class="list-group-item list-group-item-action" name="Diario Mural-'.$aviso['mensaje'].'-'.$publicacion['fecha'].'-'.$nombre.'" onclick="aviso(name);" >'. $aviso['tipo'] . '</a>';
                    $j++;             
                }
                
            }
            
            ?>
        </div>

    </div>

    <div class="col-6">
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            <?php
            $i = 1;
            $nombreVecino;
            foreach ($diarioaux as $di) {
                foreach($vecinosaux as $ve){
                    if($ve['rut'] == $di['emisor']){
                        $nombreVecino= $ve['nombre'].' '. $ve['apellido'];
                        break;
                    }
                }
                echo '<h4 id="list-item-' . $i . '">' . $di['tipo'] . '</h4>';
                echo '<p>' . $di['mensaje'] .' -'.$nombreVecino . '</p>';
                $i++;
            }
            ?>

        </div>
    </div>
</div>