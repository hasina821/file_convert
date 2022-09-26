<?php
require_once('Manager.php');

class Conversion extends Manager{
    public function postConversion($input,$output){
        $bdd=$this->dbConnect();
        $sql="INSERT INTO Cover($input,$output) VALUES(?,?)";
        $restat=$bdd->prepare($sql);
        $isposted=$restat->execute(array($input,$output));

        return $isposted;
   }
   public function Compilefile(){
    
   }

}