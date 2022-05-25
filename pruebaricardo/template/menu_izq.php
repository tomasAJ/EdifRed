 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- LINK PARA CONECTARSE A LAS OTRAS PAGINAS DEL MENU PRINCIPAL-->
    <?php $url="http://".$_SERVER['HTTP_HOST'].""?>
<!-- Sidebar -->
<div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">MENÚ PRINCIPAL</h4>
            </div>
            <div class="menu">
                <a href="../inicio" class="d-block text-light p-3 border-0"><i class="fas fa-tachometer-alt"></i>
                    INICIO</a>
                <!--SECCION DIARIO MURAL-->
                <a href="../diario mural" class="d-block text-light p-3 border-0"><i class="fas fa-users"></i>
                    DIARIO MURAL</a>
                <!--SECCION RECLAMOSL-->
                <a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>
                    CONSERJERIA</a>
                <!--SECCION AVISOS-->
                <a href="<?php echo $url;?>/HU1_R_VALENZUELA/administrador.php" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>
                AVISOS</a>
                
                
                <a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-chart-line"></i>
                    ESTADÍSTICAS</a>

                <a href="../perfil/" class="d-block text-light p-3 border-0"><i class="fas fa-user"></i>
                    PERFIL</a>

                <a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-sliders-h"></i>
                    CONFIGURACIÓN</a>
            </div>
        </div>
        <!-- Fin sidebar -->