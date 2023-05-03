<?php
    class club
    {
        private $idclub;
        private $titre;
		private $type;
		private  $fondateur;
		private $date;

        function __construct($idclub, $titre, $type, $fondateur,$date){
			$this->idclub=$idclub;
			$this->titre=$titre;
			$this->type=$type;
			$this->fondateur=$fondateur;
			$this->date=$date;
		}

        function setidclub(string $idclub){
			$this->idclub=$idclub;
		}
        function settitre(string $titre){
			$this->titre=$titre;
		}
		function settype(string $type){
			$this->type=$type;
		}
		function setfondateur(string $fondateur){
			$this->fondateur=$fondateur;
		}
		function setdate(string $date){
			$this->date=$date;
		}

        function getidclub(){
			return $this->idclub;
		}
        function gettitre(){
			return $this->titre;
		}
		function gettype(){
			return $this->type;
		}
		function getfondateur(){
			return $this->fondateur;
		}
		function getdate(){
			return $this->date;
		}
      

        
    }
    

?>