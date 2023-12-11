<?php session_start();
    include "../classes/Connection.php";
    include "../classes/Crud.php";

    /**
     * Modificacion de datos de la base
     */

    $crud = new Crud();
    $type = $_POST['type'];
    $id = $_POST['id'];

    $data = array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "fnacimiento" => $_POST['fechaNacimiento'],
        "nacionalidad" => $_POST['nacionalidad']
    );

    $dataBook = array(
        "idAutor" => $_POST['idAutor'],
        "titulo" => $_POST['titulo'],
        "anio" => $_POST['anio'],
        "genero" => $_POST['genero'],
        "idioma" => $_POST['idioma'],
        "Descripcion" => $_POST['descripcion']
    );

    /**
     * Validacion del tipo de dato a modificar 
     */
    if($type == "autor"){
        $response = $crud -> updateData($id, $type, $data);;
        $returnLink="location:../index.php";
    }else if($type == "libro"){
        $response = $crud -> updateData($id, $type, $dataBook);;
        $_SESSION['idAutor']= $_POST['idAutor'];
        $returnLink="location:../librosAutor.php";
    }

    /**
     * Validacion de datos modificados 
     * o coincidencias de llaves sin modificacion
     */
    if($response -> getModifiedCount() >0 ||$response -> getMatchedCount() >0 ){
        $_SESSION['message']="update";
        header($returnLink);
    }else{
        print_r($response);
    }

?>
