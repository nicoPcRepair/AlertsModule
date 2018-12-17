<?php
/**
 * 
 */
class Alert
{
	private $_id;
	private $_lat;
	private $_lng;
	private $_title;
	private $_text;
	private $_dateMin;
	private $_dateMax;
	private $_type;
	private $_status;

	function __construct(array $datas)
	{
		$this->hydrate($datas);
	}

	//HYDRATATION

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) {
      
      $method = 'set'.ucfirst($key);

      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }	

	//GETTERS

	public function id()			{ return $this->_id; }
	public function lat()			{ return $this->_lat; }
	public function lng()			{ return $this->_lng; }
	public function title()		{ return $this->_title; }
	public function text()		{ return $this->_text; }
	public function dateMin()	{ return $this->_dateMin; }
	public function dateMax()	{ return $this->_dateMax; }
	public function type()		{ return $this->_type; }
	public function status()	{ return $this->_status; }


	//SETTERS

	public function setId($id)
	{
	    $id = (int) $id;

	    if($id > 0)
	    {
	      $this->_id = $id;
	    }	
	}

	public function setLat($lat)
	{
			//$lat = floatval($lat);
			$this->_lat = $lat;
			/* 
	    if(is_float($lat))
	    {
	      $this->_lat = $lat;
	    }*/		
	}

	public function setLng($lng)
	{
			$this->_lng = $lng;
			/*		
	    if(is_float($lng))
	    {
	      $this->_lng = $lng;
	    }*/		
	}

	public function setTitle($title)
	{
	    if(is_string($title))
	    {
	      $this->_title = $title;
	    }		
	}	

	public function setText($text)
	{
	    if(is_string($text))
	    {
	      $this->_text = $text;
	    }		
	}

	public function setDateMin($dateMin)
	{
		// info 
		// int time ( void ) time() retourne l'heure courante, mesurée en secondes depuis le début de l'époque UNIX
	    $dateMin = (int) $dateMin;
 		$this->_dateMin = $dateMin;
	}

	public function setDateMax($dateMax)
	{
		// info 
		// int time ( void ) time() retourne l'heure courante, mesurée en secondes depuis le début de l'époque UNIX
	    $dateMax = (int) $dateMax;
 		$this->_dateMax = $dateMax;
	}

	public function setType($type)
	{
	    $type = (int) $type;
	    $this->_type = $type;

	}

	public function setStatus($status)
	{
	    $status = (int) $status;
	    $this->_status = $status;

	}

}
?>