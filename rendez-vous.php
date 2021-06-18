<?php
include_once __DIR__.'/../../model/Mrendez_vous.php';

class Rendez_vousControler{

	function index()
	{
		// session_start();
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		$rendez_vous = new Mrendez_vous();
		$groupes=$rendez_vous->getSelect();
		echo json_encode($groupes);
		
		// $horaire = new Mreservation();
		// $horaire=$horaire->res2CreneauHoraire($groupe,$dateSeance);

		// if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
		// require_once __DIR__.'/../../view/créneaux_disponibles..php';
		// }else{
		// 	header("location: http://localhost/www/brief_6_VueJs_API/");
		// }
	}

	function page_add(){
		require_once __DIR__.'/../../view/ajouter_un_créneau.php';
	}

	function save(){

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods: POST');
		$requestBody=json_decode(file_get_contents('php://input'));
		// die($requestBody[0]->date);

		session_start();
		$i = 0;
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			if(isset($_POST['submit'])){
				$date=$_POST['date'];
				$typeConsultation=$_POST['typeConsultation'];
				$horaire=$_POST['horaire'];

				$reference = $_SESSION['user'][0]['reference'];

				$groupe = new Mrendez_vous();
				$groupe->save($requestBody[0]->date,$requestBody[0]->typeConsultation,$requestBody[0]->horaire,$requestBody[0]->reference);
				
				$Horaire = new Mrendez_vous();
				$Horaires=$Horaire->Horaire($date,$reference);

				
				require_once __DIR__.'/../../view/ajouter_un_créneau.php';
				
				header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/index");
				// echo "addd";
			}
		}else{
			header("location: http://localhost/www/brief_6_VueJs_API/");
		}
		
	}

	function edit()
	{
		if(isset($_POST['update'])){
			$id=$_POST['updateID'];

			$groupe = new Mrendez_vous();
			$groupes=$groupe->edit($id);

			require_once __DIR__.'/../view/updateGroupe.php';

		}
	}

	function update()
	{
		if(isset($_POST['submit'])){
			$Libelle=$_POST['Libelle'];
			$effectif=$_POST['effectif'];
			$id=$_POST['id'];

			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->update($Libelle,$effectif,$id);
			
			header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/");

		}
	}

	function delete()
	{
		if(isset($_POST['submit'])){
			$id=$_POST['DeleteID'];
			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->delete($id);

			header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/index");

		}
		
	}

	
}
