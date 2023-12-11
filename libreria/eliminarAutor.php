<?php 
    include "./classes/Connection.php";
    include "./classes/Crud.php";
    include "./header.php";
    /**
     * Eliminacion de autores
     */

    $crud = new Crud();
    $id = $_POST['id'];
    $type = $_POST['type'];
    $data = $crud -> getData($id, $type);
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Eliminar Autor</h2>
                    <table class="table table-bordered">
                    <thead class = "table-danger text-center">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Nacionalidad</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data -> nombre; ?></td>
                                <td><?php echo $data -> apellido; ?></td>
                                <td><?php echo $data -> fnacimiento; ?></td>
                                <td><?php echo $data -> nacionalidad; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>Está seguro de eliminar este registro? Una vez eliminado no se podrá recuperar.</p>
                    </div>
                    <form action="./process/deleteData.php" method="post">
                        <input type="text" hidden value = "<?php echo $data -> _id?>" name="id">
                        <input type="text" hidden value = "<?php echo $type?>" name="type">

                        <button class="btn btn-danger mt-3">
                            <i class="fa-solid fa-trash-can"></i> Eliminar
                        </button>
                    </form>
                    <form action="./index.php" method="post" name="form2">
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