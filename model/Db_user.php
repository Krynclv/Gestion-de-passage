<?php
include 'connectPdo.php';

class DbUser{

    public static function getUser($email,$password)
	{
		$sql = "SELECT LoginEmail,Password FROM utilisateur WHERE LoginEmail = '$email' AND Password = '$password';";	
		$objResultat = connectPdo::getObjPdo()->query($sql);	
		$result = $objResultat->fetch();
		return $result;    
	}
}

?>