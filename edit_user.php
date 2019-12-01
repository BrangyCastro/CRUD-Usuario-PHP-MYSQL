<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $direccion = $row['direccion'];
            $fecha_nacimiento = $row['fecha_nacimiento'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $query = "UPDATE usuarios set
            nombre = '$nombre', 
            apellido = '$apellido', 
            direccion = '$direccion', 
            fecha_nacimiento = '$fecha_nacimiento'
            WHERE id = $id ";

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Usuario actualizado';
        $_SESSION['message_type'] = 'warning';

        header('Location: index.php');
        
      }

?>

<?php include('includes/header.php'); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Apellido">
                </div>
                <div class="form-group">
                    <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Direccion">
                </div>
                <div class="form-group">
                    <input name="fecha_nacimiento" type="date" class="form-control" value="<?php echo $fecha_nacimiento; ?>" placeholder="Nombre">
                </div>
                <button class="btn btn-success btn-block" name="update">Actualizar</button>
            </form>
            </div>
            </div>
        </div>
    </div>


<?php include('includes/footer.php'); ?>