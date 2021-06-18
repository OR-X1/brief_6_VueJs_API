<?php
include_once __DIR__.'/../../model/Mrendez_vous.php';

class Rendez_vousControler{

	function index()
	{
		
		$rendez_vous = new Mrendez_vous();
		$groupes=$rendez_vous->getSelect();
		echo json_encode($groupes);
		
	}

	function page_add(){
		require_once __DIR__.'/../../view/ajouter_un_créneau.php';
	}

	function save(){

		
		header('Access-Control-Allow-Methods: POST');
		$requestBody=json_decode(file_get_contents('php://input'));
				$groupe = new Mrendez_vous();
				if($groupe->save($requestBody[0]->date,$requestBody[0]->typeConsultation,$requestBody[0]->horaire,$requestBody[0]->reference)){
					echo "added";
				}else{
					echo "not added";
				}
				
				
		
	}

	function edit($id)
	{

			$groupe = new Mrendez_vous();
			$groupes=$groupe->edit($id);

			echo json_encode($groupes);

			// require_once __DIR__.'/../view/updateGroupe.php';

		
	}

	function update($id)
	{
		header('Access-Control-Allow-Methods: PUT'); 
		$requestBody= json_decode(file_get_contents('php://input'));
		
			$Mrendez_vous = new Mrendez_vous();
			if($Mrendez_vous->update($requestBody[0]->date,$requestBody[0]->typeConsultation,$requestBody[0]->horaire,$id)){
				
				echo "updated";
			}else{
				echo "not updated";
			}
			
			// header("location: http://localhost/www/brief_6_VueJs_API/rendez_vous/");

		
	}

	function delete($id)
	{
		
		header('Access-Control-Allow-Methods: DELETE');
		

			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->delete($id);

			echo "deleted";
		
	}

	
}
