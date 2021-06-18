<?php
require '/wamp64/www/devoir/webProject/util/DAO.php';


class panierDAO{
    
    public function select($u){
        DAO::connect();
        $cpt=0;
        $chaine='SELECT * FROM articlePanier WHERE ';

        if(isset($u['idPanier'])){
            $chaine.='idPanier = :idPanier';
            $cpt++; 
        }
    
        if(isset($u['idArticle'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='idArticle = :idArticle';
        }

        if(isset($u['quantite'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='quantite = :quantite';
        }
        $chaine.= " ;";

        $datas= DAO::select($chaine,$u);
        DAO::disconnect();
        return $datas;
    }

    public function selectAll(){
        DAO::connect();
        $datas= DAO::select('SELECT * FROM articlepanier;');
        DAO::disconnect();
        return $datas;
    }

    public function insert($u){
        DAO::connect();
        if(isset($u['idArticle']) && isset($u['idPanier']) && isset($u['quantite'])  )
            $datas= DAO::insert("INSERT into articlepanier(idArticle,idPanier,quantite) values(:idArticle,:idPanier,:quantite) ;",$u);
      
        
        DAO::disconnect();
        return $datas;
    }

    
    public function update($u){
        DAO::connect();
        $cpt=0;
        $chaine='UPDATE panier set '; 
        
        if(isset($u['quantite'])){
            $chaine.='quantite = :quantite';
            $cpt++; 
        }
    

           
        if(isset($set['idPanier'])){  
            $chaine.=' WHERE ';
            $chaine.='idPanier = :idPanier';
        }

        if(isset($set['idArticle'])){  
            $chaine.=' and ';
            $chaine.='idArticle = :idArticle';
        }
           
        
        $datas= DAO::update($chaine,$u);
        DAO::disconnect();
        return $datas;
      
    }


    public function delete($u){
        DAO::connect();

        if(isset($u['idPanier']) && isset($u['idArticle'])){
            $chaine='DELETE FROM articlePanier WHERE idPanier=:idPanier and idArticle=:idArticle';
            DAO::delete($chaine,$u);
        }


        if(isset($u['idPanier'])){
            $chaine='DELETE FROM articlePanier WHERE idPanier=:idPanier';
            DAO::delete($chaine,$u);
        }
        DAO::disconnect();
   }

   public function count($u){
        DAO::connect();
        $data=DAO::select('SELECT count(*) q from articlePanier where email=:email',$u);
        DAO::disconnect();
        return $data;

   }

}