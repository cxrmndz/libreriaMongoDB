<?php session_start();
    include "../classes/Connection.php";
    include "../classes/Crud.php";

    /**
     * Manejo de insercion de datos en la base
     */

    $crud = new Crud();

    $id =  $_POST['id'];
    $type =  $_POST['type'];
    $size = -1;

    /**
     * validacion de dependencias de libros de autores,
     * si tiene libros no se puede eliminar el autor
     */
    if($type == "autor"){
        $data1 = $crud -> dataBookShow("libro", $id);
        $size = count($data1->toArray());
    
        if($size==0)
        {
            $response = $crud -> deleteData($id, $type);
        }else{
            $_SESSION['id']= $_POST['id'];
        }

        $returnLink="location:../index.php";

    /**
     * eliminacion directa de libros
     */
    }else if($type == "libro"){
        $response = $crud -> deleteData($id, $type);
        $_SESSION['idAutor']= $_POST['idAutor'];
        $returnLink="location:../librosAutor.php";
    }

    /**
     * Validacion de datos eliminados
     */
    if($size<=0){
        if($response -> getDeletedCount() >0){
            $_SESSION['message']="delete";
            header($returnLink);
        }else{
            print_r($response);
        }
    } else{

        echo $size;
        $_SESSION['message']="error";
        header($returnLink);
    }

?>
