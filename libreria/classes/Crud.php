<?php
/**
 * Manejo de CRUD
 */
    class Crud extends Connection{
        /**
         * Obtener los datos a mostrar en las tablas por tipo de dato
         */
        public function dataShow($type){
            try {
                $connection = parent::connect();
                $collection = $connection -> $type;

                $data = $collection -> find();
                return $data;

            } catch (\Throwable $th) {
                return $th -> getMessage();
            }
        }

        /**
         * Listado de libros por autor
         */

        public function dataBookShow($type, $idAuthor){
            try {
                $connection = parent::connect();
                $collection = $connection -> $type;

                $data = $collection -> find(
                    array(
                        'idAutor' => $idAuthor
                    )
                );
                return $data;

            } catch (\Throwable $th) {
                return $th -> getMessage();
            }
        }

        /**
         * Obtener la informacion de un tipo de dato por id de tabla
         */
        public function getData($id, $type){
            try {
                $connection = parent::connect();
                $collection = $connection -> $type;

                $data = $collection -> findOne(
                    array(
                        '_id' => new MongoDB\BSON\ObjectId($id)
                    )
                );
                return $data;

            } catch (\Throwable $th) {
                return $th -> getMessage();
            }
        }

        /**
         * insertar datos en la base
         */
        public function insertData($data, $type){
            try {
                $connection = parent::connect();
                $collection = $connection -> $type;
                
                $result = $collection -> insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th -> getMessage();
            }
        }

        /**
         * eliminar datos de la base
         */
        public function deleteData($id, $type){
                try {
                    $connection = parent::connect();
                    $collection = $connection -> $type;
                    
                    $result = $collection -> deleteOne(
                        array('_id' => new MongoDB\BSON\ObjectId($id))
                    );
                    return $result;
                } catch (\Throwable $th) {
                    $th -> getMessage();
                }
        }

        /**
         * actualizar datos de la base
         */
        public function updateData($id, $type, $data){
            try {
                $connection = parent::connect();
                $collection = $connection -> $type;
                
                $result = $collection -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectId($id)],
                    ['$set'=> $data]
                );
                return $result;
            } catch (\Throwable $th) {
                $th -> getMessage();
            }
        }

        /**
         * mostrar popups interactivos de acuerdo al tipo de operacion realizada
         */
        public function showMessages($message){
            $msg = "";
            if($message=='insert'){
                $msg = 'swal("Listo!", "Agregado con éxito!", "success")';
            }else if($message=='update'){
                $msg = 'swal("Listo!", "Actualizado con éxito!", "info")';
            }else if($message=='delete'){
                $msg = 'swal("Listo!", "Eliminado con éxito!", "warning")';
            }else if($message=='error'){
                $msg = 'swal("Error!", "Debe eliminar primero todos los libros del autor", "error")';
            }
            return $msg;
        }
    }

?>