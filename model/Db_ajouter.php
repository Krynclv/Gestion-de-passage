<?php
include 'connectPdo.php';

class DbAjouter{
    
    public static function Evenement($evenements)
    {
        $sql = "INSERT INTO `evenements` (`IdEvent`, `LibelleEvent`) VALUES (NULL, '$evenements')";
        $objResultat = connectPdo::getObjPdo()->exec($sql);
    }

    public static function Lieu($lieux)
    {
        $sql = "INSERT INTO `lieux` (`IdLieu`, `LibelleLieu`) VALUES (NULL, '$lieux');";
        $objResultat = connectPdo::getObjPdo()->exec($sql);
    }
    

    public static function getListeLieux()
	{
		$sql = "select * from lieux ";		
		$objResultat = connectPdo::getObjPdo()->query($sql);	
		$result = $objResultat->fetchAll();
		return $result;
	}

    public static function getListeEvent()
	{
		$sql = "select * from evenements ";
		$objResultat = connectPdo::getObjPdo()->query($sql);	
		$result = $objResultat->fetchAll();
		return $result;
	}

    public static function supprimerEvent($IdEvent)
	{
		$sql = "DELETE FROM evenements WHERE evenements.IdEvent = $IdEvent";
		connectPdo::getObjPdo()->exec($sql);
	}

    public static function supprimerLieu($IdLieu)
	{
		$sql = "DELETE FROM lieux WHERE lieux.IdLieu = $IdLieu";
		connectPdo::getObjPdo()->exec($sql);
	}

	public static function deleteEleve()
	{
		$sql = "DELETE FROM eleves";
		connectPdo::getObjPdo()->exec($sql);
	}

	public static function importEleve($CodeEleve,$NomEleve,$PrenomEleve,$Classe)
	{
		$sql = "INSERT INTO `eleves` (`CodeEleve`, `Nom`, `Prenom`, `Classe`) 
				VALUES ('$CodeEleve', '$NomEleve', '$PrenomEleve', '$Classe');";
		connectPdo::getObjPdo()->exec($sql);
	}
}

?>