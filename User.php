<?php
/**
 * 
 */
class User
{
	private $_id;
	private $_name;
	private $_address;
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
	public function name()		{ return $this->_name; }
	public function address()	{ return $this->_address; }
	public function status()	{ return $this->_status; }


	//SETTERS

	public function setId($id)
	{
	    $id = (int) $id;

	    if($id > 0)
	    {
	      $this->_id = $id;
	      return;	
	    }

    	trigger_error('ID must be an integer!', E_USER_ERROR);
			return;	
			
	}

	public function setName($name)
	{
	    if(is_string($name))
	    {
	      $this->_name = $name;
	      return;
	    }		

    	trigger_error('Empty name!', E_USER_ERROR);
			return;		    
	}	

	public function setAddress($address)
	{
	    if(is_string($address))
	    {
	      $this->_address = $address;
	      return;
	    }		

    	trigger_error('Empty address!', E_USER_ERROR);
			return;		    
	}	

	public function setStatus($status)
	{
	    $status = (int) $status;
	    $this->_status = $status;

	}

}
?>