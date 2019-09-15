<?php

require_once('./controllers/contactContoller.php');


//read contacts
$requestMethod = $_SERVER["REQUEST_METHOD"];


if (isset($_GET['path'])) {
    
        $paths = explode('/', $_GET['path']);

        if($paths[0] == "get"){

		$contacts = ContactController::getContacts();

        }elseif ($paths[0] == "insert") {
        	
       		if($_POST){

       			//get all phones from post request
       			$phoneN = $_POST["phone"];
       			//delimited using commas
       			$phones = explode(",", $phoneN);
       			$cont  = 0;
       			foreach ($phones as $index => $phone) {
					$cont++;
       				$arrayPhones[] = $arrayName = array("phone" . $cont => $phone); 
       			}

       			$phone = json_encode($arrayPhones, true);


       			//get all phones from post request
       			$mailN = $_POST["email"];
       			//delimited using commas
       			$emails = explode(",", $mailN);
       			$cont2  = 0;
       			foreach ($emails as $index2 => $email) {
					$cont2++;
       				$arrayMails[] = $arrayName = array("mail" . $cont2 => $email); 
       			}

       			$mail = json_encode($arrayMails, true);
			
       			

       			$data = array('firstname' => $_POST["firstname"], "surname" => $_POST["surname"]  , "phone" => $phone , "email" => $mail);
				echo $contacts = ContactController::insertContacts($data);
			
				}else{

					echo "Invalid or empty data";

				}

        	}elseif ($paths[0] == "delete" && $_POST) {

        		if(isset($_POST["id"])){

        		$item = "id";
        		$value = $_POST["id"];
        		$contacts = ContactController::deleteContacts($item, $value);
        	
        		}
        	
        }elseif ($paths[0] == "update" && $_POST) {

			if(isset($_POST["id"])){

        		
        		$value = $_POST["id"];
       			$data = array('firstname' => $_POST["firstname"], "surname" => $_POST["surname"]  , "phone" => $_POST["phone"] , "email" => $_POST["email"]);

        		$contacts = ContactController::updateContacts($data ,$value);
        	
        		}

        	
        }elseif ($paths[0] == "filter" && isset($paths[1]) && isset($paths[2])) {

        	//show filters according
        	$item = $paths[1];
        	$value = $paths[2];
        	
        	$contacts = ContactController::selectFilter($item, $value);



        }
    }