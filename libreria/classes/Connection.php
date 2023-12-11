<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/libreria/vendor/autoload.php";

    /**
     * Conexion a la base de datos MongoDB
    */
    class Connection{
        /**
         * metodo que realiza la conexion a la base de datos
         * $ejm cadena de conexion: mongodb://admin:1234abcd@localhost:27017/libreria
         */
        public function connect(){
            try {
                $server = "localhost";
                $user = "admin";
                $pswd = "1234abcd";
                $dbname = "libreria";
                $port = "27017";

                $connectionString = "mongodb://" .
                    $user . ":" .
                    $pswd . "@" . 
                    $server . ":" . 
                    $port . "/" . 
                    $dbname;

                $client = new MongoDB\Client($connectionString);
                
                return $client-> selectDatabase($dbname);

            } catch (\Throwable $th) {
                return $th -> getMessage();
            }
        }
    }    

?>