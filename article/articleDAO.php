<?php
    require_once ('/wamp64/www/devoir/webProject/util/DAO.php');

class articleDAO{

    public function insert($u){
        DAO::connect();
        
        $datas= DAO::insert("INSERT into article(nomA,prix,description,pathImage,quatiteStock,idCategorie) values(:nomA,:prix,:description,:pathImage,:quatiteStock,:idCategorie );",$u);
        
        DAO::disconnect();
        return $datas;
    }

    public function selectAll(){
        DAO::connect();
        $datas= DAO::select('SELECT idArticle,nomA,prix,description,pathImage,quatiteStock,libelle FROM article a, categorie c where a.idCategorie=c.idcategorie and quatiteStock>0;');
        DAO::disconnect();
        return $datas;
    }

    public function select($u){
        DAO::connect();
        $cpt=0;
        $chaine='SELECT * FROM article WHERE ';
        
        if(isset($u['idArticle'])){
            $chaine.='idArticle = :idArticle';
            $cpt++; 
        }
    
        if(isset($u['nomA'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='nomA = :nomA';
        }

        if(isset($u['prix'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='prix = :prix';
        }

        if(isset($u['description'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='description like %:description%';
        }

        if(isset($u['quatiteStock'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='quatiteStock = :quatiteStock';
        }

        if(isset($u['idCategorie'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='idCategorie = :idCategorie';
        }

        $chaine.= " ;";
        $datas= DAO::select($chaine,$u);
        DAO::disconnect();
        return $datas;
    }

    public function delete($u){
        DAO::connect();
        $chaine='DELETE FROM article WHERE idArticle=:idArticle';
        DAO::delete($chaine,$u);
        DAO::disconnect();
   }

   public function update($set){
    DAO::connect();
    $cpt=0;
    $chaine='UPDATE article set '; 
    
    if(isset($u['nomA'])){
        $chaine.='nomA = :nomA';
        $cpt++; 
    }

    if(isset($u['prix'])){
        if($cpt==1)
            $chaine.=' and ';
        $chaine.='prix = :prix';
    }

    if(isset($u['description'])){
        if($cpt>=1)
            $chaine.=' and ';
        $chaine.='description like %:description%';
    }

    if(isset($u['quatiteStock'])){
        if($cpt>=1)
            $chaine.=' and ';
        $chaine.='quatiteStock = :quatiteStock';
    }

    if(isset($u['idCategorie'])){
        if($cpt>=1)
            $chaine.=' and ';
        $chaine.='idCategorie = :idCategorie';
    }

    
       
    if(isset($set['idArticle'])){  
        $chaine.=' WHERE ';
        $chaine.='idArticle = :idArticle';
        $cpt++; 
    }
       
    
    $datas= DAO::update($chaine,$set);
    DAO::disconnect();
    return $datas;
  
}

public function count(){
    DAO::connect();
    $data=DAO::select('SELECT count(*) q from article ');
    DAO::disconnect();
    return $data;

}


public function countForDisplay(){
    DAO::connect();
    $data=DAO::select('SELECT count(*) q from article where quatiteStock>0');
    DAO::disconnect();
    return $data;

}

public function countfiltered($u){
    DAO::connect();
    $chaine ="SELECT count(*) q from article where ";
    $c=0;
    $list=null;
    if(isset($u['cat'])){
        $chaine.=" idCategorie in (";
        foreach($u['cat'] as $a){
            $chaine.="  :idCategorie$c";
            $list['idCategorie'.$c]=$a;
            $c++;
            if($c!=count($u['cat']))
                $chaine.=" , ";
        }
        $chaine.=" )";
    }
    if(isset($u['prixmin']) && $u['prixmin']!=""){
        if($c>0)
            $chaine.=" and ";
        $c++;
        $chaine.="prix > :prixmin";
        $list['prixmin']=$u['prixmin'];
    }

    if(isset($u['prixmax']) && $u['prixmax']!="" ){
        if($c>0)
            $chaine.=" and ";
        $c++;
        $chaine.="prix < :prixmax ";
        $list['prixmax']=$u['prixmax'];
    }

    $data=DAO::select( $chaine,$list);
    DAO::disconnect();
    return $data;
}


public function selectfiltered($u){
    DAO::connect();
    $chaine ="SELECT * from article where ";
    $c=0;
    $list=null;
    if(isset($u['cat'])){
        $chaine.=" idCategorie in (";
        foreach($u['cat'] as $a){
            $chaine.="  :idCategorie$c";
            $list['idCategorie'.$c]=$a;
            $c++;
            if($c!=count($u['cat']))
                $chaine.=" , ";
        }
        $chaine.=" )";
    }
    if(isset($u['prixmin']) && $u['prixmin']!=""){
        if($c>0)
            $chaine.=" and ";
        $c++;
        $chaine.="prix > :prixmin";
        $list['prixmin']=$u['prixmin'];
    }

    if(isset($u['prixmax']) && $u['prixmax']!="" ){
        if($c>0)
            $chaine.=" and ";
        $c++;
        $chaine.="prix < :prixmax ";
        $list['prixmax']=$u['prixmax'];
    }
    
    $data=DAO::select( $chaine,$list);
    DAO::disconnect();
    return $data;
}


}