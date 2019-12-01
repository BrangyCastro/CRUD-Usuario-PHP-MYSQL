<?php

    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'web_usuarios'
    ); 

    // if(isset($conn)) {
    //     echo 'Base de datos conectada';
    // }
?>