<?php

    class Database{

        public static function connect(){
            return new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,DBUSER,DBPASS);
        }
    }

?>