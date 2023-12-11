<?php 
    include "./classes/Connection.php";
    include "./classes/Crud.php";
    include "./header.php";
    /**
     * Eliminacion de libros por autor
     */

    $crud = new Crud();
    $id = $_POST['id'];
    $type = $_POST['type'];
    $data = $crud -> getData($id, $type);
    $idAutor = $data -> idAutor;
    $dataAutor = $crud -> getData($idAutor, "autor");
?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Eliminar libro del autor: <?php echo $dataAutor -> nombre .' '. $dataAutor -> apellido?></h2>
                    <table class="table table-bordered">
                        <thead class = "table-danger text-center">
                            <th>Titulo</th>
                            <th>Año de Publicación</th>
                            <th>Género</th>
                            <th>Idioma</th>
                            <th>Descripción</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data -> titulo; ?></td>
                                <td><?php echo $data -> anio; ?></td>
                                <td><?php echo $data -> genero; ?></td>
                                <td><?php echo $data -> idioma; ?></td>
                                <td><?php echo $data -> Descripcion; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>Está seguro de eliminar este registro? Una vez eliminado no se podrá recuperar.</p>
                    </div>
                    <form action="./process/deleteData.php" method="post">
                        <input type="text" hidden value = "<?php echo $data -> _id?>" name="id">
                        <input type="text" hidden value = "<?php echo $data -> idAutor?>" name="idAutor">
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <button class="btn btn-danger mt-3">
                            <i class="fa-solid fa-trash-can"></i> Eliminar
                        </button>
                    </form>
                    <form action="./librosAutor.php" method="post" name="form2">
                        <input type="text" hidden value = "<?php echo $idAutor?>" name="idAutor2">
                        <button class="btn btn-outline-info mt-3" name = "return">
                            <i class="fa-solid fa-chevron-left"></i> Regresar
                        </button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>


<?php include "./scripts.php";?>