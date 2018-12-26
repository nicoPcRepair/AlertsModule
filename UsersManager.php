<?php

class UsersManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}


	// CREATE
	// return TRUE if executed else FALSE
	public function add(User $user)
	{
		$q = $this->_db->prepare('
			INSERT INTO users
			(name, address, status) 
			VALUES
			(:name, :address, :status) 
		');
		$q->bindValue(':name', $alert->name());
		$q->bindValue(':address', $alert->address());
		$q->bindValue(':status', $alert->status());
		return $q->execute();

		//$q->debugDumpParams();
	}

	// READ
	// return Alert object if found else NULL
	public function get($id)
	{
		if(is_int($id))
		{	
			$q = $this->_db->query('
				SELECT id, name, address, status
				FROM users 
				WHERE id = '.$id
			);

			if($datas = $q->fetch(PDO::FETCH_ASSOC)) return new User($datas);
		}
	}


	// UPDATE
	// return TRUE if affected else FALSE
	public function update(User $user)
	{
	    $q = $this->_db->prepare('
	    	UPDATE users 
	    	SET 
	    		name 	= :name, 
	    		address = :address, 
	    		status 	= :status 
	    	WHERE id = :id
	    ');
	    
	    $q->bindValue(':name', $alert->name(), PDO::PARAM_STR);
	    $q->bindValue(':address', $alert->address(), PDO::PARAM_STR);
	    $q->bindValue(':status', $alert->status(), PDO::PARAM_INT);
	    $q->bindValue(':id', $alert->id(), PDO::PARAM_INT);
	    $q->execute();

	    if(($q->rowCount() == 0)) return FALSE;
	    return TRUE;  
	}

	// DELETE
	public function delete(User $user)
	{
		// not really a delete method
		// put only status to ZERO

		//real DELETE method :
		//$this->_db->exec('DELETE FROM alerts WHERE id = '.$alert->id());

	    $q = $this->_db->prepare('
	    	UPDATE users 
	    	SET status = 0 
	    	WHERE id = :id
	    ');
	    
	    $q->bindValue(':id', $alert->id(), PDO::PARAM_INT);
	    $q->execute();

	    if(($q->rowCount() == 0)) return FALSE;
	    return TRUE; 		
	}

	////////////////////////////////////////////////////////////////////////////////////

	

}

?>