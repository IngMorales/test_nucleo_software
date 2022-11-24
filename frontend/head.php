<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cursos</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <script src="plugins/fullcalendar/locales-all.js"></script>
    <script src="plugins/fullcalendar/locales/es.js"></script>


    <!--Icon-->
    <link rel="icon" type="image/png" sizes="32x32" href="dist/img/logo.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        .enviar {
            background: #d25959;
            box-shadow: none;
            color: white;
            margin-bottom: 0;
            width: 100px
        }

        .enviar:hover {
            text-decoration: underline
        }

        .confirmacion {
            background: #C6FFD5;
            border: 1px solid green;
        }

        .negacion {
            background: #ffcccc;
            border: 1px solid red
        }

        #viewPassword {
            cursor: pointer;
        }
    </style>

    <script>
        $(document).ready(function() {
            //variables
            var pass1 = $('[name=clave2]');
            var pass2 = $('[name=clave3]');
            var confirmacion = "Las contraseñas si coinciden";
            var longitud = "La contraseña debe estar formada entre 8-12 carácteres (ambos inclusive)";
            var negacion = "No coinciden las contraseñas";
            var vacio = "La contraseña no puede estar vacía";
            //oculto por defecto el elemento span
            var span = $('<div class="alert alert-danger" role="alert"></div>').insertAfter(pass2);
            span.hide();
            //función que comprueba las dos contraseñas
            function coincidePassword() {
                var valor1 = pass1.val();
                var valor2 = pass2.val();
                //muestro el span
                span.show().removeClass();
                //condiciones dentro de la función
                if (valor1 != valor2) {
                    span.text(negacion).addClass('negacion');
                }
                if (valor1.length == 0 || valor1 == "") {
                    span.text(vacio).addClass('negacion');
                }
                if (valor1.length < 6 || valor1.length > 10) {
                    span.text(longitud).addClass('negacion');
                }
                if (valor1.length != 0 && valor1 == valor2) {
                    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                }
            }
            //ejecuto la función al soltar la tecla
            pass2.keyup(function() {
                coincidePassword();
            });
        });
    </script>
</head>