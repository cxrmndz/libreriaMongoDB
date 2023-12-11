<?php 
    include "./header.php";
    /**
     * Creacion de autores
     */

    $type = "autor";
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Agregar nuevo Autor</h2>
                    <form action="./process/insertData.php" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
                        <input type="text" hidden value = "<?php echo $type?>" name="type">
                        <a href="./index.php" class="btn btn-outline-info mt-3">
                        <i class="fa-solid fa-chevron-left"></i> Regresar
                        </a>
                        <button class="btn btn-primary mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>


<?php include "./scripts.php";?>