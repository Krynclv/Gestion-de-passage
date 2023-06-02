<?php 

include 'connectPdo.php';

class DbSaisie
{
    public static function listerEvent()
    {
        $sql = "SELECT * from evenements";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function listerLieu()
    {
        $sql = "SELECT * from lieux";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function getIdLieu($LibelleLieu)
    {
        $sql = "SELECT IdLieu
                FROM lieux
                WHERE LibelleLieu = '$LibelleLieu';";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function getIdEvent($LibelleEvent)
    {
        $sql = "SELECT IdEvent
                FROM evenements
                WHERE LibelleEvent = '$LibelleEvent';";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function ajouterPassageLieu($IdLieu,$CodeEleve)
    {
        $sql = "INSERT INTO passageslieu (Date, IdLieu, CodeEleve) VALUES (CURRENT_TIMESTAMP, $IdLieu, $CodeEleve);";
        connectPdo::getObjPdo()->exec($sql);    
    }

    public static function ajouterPassageEvent($IdEvent,$CodeEleve)
    {
        $sql = "INSERT INTO passagesevent (Date, IdEvent, CodeEleve) VALUES (CURRENT_TIMESTAMP, '$IdEvent', '$CodeEleve');";
        connectPdo::getObjPdo()->exec($sql);    
    }   
    
    public static function verifCodeEleve($CodeEleve)
    {
        $sql = "SELECT * 
                FROM eleves
                WHERE CodeEleve = '$CodeEleve';";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetch();
        return $result;  
        
    }
}

?>