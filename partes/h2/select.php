<?php include("../conexion.php"); ?>
<?php 

if (isset($_POST)){

    
$usuarios=$conn->prepare(" SELECT rut,nombre FROM VECINO ");
$usuarios->execute();
$lista = $usuarios->fetchAll(PDO::FETCH_ASSOC);

}

?>