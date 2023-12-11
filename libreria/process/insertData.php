<?php session_start();
    include "../classes/Connection.php";
    include "../classes/Crud.php";

    /**
     * Insercion de datos en la base
     */
    $crud = new Crud();
    $type = $_POST['type'];
    $returnLink = "";

    /**
     * arreglo para insercion de autores
     */
    $data = array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "fnacimiento" => $_POST['fechaNacimiento'],
        "nacionalidad" => $_POST['nacionalidad']
    );

    /**
     * arreglo para insercion de libros
     */
    $dataBook = array(
        "idAutor" => $_POST['idAutor'],
        "titulo" => $_POST['titulo'],
        "anio" => $_POST['anio'],
        "genero" => $_POST['genero'],
        "idioma" => $_POST['idioma'],
        "Descripcion" => $_POST['descripcion']
    );

    /**
     * validacion del tipo de dato a insertar
     */
    if($type == "autor"){
        $response = $crud -> insertData($data, $type);
        $returnLink="location:../index.php";
    }else if($type == "libro"){
        $response = $crud -> insertData($dataBook, $type);
        $_SESSION['idAutor']= $_POST['idAutor'];
        $returnLink="location:../librosAutor.php";
    }

    /**
     * Validacion de datos insertados
     */

    if($response -> getInsertedId() >0){
        $_SESSION['message']="insert";
        header($returnLink);
    }else{
        print_r($response);
    }

?>
