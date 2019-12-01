<?php

    include("db.php");

    if(isset($_POST['save_user'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $query = "INSERT INTO usuarios (nombre,apellido,direccion,fecha_nacimiento) VALUES ('$nombre','$apellido','$direccion','$fecha_nacimiento')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Consulta fallida");
        }

        $_SESSION['message'] = 'Usuario guardado';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");

    }


?>