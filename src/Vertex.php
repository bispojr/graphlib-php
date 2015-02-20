<?php 
	
	namespace Bispojr\GraphLib;

	class Vertex{

		private $id;
	    
	    //CONSTRUCTOR
	    public function __construct($id)
	    {
	        $this->id = $id;
	    }
	    //GETs AND SETs
	    public function getId(){
	        return $this->id;
	    }
	    public function setId($id){
	        $this->id = $id;
	    }
	}

?>