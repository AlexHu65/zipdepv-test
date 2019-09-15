<?php


require_once('./models/contactsModel.php');

class ContactController
{	
		public static function getContacts(){
			$table = "contacts";
			$response = ContactsModel::getContacts($table);
			echo json_encode($response);
		

		}

		public static function insertContacts($data){
			
			$table = "contacts";
			$response = ContactsModel::insertContacts($table, $data);
			echo json_encode($response);
		

		}

		public static function deleteContacts($item, $value){
			
			$table = "contacts";

			$response = ContactsModel::deleteContacts($table,$item, $value);
			echo json_encode($response);
		
		}

		public static function updateContacts($data, $value){
			
			$table = "contacts";
			$response = ContactsModel::updateContacts($table,$data, $value);
			echo json_encode($response);
		
		}

		public static function selectFilter($item, $value){
			
			$table = "contacts";
			$response = ContactsModel::selectFilter($table,$item, $value);
			echo json_encode($response);
		
		}
}