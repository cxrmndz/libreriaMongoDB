<?php 
    include "./classes/Connection.php";
    include "./classes/Crud.php";
    include "./header.php";

    /**
     * Modificacion de autores
     */

    $crud = new Crud();
    $id = $_POST['idAutor'];
    $type = $_POST['type'];
    $data = $crud -> getData($id, $type);
    $idAutor = $data -> _id;

?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Modificar Autor</h2>
                    <form action="./process/updateData.php" method="post">
                        <input type="text" hidden value = "<?php echo $idAutor?>" name="id">
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data -> nombre;?>">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $data -> apellido;?>">
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" 
                        value="<?php echo date('Y-m-d', strtotime($data -> fnacimiento))?>">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $data -> nacionalidad;?>">
                        <button class="btn btn-warning mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
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