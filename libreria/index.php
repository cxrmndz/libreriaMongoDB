<?php session_start();
    require_once "./classes/Connection.php";
    require_once "./classes/Crud.php";

    /**
     * Pagina principal
     */
    
    $crud = new Crud();
    $type = "autor";
    $data = $crud -> dataShow($type);
    $message = "";
    if(isset($_SESSION['message'])){
        $message = $crud -> showMessages($_SESSION['message']);
        unset($_SESSION['message']);
    }
?>

<?php include "./header.php";?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Gestión de Autores</h2>
                    <a href="./agregarAutor.php" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i> Agregar autor
                    </a>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                        <thead class = "table-primary text-center">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Nacionalidad</th>
                            <th>Libros</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($data as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item -> nombre?></td>
                                <td><?php echo $item -> apellido?></td>
                                <td><?php echo $item -> fnacimiento?></td>
                                <td><?php echo $item -> nacionalidad?></td>
                                <td class="text-center">
                                    <form action="./librosAutor.php" method="post">
                                        <input type="text" hidden value = "<?php echo $item -> _id?>" name="idAutor">
                                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                                        <button class="btn btn-secondary">
                                            <i class="fa-solid fa-book-open"></i> Ver libros
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="./modificarAutor.php" method="post">
                                        <input type="text" hidden value = "<?php echo $item -> _id?>" name="idAutor">
                                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="./eliminarAutor.php" method="POST">
                                        <input type="text" hidden value = "<?php echo $item -> _id?>" name="id">
                                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>


<?php include "./scripts.php";?>
<script>
    let sms = <?php echo $message;?>;
    console.log(sms);
</script>