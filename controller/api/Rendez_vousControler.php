<?php
include_once __DIR__.'/../../model/Mrendez_vous.php';

class Rendez_vousControler{

	function index($ref)
	{
		
		$rendez_vous = new Mrendez_vous();
		$groupes=$rendez_vous->getSelect($ref);
		echo json_encode($groupes);
		
	}

	function save(){

		header('Access-Control-Allow-Methods: POST');
		$requestBody=json_decode(file_get_contents('php://input'));
				$groupe = new Mrendez_vous();
				if($groupe->save($requestBody->date,$requestBody->typeConsultation,$requestBody->horaire,$requestBody->reference)){
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

	function update()
	{
		header('Access-Control-Allow-Methods: PUT'); 
		$requestBody= json_decode(file_get_contents('php://input'));
		
			$Mrendez_vous = new Mrendez_vous();
        $Mrendez_vous->update($requestBody->date,$requestBody->horaire,$requestBody->typeConsultation,$requestBody->id);

	}

	function delete($id)
	{
		
		header('Access-Control-Allow-Methods: DELETE');
		

			$Mrendez_vous = new Mrendez_vous();
			$Mrendez_vous->delete($id);

			echo "deleted";
		
	}

	function horaire($date){

		$horaire = new Mrendez_vous();
			$horaires=$horaire->horaire($date);

			echo json_encode($horaires);
	}

	
}
