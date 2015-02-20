<?php
	
	namespace BispoJr\GraphLib;

	class Algorithm{

		/**
	     * It verifies if the graph is or not regular.
	     * 
	     * @param g
	     * @return true, if the graph is regular; or false, on the contrary.
	     */
	    public static function isRegular(Graph $g){
	        
	        $allVertices = $g->getVertexSet();

	        $degree = -1;
	        
	        foreach($allVertices as $vertex){
	            if($degree != -1){
	                if($g->degreeOf($vertex) != $degree)
	                    return false;
	            }
	            else $degree = $g->degreeOf($vertex);
	        }
	        
	        return true;
	    }
	}
?>