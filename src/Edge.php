<?php

	namespace BispoJr\GraphLib;

	class Edge{
		
		private $source;	//TYPE: Vertex
		private $target;	//TYPE: Vertex
    
	    //CONSTRUCTOR
	    public function __construct (Vertex $source, Vertex $target)
	    {
	        $this->source = $source;
	        $this->target = $target;
	    }
	    //GETs
	    public function getEndPoints()
	    {
	        return array($this->source, $this->target);
	    }
	    public function getEndPointIDs()
	    {
	        $sourceID = $this->source->getID();
	        $targetID = $this->target->getID();

	        return array($sourceID, $targetID);
	    }
	    //SETs
	    public function setEndPoints (Vertex $source, Vertex $target)
	    {
	        $this->source = $source;
	        $this->target = $target;
	    }
	    public function setEndPointsByID($sourceID, $targetID)
	    {
	        $this->source->setID($sourceID);
	        $this->target->setID($targetID);
	    }
	    public function setSource(Vertex $source)
	    {
	        $this->source = $source;
	    }
	    public function setTarget(Vertex $target)
	    {
	        $this->target = $target;
	    }
	    public function setSourceByID($sourceID)
	    {
	        $this->source->setID($sourceID);
	    }
	    public function setTargetByID($targetID)
	    {
	        $this->target->setID($targetID);
	    }
	    /**
	     * It verifies if the edge contains a given vertex.
	     * 
	     * @param vertex
	     * @return true, if the edge contains the vertex; or false, on the contrary.
	     */
	    public function contains(Vertex $vertex)
	    {
	        if( $this->source == $vertex || 
	        	$this->target == $vertex)
	            return true;
	        return false;
	    }
	    public function containsByID($vertexID)
	    {
	    	$vertex = new Vertex($vertexID);

	    	return $this->contains($vertex);
	    }
	    public function show()
	    {
	        return "{".$this->source->getID().", ".$this->target->getId()."}";
	    }
	}
?>