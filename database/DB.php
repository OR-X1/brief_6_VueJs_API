<?php
    class DB{

        static public function connect(){
            $db = new PDO("mysql:host=localhost;dbname=brief6_VueJs_API","root","");
            $db->exec("set names utf8");
           
            return $db;
        }
    }

?>