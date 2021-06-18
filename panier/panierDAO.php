<?php
require '/wamp64/www/devoir/webProject/util/DAO.php';


class panierDAO{
    
    public function select($u){
        DAO::connect();
        $cpt=0;
        $chaine='SELECT * FROM panier WHERE ';
        
       

        if(isset($u['idPanier'])){
            $chaine.='idPanier = :idPanier';
            $cpt++; 
        }
    
        if(isset($u['email'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='email = :email';
        }

        if(isset($u['date'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='date = :date';
        }
        $chaine.= " ;";

        $datas= DAO::select($chaine,$u);
        DAO::disconnect();
        return $datas;
    }

    public function selectAll(){
        DAO::connect();
        $datas= DAO::select('SELECT * FROM panier;');
        DAO::disconnect();
        return $datas;
    }

    public function insert($u=NULL){
        DAO::connect();
        if(isset($u['email']))
            $datas= DAO::insert("INSERT into panier(email) values(:email) ;SELECT LAST_INSERT_ID();",$u);
        else
            $datas= DAO::insert("INSERT into panier() values() ;SELECT LAST_INSERT_ID();",$u);
        
        DAO::disconnect();
        return $datas;
    }

    
    public function update($u){
        DAO::connect();
        $cpt=0;
        $chaine='UPDATE panier set '; 
        
        if(isset($u['email'])){
            $chaine.='email = :email';
            $cpt++; 
        }
    
        if(isset($u['date'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='date = :date';
        }
           
        if(isset($set['idPanier'])){  
            $chaine.=' WHERE ';
            $chaine.='idPanier = :idPanier';
        }
           
        
        $datas= DAO::update($chaine,$u);
        DAO::disconnect();
        return $datas;
      
    }


    public function delete($u){
        DAO::connect();
        if(isset($u['idPanier'])){
            $chaine='DELETE FROM panier WHERE idPanier=:idPanier';
            DAO::delete($chaine,$u);
        }
        DAO::disconnect();
   }

   public function count($u){
        DAO::connect();
        $data=DAO::select('SELECT count(*) q from panier where email=:email',$u);
        DAO::disconnect();
        return $data;

   }

}