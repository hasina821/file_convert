<?php

class Manager{

     function dbConnect(){
          try {
               $bdd=new PDO('mysql:host=localhost;dbname=COMP;charset=utf8','root','');
               $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               return $bdd;
          } catch (PDOException $e) {
               die('Errer:').$e->getMessage();
          }

     }
}