<?php
include_once __DIR__.'/../database/DB.php';

    class Muser{

        function seConnect($reference){

                $sql = "select * from user where reference = '$reference'";
                $query = DB::connect()->query($sql);
//                $query->fetch(PDO::FETCH_ASSOC);
                return $query->rowCount();

//                return $query;
                
            }

            function register($reference,$nom,$prenom,$age,$email,$tel){

                $sql="INSERT INTO `user`(`reference`, `nom`, `prenom`, `age`, `email`, `tel`) VALUES ('$reference','$nom','$prenom','$age','$email','$tel')";

                $query=DB::connect()->query($sql);

            }
            

        }
    
?>