<?php 
    include "./classes/Connection.php";
    include "./classes/Crud.php";
    include "./header.php";

    /**
     * modificar los libros de un autor
     */

    $crud = new Crud();
    $id = $_POST['id'];
    $type = $_POST['type'];
    $data = $crud -> getData($id, $type);
    $dataAutor = $crud -> getData($data -> idAutor, "autor");

    $idBook = $data -> _id;
?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Modificar libro del autor: <?php echo $dataAutor -> nombre .' '. $dataAutor -> apellido?></h2>
                    <form action="./process/updateData.php" method="post">
                        <input type="text" hidden value = "<?php echo $idBook?>" name="id">
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $data -> titulo;?>">
                        <label for="anio">Año de Publicación</label>
                        <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $data -> anio;?>">
                        <label for="genero">Género</label>
                        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $data -> genero;?>">
                        <label for="idioma">Idioma</label>
                        <input type="text" class="form-control" id="idioma" name="idioma" value="<?php echo $data -> idioma;?>">
                        <input type="text" class="form-control" hidden id="idAutor" name="idAutor" value="<?php echo $data -> idAutor;?>">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $data -> Descripcion;?>">
                        <button class="btn btn-warning mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </form>
                    <form action="./librosAutor.php" method="post" name="form2">
                        <input type="text" hidden value = "<?php echo $data -> idAutor?>" name="idAutor2">
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