<?php
require_once '../util/DAO.php';

class categorieDAO{

    public function insert($u){
        DAO::connect('localhost','test','root','password');
        $datas= DAO::insert("INSERT into categorie(libelle) values(:libelle);",$u);
        DAO::disconnect();
        return $datas;
    }

    public function selectAll(){
        DAO::connect('localhost','test','root','password');
        $datas= DAO::select('SELECT * FROM categorie;');
        DAO::disconnect();
        return $datas;
    }

    public function select($u){
        DAO::connect('localhost','test','root','password');
        $cpt=0;
        $chaine='SELECT * FROM categorie WHERE ';
        
        if(isset($u['idCategorie'])){
            $chaine.='idCategorie  = :idCategorie ';
            $cpt++; 
        }
    
      
        if(isset($u['libelle'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='libelle = :libelle';
        }

        $chaine.= " ;";
        $datas= DAO::select($chaine,$u);
        DAO::disconnect();
        return $datas;
    }

    public function delete($u){
        DAO::connect('localhost','test','root','password');
        $chaine='DELETE FROM categorie WHERE idCategorie=:idCategorie';
        DAO::delete($chaine,$u);
        DAO::disconnect();
   }

   public function update($set){
    DAO::connect('localhost','test','root','password');
    $cpt=0;
    $chaine='UPDATE categorie set '; 
    
    if(isset($u['libelle'])){
        $chaine.='libelle = :libelle';
        $cpt++; 
    }


    if(isset($set['idCategorie'])){
        $chaine.=' WHERE ';
        $chaine.='idCategorie = :idCategorie';
        $cpt++; 
    }
       
    
    $datas= DAO::update($chaine,$set);
    DAO::disconnect();
    return $datas;
  
}

}