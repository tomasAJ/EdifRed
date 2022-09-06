<?php
include_once 'conexion.php';
//session_start();
$diario = $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Diario') or (tipo='Aviso') ");
$diarioaux = $conn->query("SELECT * FROM `MENSAJE` WHERE (tipo='Diario') or (tipo='Aviso') ");
?>

<div class="row">
    <div class="col-4">
        <div id="list-example" class="list-group"  >
            
            <!-- <a class="list-group-item list-group-item-action" href="#list-item-1">VENDO MI BICICLETA</a> -->
            <!-- <a class="list-group-item list-group-item-action" href="#list-item-2">ADOPTO PERRITO</a> -->
            <!-- <a class="list-group-item list-group-item-action" href="#list-item-3">SE BUSCA ASESORA DEL HOGAR</a> -->
            <!-- <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a> -->
            <?php
            $j=1;
            foreach ($diario as $aviso) {
                echo '<a class="list-group-item list-group-item-action" name="'.$aviso['tipo']."-".$aviso['mensaje'].'" onclick="aviso(name);" href="#list-item-' . $j . '">'. $aviso['tipo'] . '</a>';
                $j++;
            }
            ?>
        </div>

    </div>

    <div class="col-4">
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            <?php
            $i = 1;
             foreach ($diarioaux as $aviso) {
                echo '<h4 id="list-item-' . $i . ' name ="LOL">' . $aviso['tipo'] . '</h4>';
                echo '<p id= "parrafo-' . $i . ' name= ' . $aviso['mensaje'] . '">' . $aviso['mensaje'] . '</p>';
                $i++;
            }
            ?>

        </div>
    </div>
</div>