<?php
include_once __DIR__.'/../../model/Muser.php';


    class UserControler{

        function page_nouveau_utilisateur(){
            require_once __DIR__.'/../../view/nouveau_utilisateur.php';
        }

        function page_authentication_par_reference(){
            require_once __DIR__.'/../../view/authentication_par_référence.php';
        }

        function seConnect(){

            session_start();

            if(isset($_POST['submit'])){
                $reference = $_POST['reference'];

                $Muser = new Muser;
                $query = $Muser->seConnect($reference);
               
                if($row = $query->fetchAll()){

                        $_SESSION['user'] = $row;

                            header('location: http://localhost/www/brief_6_VueJs_API/rendez_vous/index');
                        
                    }else{
                        $_SESSION['erreurLogin']="<strong>Erreur!</strong> reference incorrecte !";
                        header('location: http://localhost/www/brief_6_VueJs_API/user/page_authentication_par_reference');
                    }
                }

        }

        function deConnect(){

            // session_start();

            session_unset();

            session_destroy();

            header('location: http://localhost/www/brief_6_VueJs_API/');
            
        }

        function register(){

            

            if(isset($_POST['submit'])){
                $reference = $_POST['reference'];
                $nom = $_POST['Nom'];
                $prenom = $_POST['Prenom'];
                $email = $_POST['Email'];
                $tele = $_POST['Tele'];
                $age = $_POST['Age'];

                $Muser = new Muser;
                $query = $Muser->register($reference,$nom,$prenom,$age,$email,$tele);


                    header('location: http://localhost/www/brief_6_VueJs_API/');

                

            }
        }

     
    }

?>