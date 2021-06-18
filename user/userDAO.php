<?php


class UserDAO{
    
    public function select($u){
        DAO::connect();
        $cpt=0;
        $chaine='SELECT * FROM user WHERE ';
        
       

        if(isset($u['email'])){
            $chaine.='email = :email';
            $cpt++; 
        }
    
        if(isset($u['nom'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='nom = :nom';
        }

        if(isset($u['prenom'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='prenom = :prenom';
        }

        

        if(isset($u['mdp'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='mdp = :mdp';
        }

        if(isset($u['naissance'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='naissance = :naissance';
        }

        if(isset($u['Nrue'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Nrue = :Nrue';
        }


        if(isset($u['rue'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='rue = :rue';
        }
        if(isset($u['codePostal'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='codePostal = :codePostal';
        }
        if(isset($u['Pays'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Pays = :Pays';
        }


        if(isset($u['numeroCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='numeroCarte = :numeroCarte';
        }
        if(isset($u['expCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='expCarte = :expCarte';
        }
        if(isset($u['codeCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='codeCarte = :codeCarte';
        }

        if(isset($u['Role'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Role = :Role';
        }


    
        $chaine.= " ;";

        $datas= DAO::select($chaine,$u);
        DAO::disconnect();
        return $datas;
    }

    public function selectAll(){
        DAO::connect();
        $datas= DAO::select('SELECT * FROM user;');
        DAO::disconnect();
        return $datas;
    }

    public function insert($u){
        DAO::connect();
        if(isset($u['numeroCarte'])===null)
            $datas= DAO::insert("INSERT into user(email,nom,prenom,mdp,naissance,Nrue,rue,codePostal,Pays) values(:email,:nom,:prenom,:mdp,:naissance,:Nrue,:rue,:codePostal,:Pays );",$u);
        else
        $datas= DAO::insert("INSERT into user values(:email,:nom,:prenom,:mdp,:naissance,:Nrue,:rue,:codePostal,:Pays,:numeroCarte,:expCarte,:codeCarte,:Role );",$u);

        DAO::disconnect();
        return $datas;
    }

    
    public function update($u){
        DAO::connect();
        $cpt=0;
        $chaine='UPDATE user set '; 
        
        if(isset($u['nom'])){
            $chaine.='nom = :nom';
            $cpt++; 
        }
    
        if(isset($u['prenom'])){
            if($cpt==1)
                $chaine.=' and ';
            $chaine.='prenom = :prenom';
        }
    
        if(isset($u['mdp'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='mdp = :mdp';
        }
    
        if(isset($u['naissance'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='naissance = :naissance';
        }
    
        if(isset($u['Nrue'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Nrue = :Nrue';
        }

        if(isset($u['rue'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='rue = :rue';
        }

        if(isset($u['codePostal'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='codePostal = :codePostal';
        }

        if(isset($u['Pays'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Pays = :Pays';
        }

        if(isset($u['numeroCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='numeroCarte = :numeroCarte';
        }

        if(isset($u['expCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='expCarte = :expCarte';
        }

        if(isset($u['codeCarte'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='codeCarte = :codeCarte';
        }

        if(isset($u['Role'])){
            if($cpt>=1)
                $chaine.=' and ';
            $chaine.='Role = :Role';
        }
    
        
           
        if(isset($u['email'])){  
            $chaine.=' WHERE ';
            $chaine.='email = :email';
            $cpt++; 
        }
           
        
        $datas= DAO::update($chaine,$u);
        DAO::disconnect();
        return $datas;
      
    }


    public function delete($u){
        DAO::connect();
        $chaine='DELETE FROM user WHERE email=:email';
        DAO::delete($chaine,$u);
        DAO::disconnect();
   }

   public function count(){
        DAO::connect();
        $data=DAO::select('SELECT count(*) q from user');
        DAO::disconnect();
        return $data;

   }

}