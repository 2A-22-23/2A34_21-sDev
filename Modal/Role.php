<?php

class Role{ 
    private $roles;
 
  
    function __construct($roles){
        $this->roles=$roles;
        
     
    }
    function getroles(){
        return $this->roles;
    }
    
  
    
    function setroles($roles){
        $this->roles=$roles;
    }
   
}








?>