<?php 

require_once('./config/Database.php');

class ContactsModel
{
	
	public static function getContacts($table){

		$stmt = connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

	}

	public static function insertContacts($table, $data){

		
		$stmt = connection::connect()->prepare("INSERT INTO $table (firstname, surname, phone, email) values(:firstname, :surname, :phone, :email)");
		$stmt->bindParam(':firstname', $data["firstname"], PDO::PARAM_STR);
		$stmt->bindParam(':surname', $data["surname"], PDO::PARAM_STR);	
		$stmt->bindParam(':phone', $data["phone"], PDO::PARAM_INT);	
		$stmt->bindParam(':email', $data["email"], PDO::PARAM_STR);	

        if($stmt->execute()){

       	return $stmt = array('success' => "Succesfully inserted");

        }else{

       	return $stmt = array('error' => "Invalid data");
        
        }
        $stmt->close();
        $stmt = null;

	}

	public static function deleteContacts($table, $item, $value){

		$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = $value");	

        if($stmt->execute()){
       	       		return $stmt = array('success' => "Succesfully deleted");
        
        }else{
       	
       	return $stmt = array('error' => "Invalid data");
        
        }
        $stmt->close();
        $stmt = null;
        

	}

	public static function updateContacts($table, $data, $value){

		
		$stmt = connection::connect()->prepare("UPDATE $table SET  firstname = :firstname , surname = :surname , phone = :phone , email = :email WHERE id = $value");
		$stmt->bindParam(':firstname', $data["firstname"], PDO::PARAM_STR);
		$stmt->bindParam(':surname', $data["surname"], PDO::PARAM_STR);	
		$stmt->bindParam(':phone', $data["phone"], PDO::PARAM_INT);	
		$stmt->bindParam(':email', $data["email"], PDO::PARAM_STR);	

        if($stmt->execute()){

       	return $stmt = array('success' => "Succesfully updated");

        }else{

       	return $stmt = array('error' => "Invalid data");
        
        }
        $stmt->close();
        $stmt = null;

	}


	public static function selectFilter($table, $item, $value){

		
		$stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
		$stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

		if($stmt->execute()){

       	return $stmt->fetchAll();

        }else{

       	return $stmt = array('error' => "No data to show");
        
        }
        
        $stmt->close();
        $stmt = null;
	}
}