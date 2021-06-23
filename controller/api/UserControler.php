<?php
include_once __DIR__.'/../../model/Muser.php';

    class UserControler{

        function seConnect($reference){

                $Muser = new Muser;
                $query = $Muser->seConnect($reference);

                echo json_encode($query);

        }

        function register(){

                header('Access-Control-Allow-Methods: POST');
    
                $requestBody=json_decode(file_get_contents('php://input'));
            
                $Muser = new Muser;
            
                $query = $Muser->register($requestBody->reference,$requestBody->nom,$requestBody->prenom,$requestBody->age,$requestBody->email,$requestBody->tel);

            }
        }

     
    

?>