<?php 
   require_once __DIR__.'/../models/Rendezvous.php';

   class Rendezvousctlr {


// create table rendez-vous :
function create(){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   $requestBody=json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $rendezvous->createR($requestBody->DateConsult,$requestBody->TypeConsult,$requestBody->Horaire,$requestBody->Reference);

}


//affichage table des rendez-vous :
function read(){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   $rendezvous=new Rendezvous();
   $result=$rendezvous->readRendezvous();
   echo json_encode($result);
 
}


//affichage single rendez-vous :
function readSingle($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   $rendezvous=new Rendezvous();
   $result=$rendezvous->readSingleR($Id);
   echo json_encode($result); 
}


//affichage rendez-vous avec reference :
function readRefe(){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   $rendezvous=new Rendezvous();
   $result=$rendezvous->readReference();
   echo json_encode($result);
}


//delete  un rendez-vous avec id : 
function delete($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: DELETE');
   $rendezvous=new rendezvous();
   $rendezvous->deleteR($Id);
}



//update rendez-vous :
function select($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   $rendezvous=new rendezvous();
   $result = $rendezvous->selectRendezvous($Id);
   echo json_encode($result);
}

//save Update rendez-vous :
function saveupdate($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: PUT'); 
   $requestBody= json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $DateConsult= $requestBody->DateConsult;
   $TypeConsult=$requestBody->TypeConsult;
   $Horaire=$requestBody->Horaire;
   $Reference=$requestBody->Reference;
   $result=$rendezvous->saveRendezvous();
}

}


?>


<?php

function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$myRandomString = generateRandomString(5);

?>