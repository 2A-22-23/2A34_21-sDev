<?php
    class salle
    {
        private $idsalle;
        private $bloc;
		private $numero;
		private  $etage;
		private $idclub;

        function __construct($idsalle, $bloc, $numero, $etage,$idclub){
			$this->idsalle=$idsalle;
			$this->bloc=$bloc;
			$this->numero=$numero;
			$this->etage=$etage;
			$this->idclub=$idclub;
		}

        function setidsalle(string $idsalle){
			$this->idsalle=$idsalle;
		}
        function setbloc(string $bloc){
			$this->bloc=$bloc;
		}
		function setnumero(string $numero){
			$this->numero=$numero;
		}
		function setetage(string $etage){
			$this->etage=$etage;
		}
		function setidclub(string $idclub){
			$this->idclub=$idclub;
		}

        function getidsalle(){
			return $this->idsalle;
		}
        function getbloc(){
			return $this->bloc;
		}
		function getnumero(){
			return $this->numero;
		}
		function getetage(){
			return $this->etage;
		}
		function getidclub(){
			return $this->idclub;
		}
      

        
    }
    

?>