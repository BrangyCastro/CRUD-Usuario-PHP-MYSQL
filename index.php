<?php include("db.php") ?>

<?php include("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); }?>

                <div class="card card-body">
                    <form action="save_user.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                        </div>
                        <div class="form-group">
                            <input type="date" name="fecha_nacimiento" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-success btn-block" name="save_user" value="GUARDAR USUARIO">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">F. Nacimiento</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM usuarios";
                            $result_users = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_users)) { ?>

                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['apellido']?></td>
                                <td><?php echo $row['direccion']?></td>
                                <td><?php echo $row['fecha_nacimiento']?></td>
                                <td>
                                    <a href="edit_user.php?id=<?php echo $row['id']?>" class="btn btn-warning">editar</a>
                                    <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">eliminar</a>

                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>

