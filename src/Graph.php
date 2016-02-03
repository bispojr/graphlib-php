<?php

	namespace BispoJr\GraphLib;

	class Graph {

		//ATTRIBUTES
	    private $vertexSet;
	    private $edgeSet;
	    private $name;
	    
	    //CONSTRUCTOR
	    public function __construct($name)
	    {
	        $this->vertexSet = array();
	        $this->edgeSet = array();
	        $this->name = $name;
	    }

	    //GETs
	    public function getVertexSet()
	    {
	        return $this->vertexSet;
	    }
	    public function getEdgeSet()
	    {
	        return $this->edgeSet;
	    }
	    public function getName()
	    {
	        return $this->name;
	    }
	    public function getN()
	    {
	        return count($this->vertexSet);
	    }
	    public function getM()
	    {
	        return count($this->edgeSet);
	    }
	    //SETs
	    public function setVertexSet($vertexSet)
	    {
	        $this->vertexSet = $vertexSet;
	    }
	    public function setEdgeSet($edgeSet)
	    {
	        $this->edgeSet = $edgeSet;
	    }
	    public function setName($name)
	    {
	        $this->name = $name;
	    }	    
	    //OTHER METHODS
	    public function addVertex(Vertex $vertex)
	    {	        
	        array_push($this->vertexSet, $vertex);
	    }
	    public function addVertexByID($vertexID)
	    {	        
	        $vertex = new Vertex($vertexID);
	        $this->addVertex($vertex);
	    }
	    public function addEdge(Vertex $source, Vertex $target)
	    {
	        $edge = new Edge($source, $target);

	        array_push($this->edgeSet, $edge);
	    }
	    public function addEdgeByID($id1, $id2)
	    {
	        $source = new Vertex($id1);
	        $target = new Vertex($id2);
	        $this->addEdge($source, $target);
	    }
	    public function degreeOf(Vertex $vertex)
	    {
	        if( array_search($vertex, $this->vertexSet) ){
	            $degree = 0;
	            foreach($this->edgeSet as $edge){
	                if($edge->contains($vertex))
	                    $degree++;
	            }
	            return $degree;
	        }
	        return -1;
	    }
	    public function degreeOfByID($vertexID)
	    {
	    	$vertex = new Vertex($id);

	        return $this->degreeOf($vertex);
	    }
	    /**
	     * It shows vertex set (V) and edge set (E) in terminal.
	     * 
	     * @author Esdras Bispo Jr.
	     */
	    public function show(){
	        $output = "";
	        
	        //It prepares graph name
            $output .= "<br>================================<br>";
            $output .= "Graph Name: ".$this->name."<br>";
            $output .= "================================";
	        
	        //It prepares vertex set
	        $output .= "<br>V = { ";
	        foreach($this->vertexSet as $vertex){
	            $output .= $vertex->getId().", ";
	        }
	        $output = substr($output, 0, -2);
	        $output .= " }";
	        
	        //It prepares edge set
	        $output .= "<br>E = {";
	        foreach($this->edgeSet as $edge){
	            $output .= $edge->show() .", ";
	        }
	        $output = substr($output, 0, -2);
	        $output .= " }<br>";
	        $output .= "================================<br>";
	        
	        echo $output;   //It shows on browser
	    }

	    public function d3()
	    {
	    	$nodes = '[ ';
	    	$i = 0;
			foreach ($this->vertexSet as $vertex) {
				$name = $vertex->getID();
				$nodes .= '{"name": "'.$name.'"}, ';
				$map[$name] = $i;
				$i++;
			}
			$nodes = substr($nodes, 0, -2);
			$nodes .= " ]";

			$links = '[ ';

			foreach ($this->edgeSet as $edge) {
				$endPoints = $edge->getEndPoints();
				$source = $endPoints[0]->getID();
				$target = $endPoints[1]->getID();
				$links .= '{"source" : nodes['.$map[$source].'], "target" : nodes['.$map[$target].']}, ';				
			}
			$links = substr($links, 0, -2);
			$links .= " ]";

			$data['nodes'] = $nodes;
			$data['links'] = $links;

			return $data;
	    }

	}
?>