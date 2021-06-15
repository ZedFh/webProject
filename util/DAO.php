<?php
class DAO{
private static $bdd;
public static function connect($localhost,$dbname,$root,$password){
    try{
        self::$bdd = new PDO(   'mysql:host='.$localhost.';dbname='.$dbname.';charset=utf8',
                                $root,
                                $password,
                                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                            );  
    }catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

public static function select($chaine,$u=null){
    $datas=self::$bdd->prepare($chaine);
    $datas->execute($u);
    return $datas->fetchAll();
}

public static function insert($chaine,$u){
    $datas=self::$bdd->prepare($chaine);
    $datas->execute($u);
}

public static function update($chaine,$u){
    $datas=self::$bdd->prepare($chaine);
    return $datas->execute($u);
}

public static function delete($chaine,$u){    
    $datas=self::$bdd->prepare($chaine);
    return $datas->execute($u);
}

public static function disconnect(){
    self::$bdd=null;
}



}
