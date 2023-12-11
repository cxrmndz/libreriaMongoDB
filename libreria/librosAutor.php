<?php session_start();
    require_once "./classes/Connection.php";
    require_once "./classes/Crud.php";

    /**
     * Listado de libros por autor
     */

    $crud = new Crud();
    $type = "libro";
    $idAutor = $_POST['idAutor'];

    if(isset($_SESSION['idAutor']) && !isset($_POST['idAutor'])){
        $idAutor = $_SESSION['idAutor'];
    }
    
    if(isset($_POST['idAutor2'])){
        $idAutor = $_POST['idAutor2'];
    }

    $data = $crud -> dataBookShow($type, $idAutor);
    $dataAutor = $crud -> getData($idAutor, "autor");
    
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
                    <h2>Gestión de libros del autor: <?php echo $dataAutor -> nombre .' '. $dataAutor -> apellido?></h2>

                    <form action="./agregarLibroAutor.php" method="post">
                        <input type="text" hidden value = "<?php echo $idAutor?>" name="idAutor">
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <button class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Agregar libro
                        </button>
                    </form>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                    <thead class = "table-primary text-center">
                            <th>Título</th>
                            <th>Año de Publicación</th>
                            <th>Género</th>
                            <th>Idioma</th>
                            <th>Descripción</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($data as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item -> titulo?></td>
                                <td><?php echo $item -> anio?></td>
                                <td><?php echo $item -> genero?></td>
                                <td><?php echo $item -> idioma?></td>
                                <td><?php echo $item -> Descripcion?></td>
                                <td class="text-center">
                                    <form action="./modificarLibroAutor.php" method="post">
                                        <input type="text" hidden value = "<?php echo $item -> _id?>" name="id">
                                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="./eliminarLibroAutor.php" method="POST">
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
                    <a href="./index.php" class="btn btn-outline-info mt-3">
                                <i class="fa-solid fa-chevron-left"></i> Regresar
                            </a>
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