<?php
class event{

        private string $organizer;
        private int $id_event ;
        private string $name_event;
        private string $date_debut;
        private string $date_fin;
        private string $prix;
        private string $description;
        private string $image;
        public function __construct  ( string $organizer,int $id_event ,string $name_event,string $date_debut,string $date_fin,string $prix, string $description,string $image){
            $this->organizer=$organizer;
            $this->id_event=$id_event;
            $this->name_event = $name_event;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->prix = $prix;
            $this->description= $description;
            
           $this->image=$image;
        }    
        public function getId(){
            return $this->id_event;
        } 
        public function setId(int $id){
            $this->id_event=$id;
        }
        public function getorganizer(){
            return $this->organizer;
        } 
        public function setorganizer(string $organizer){
            $this->organizer=$organizer;
        }
        public function get_name_event(){
            return $this->name_event;
        } 
        public function set_Name_event(string $name_event){
            $this->name_event=$name_event;
        }
        public function getdate_debut(){
            return $this->date_debut;
        } 
        public function setdate_debut(string $date_debut){
            $this->date_debut=$date_debut;
        }
        public function getdate_fin(){
            return $this->date_fin;
        } 
        public function setdate_fin(string $date_fin){
            $this->date_fin=$date_fin;
        }
        public function getDescrip(){
            return $this->description;
        } 
        public function setdescrip(string $description){
            $this->description=$description;
        }
        public function getprix(){
            return $this->prix;
        } 
        public function setprix(string $prix){
            $this->prix=$prix;
        }
        public function getImage() {
            return $this->image;
          }
        
          // Setter for image
          public function setImage($image) {
            $this->image = $image;
          }
    }
?>