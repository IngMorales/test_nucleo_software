<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert2.min.css">
    <title>Nucleo Sistema de Alertas</title>
</head>

<body>

    <?php
    $mensaje = htmlentities($_GET['msj']);
    $c = htmlentities($_GET['c']);
    $p = htmlentities($_GET['p']);
    $t = htmlentities($_GET['t']);
    @$idestudiante = htmlentities($_GET['id']);


    switch ($c) {
        case 'stack1':
            @$carpeta = '';
            break;
        case 'stack2':
            @$carpeta = '../';
            break;
    }

    switch ($p) {
        case 'inactivo':
            $pagina = 'index';
            break;
        case 'sin_acceso':
            $pagina = 'index';
            break;
        case 'crear_estudiante':
            $pagina = 'crear-estudiante';
            break;
        case 'actualizar_estado':
            $pagina = 'gestionar-estudiante';
            break;
        case 'asignar_curso':
            $pagina = 'asignar-curso';
            break;
        case 'crear_curso':
            $pagina = 'crear-curso';
            break;
        case 'eliminar_curso':
            $pagina = 'gestionar-curso';
            break;

        case 'editar_datos':
            $pagina = 'editar-datos?id=' . $idestudiante;
            break;
        case 'administrar_curso':
            $pagina = 'administrar-estudiante?id=' . $idestudiante;
            break;

    }

    $dir = @$carpeta . @$pagina;

    if ($t == "error") {
        $titulo = "Lo Sentimos ...";
    } else if ($t == "success") {
        $titulo = "Correcto ...";
    } else if ($t == "warning") {
        $titulo = "Advertencia ...";
    }
    ?>

    <script>
        Swal.fire({
            icon: '<?php echo $t ?>',
            title: '<?php echo $titulo ?>',
            text: '<?php echo $mensaje ?>',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            html: '<?php echo $mensaje ?>'
        }).then(function() {
            location.href = '<?php echo $dir ?>';
        })

        $(document).click(function() {
            location.href = '<?php echo $dir ?>';
        });

        $(document).keyup(function(e) {
            if (e.which == 27) {
                location.href = '<?php echo $dir ?>';
            }
        });
    </script>

</body>

</html>