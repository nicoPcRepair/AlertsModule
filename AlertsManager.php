<?php

class AlertsManager
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
	public function add(Alert $alert)
	{
		$q = $this->_db->prepare('
			INSERT INTO alerts
			(userId, lat, lng, title, text, dateMin, dateMax, type, status) 
			VALUES
			(:userId, :lat, :lng, :title, :text, :dateMin, :dateMax, :type, :status) 
		');
		$q->bindValue(':userId', $alert->userId());
		$q->bindValue(':lat', $alert->lat());
		$q->bindValue(':lng', $alert->lng());
		$q->bindValue(':title', $alert->title());
		$q->bindValue(':text', $alert->text());
		$q->bindValue(':dateMin', $alert->dateMin());
		$q->bindValue(':dateMax', $alert->dateMax());
		$q->bindValue(':type', $alert->type());
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
				SELECT id, userId, lat, lng, title, text, dateMin, dateMax, type, status
				FROM alerts 
				WHERE id = '.$id
			);

			if($datas = $q->fetch(PDO::FETCH_ASSOC)) return new Alert($datas);
		}
	}

	public function getAlertsbyUserId($userId)
	{
		$list = [];

		if(is_int($userId))
		{
			$q = $this->_db->query('
				SELECT id, userId, lat, lng, title, text, dateMin, dateMax, type, status
				FROM alerts 
				WHERE userId = '.$userId
			);
			
			while ($datas = $q->fetch(PDO::FETCH_ASSOC))
			{
				$list[] = new Alert($datas);
			}
		}

		return $list;
	}	


	public function getAlertsbyLocation($lat,$lng)
	{
		$list = [];

		/*
		if(is_int($userId))
		{
		*/
			$q = $this->_db->query('
				SELECT id, userId, lat, lng, title, text, dateMin, dateMax, type, status
				FROM alerts'
			);
			
			while ($datas = $q->fetch(PDO::FETCH_ASSOC))
			{
				$list[] = new Alert($datas);
			}
		//}

		return $list;
	}

	// UPDATE
	// return TRUE if affected else FALSE
	public function update(Alert $alert)
	{
	    $q = $this->_db->prepare('
	    	UPDATE alerts 
	    	SET 
	    		userId 	= :userId, 
	    		lat 	= :lat, 
	    		lng 	= :lng, 
	    		title 	= :title, 
	    		text 	= :text, 
	    		dateMin = :dateMin, 
	    		dateMax = :dateMax, 
	    		type 	= :type, 
	    		status 	= :status 
	    	WHERE id = :id
	    ');
	    
	    $q->bindValue(':userId', $alert->userId(), PDO::PARAM_INT);
	    $q->bindValue(':lat', $alert->lat(), PDO::PARAM_STR);
	    $q->bindValue(':lng', $alert->lng(), PDO::PARAM_STR);
	    $q->bindValue(':title', $alert->title(), PDO::PARAM_STR);
	    $q->bindValue(':text', $alert->text(), PDO::PARAM_STR);
	    $q->bindValue(':dateMin', $alert->dateMin(), PDO::PARAM_INT);
	    $q->bindValue(':dateMax', $alert->dateMax(), PDO::PARAM_INT);
	    $q->bindValue(':type', $alert->type(), PDO::PARAM_INT);
	    $q->bindValue(':status', $alert->status(), PDO::PARAM_INT);
	    $q->bindValue(':id', $alert->id(), PDO::PARAM_INT);
	    $q->execute();

	    if(($q->rowCount() == 0)) return FALSE;
	    return TRUE;  
	}

	// DELETE
	public function delete(Alert $alert)
	{
		// not really a delete method
		// put only status to ZERO

		//real DELETE method :
		//$this->_db->exec('DELETE FROM alerts WHERE id = '.$alert->id());

	    $q = $this->_db->prepare('
	    	UPDATE alerts 
	    	SET status = 0 
	    	WHERE id = :id
	    ');
	    
	    $q->bindValue(':id', $alert->id(), PDO::PARAM_INT);
	    $q->execute();

	    if(($q->rowCount() == 0)) return FALSE;
	    return TRUE; 		
	}

}

?>