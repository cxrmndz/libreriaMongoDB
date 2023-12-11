<?php 
    include "./classes/Connection.php";
    include "./classes/Crud.php";
    include "./header.php";

    /**
     * Creacion de libors por autor
     */

    $type = "libro";
    $idAutor = $_POST['idAutor'];
    $crud = new Crud();
    $dataAutor = $crud -> getData($idAutor, "autor");
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Agregar nuevo libro al autor: <?php echo $dataAutor -> nombre .' '. $dataAutor -> apellido?></h2>
                    <form action="./process/insertData.php" method="post">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                        <label for="anio">Año de Publicación</label>
                        <input type="text" class="form-control" id="anio" name="anio" required>
                        <label for="genero">Género</label>
                        <input type="text" class="form-control" id="genero" name="genero" required>
                        <label for="idioma">Idioma</label>
                        <input type="text" class="form-control" id="idioma" name="idioma" required>
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <input type="text" hidden value = "<?php echo $idAutor?>" name="idAutor">
                        <button class="btn btn-primary mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
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