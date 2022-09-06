<!-- head -->
<?php include('head.php') ?>
<!-- fin head -->

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

                <section class="bg-light py-3">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-9 col-md-8">

                                <h1 class="font-weight-bold mb-0">
                                    Diario Mural
                                </h1>

                                <p class="lead text-muted">
                                    Revisa la última información
                                </p>

                            </div>

                            <div class="col-lg-3 col-md-4 d-flex"></div>

                        </div>

                        <div class="row">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../inicio/">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Diario Mural</li>
                                </ol>
                            </nav>

                        </div>

                    </div>

                </section>

                <section  class="bg-light py-3">

                    <div class="container">

                        <div class="bd-example">
                            <?php include('sqldiariomural.php'); ?>
                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>




    <script type="text/javascript">
       function aviso(value) {
            
            
            
            var variable = value.split('-');
            Swal.fire({
                //position: 'top-end',
                //icon: 'success',
                text: variable[5],
                showConfirmButton: false,
                //timer: 3000,
                title: variable[1],
                footer:variable[4] + '- ' + variable[3] + ' - ' +variable[2] 
            })
            
            
        }
    </script>

   
    <!-- CDN SWEETALERT2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous">
    </script>

</body>

</html>