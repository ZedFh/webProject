<?php
class DAO{
private static $bdd;

private static  $password='password'; 
private static  $localhost='localhost';
private static  $dbname='test';
private static  $root='root';
public static function connect(){
    try{
        self::$bdd = new PDO(   'mysql:host='.self::$localhost.';dbname='.self::$dbname.';charset=utf8',
                                self::$root,
                                self::$password,
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
    return $datas;
}


public static function update($chaine,$u){
    $datas=self::$bdd->prepare($chaine);
    return $datas->execute($u);
}

public static function delete($chaine,$u){    
    $datas=self::$bdd->prepare($chaine);
   
    $datas->execute($u);
}

public static function disconnect(){
    self::$bdd=null;
}

public static function request($chaine){    
    $datas=self::$bdd->prepare($chaine);
    return $datas->execute(); 
}


}