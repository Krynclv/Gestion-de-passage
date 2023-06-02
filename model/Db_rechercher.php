<?php
include 'connectPdo.php';

class DbRechercher{
    public static function listerLieu()
    {
        $sql = "SELECT * from lieux";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
		return $result;  
    }


    public static function listerEleve()
    {
        $sql = "SELECT * from eleves";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
		return $result;  
    }

    public static function listerEvent()
    {
      $sql = "SELECT * from evenements";
      $objResultat = connectPdo::getObjPdo()->query($sql);
      $result = $objResultat->fetchAll();
      return $result;  
    }

    public static function histoEleve($nom,$prenom)
    {
        $sql = "SELECT
        eleves.CodeEleve,
        eleves.Nom,
        eleves.Prenom,
        eleves.Classe,
        passageslieu.Date,
        passageslieu.IdLieu AS IdLieu,
        lieux.LibelleLieu AS LibLieu,
        'X' AS IdEvent,
        'X'AS LibEvent
      FROM
        eleves,
        passageslieu,
        lieux
      WHERE
        eleves.CodeEleve = passageslieu.CodeEleve AND lieux.IdLieu = passageslieu.IdLieu
        AND eleves.Nom = '$nom'
        AND eleves.Prenom = '$prenom'
        
        
      UNION ALL
      
      SELECT
        eleves.CodeEleve,
        eleves.Nom,
        eleves.Prenom,
        eleves.Classe,
        passagesevent.Date,
         'X' AS IdLieu,
        'X' AS IdEvent,
        passagesevent.IdEvent IdEvent,
        evenements.LibelleEvent LibEvent
      
      FROM
        eleves,
        passagesevent,
        evenements
      WHERE
        eleves.CodeEleve = passagesevent.CodeEleve AND evenements.IdEvent = passagesevent.IdEvent
      
      AND eleves.Nom = '$nom'
      AND eleves.Prenom = '$prenom'
      ORDER BY DATE DESC";    
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }


    public static function histoEleveDate($nom,$prenom,$DateDebut,$DateFin)
    {
      $sql = "SELECT
      eleves.CodeEleve,
      eleves.Nom,
      eleves.Prenom,
      eleves.Classe,
      passageslieu.Date,
      passageslieu.IdLieu AS IdLieu,
      lieux.LibelleLieu AS LibLieu,
      'X' AS IdEvent,
      'X'AS LibEvent
      FROM
      eleves,
      passageslieu,
      lieux
      WHERE
      eleves.CodeEleve = passageslieu.CodeEleve AND lieux.IdLieu = passageslieu.IdLieu
      AND eleves.Nom = '$nom'
      AND eleves.Prenom = '$prenom'
      AND passageslieu.Date BETWEEN '$DateDebut' AND '$DateFin'
      
      
      UNION ALL
      
      SELECT
        eleves.CodeEleve,
        eleves.Nom,
        eleves.Prenom,
        eleves.Classe,
        passagesevent.Date,
        'X' AS IdLieu,
        'X' AS IdEvent,
        passagesevent.IdEvent IdEvent,
        evenements.LibelleEvent LibEvent
      
      FROM
        eleves,
        passagesevent,
        evenements
      WHERE
        eleves.CodeEleve = passagesevent.CodeEleve AND evenements.IdEvent = passagesevent.IdEvent
      
      AND eleves.Nom = '$nom'
      AND eleves.Prenom = '$prenom'
      AND passagesevent.Date BETWEEN '$DateDebut' AND '$DateFin'
      
      ORDER BY DATE";    
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function histoLieu($lieu)
    {
      $sql = "SELECT * 
              FROM passageslieu, lieux, eleves
              WHERE passageslieu.CodeEleve = eleves.CodeEleve
              AND passageslieu.IdLieu = lieux.IdLieu
              AND lieux.LibelleLieu = '$lieu'
              ORDER BY DATE;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function histoLieuDate($lieu,$DateDebut,$DateFin)
    {
      $sql = "SELECT * 
              FROM passageslieu, lieux, eleves
              WHERE passageslieu.CodeEleve = eleves.CodeEleve
              AND passageslieu.IdLieu = lieux.IdLieu
              AND lieux.LibelleLieu = '$lieu'
              AND passageslieu.Date BETWEEN '$DateDebut' AND '$DateFin'
              ORDER BY DATE;";
      $objResultat = connectPdo::getObjPdo()->query($sql);
      $result = $objResultat->fetchAll();
      return $result; 
    }

    public static function histoEvent($event)
    {
      $sql = "SELECT * 
              FROM passagesevent, evenements, eleves
              WHERE passagesevent.CodeEleve = eleves.CodeEleve
              AND passagesevent.IdEvent = evenements.IdEvent
              AND evenements.LibelleEvent = '$event'
              ORDER BY DATE;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;  
    }

    public static function histoEventDate($event,$DateDebut,$DateFin)
    {
      $sql = "SELECT * 
              FROM passagesevent, evenements, eleves
              WHERE passagesevent.CodeEleve = eleves.CodeEleve
              AND passagesevent.IdEvent = evenements.IdEvent
              AND evenements.LibelleEvent = '$event'
              AND passagesevent.Date BETWEEN '$DateDebut' AND '$DateFin'
              ORDER BY DATE;";
      $objResultat = connectPdo::getObjPdo()->query($sql);
      $result = $objResultat->fetchAll();
      return $result; 
    }


}

?>