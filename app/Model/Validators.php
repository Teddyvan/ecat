<?php

namespace App\Model ;
 class Validators
{
     private $data=array();
     private $error=array();


     public function __construct($data) {
         $this->data = $data;
     }

     public function check($name,$rule,$label,$options=FALSE)
     {
        $validator = "validate_$rule";
        if($this->$validator($name,$options))
        {
           $this->error[$name] = "Le champ {$label} n'a pas été correctement rempli";
        }
     }
     
     /**
      * Verifie que le champs passé en parametre n'est pas vide
      * @param Strinf $name
      * @return type
      */
     public function validate_required($name)
     {
        return !array_key_exists($name, $this->data) || $this->data[$name] == '';
     }
     
     /**
      * Verifie que le champ passé en parametre est un entier >0
      * @param type $name
      * @return type
      */
     public function validate_int($name)
     {  
        return !array_key_exists($name,  $this->data) || $this->data[$name] < 0 || !filter_var($this->data[$name],FILTER_VALIDATE_INT);
     }
     
      public function validate_nonVide($name)
     {  
        return !array_key_exists($name,  $this->data) || $this->data[$name] == 0 || !filter_var($this->data[$name],FILTER_VALIDATE_INT);
     }
   
     /**
      * Utilisé pour m-sedu pour verifier que le champs ne contient
      * pas un nombre superieur a 3
      * @param type $name
      * @return boolean
      */
      public function validate_limiter($name)
     {  
         if($this->data[$name] > 3){return true;}
     }
     
     /**
      * Prend le nom du champs verifie
      * que le contenu est superieur a zero
      * @param string $name
      * @return boolean
      */
     
      public function validate_positif($name)
     {  
         if($this->data[$name] < 0 ){return true;}
     }
     
     /**
      * Verifie que le format du numero
      * est sous la forme XX XX XX XX ou XXXXXXXX
      * avec x=0 a 9 
      */
       public function validate_tel($name)
     {  
         if(!empty($this->data[$name]))
        {
         $Number = explode(' ' ,$this->data[$name]);
         $numroCli = implode($Number);
        /*le numero doit etre composé de chiffre au nombre de 8
           COmmence et se termine par des chiffrers
        */
        $regexNum="#^[0-9]{8}$#"; 
           
              if(!preg_match($regexNum, $numroCli))
                return true;
        }
        else
            return true;
    }
     
     public function errors() 
     {
         return $this->error;
     }
}