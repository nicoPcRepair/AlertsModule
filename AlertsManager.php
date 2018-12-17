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


	//CREATE
	public function add(Alert $alert)
	{
		$q = $this->_db->prepare('
			INSERT INTO alerts
			(lat, lng, title, text, dateMin, dateMax, type, status) 
			VALUES
			(:lat, :lng, :title, :text, :dateMin, :dateMax, :type, :status) 
		');
		$q->bindValue(':lat', $alert->lat());
		$q->bindValue(':lng', $alert->lng());
		$q->bindValue(':title', $alert->title());
		$q->bindValue(':text', $alert->text());
		$q->bindValue(':dateMin', $alert->dateMin());
		$q->bindValue(':dateMax', $alert->dateMax());
		$q->bindValue(':type', $alert->type());
		$q->bindValue(':status', $alert->status());
		return $q->execute();

		//if($q->execute()) echo 'inserted'; else echo 'error';
		//$q->debugDumpParams();
	}

	//READ
	public function get($id)
	{
		if(is_int($id))
		{	
			$q = $this->_db->query('
				SELECT id, lat, lng, title, text, dateMin, dateMax, type, status
				FROM alerts 
				WHERE id = '.$id
			);
			
			if($datas = $q->fetch(PDO::FETCH_ASSOC)) return new Alert($datas);
		}
	}

	//UPDATE
	public function update(Alert $alert)
	{
    $q = $this->_db->prepare('
    	UPDATE alerts 
    	SET 
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
    
    $q->bindValue(':lat', $alert->lat(), PDO::PARAM_STR);
    $q->bindValue(':lng', $alert->lng(), PDO::PARAM_STR);
    $q->bindValue(':title', $alert->title(), PDO::PARAM_STR);
    $q->bindValue(':text', $alert->text(), PDO::PARAM_STR);
    $q->bindValue(':dateMin', $alert->dateMin(), PDO::PARAM_INT);
    $q->bindValue(':dateMax', $alert->dateMax(), PDO::PARAM_INT);
    $q->bindValue(':dateMax', $alert->type(), PDO::PARAM_INT);
    $q->bindValue(':status', $alert->status(), PDO::PARAM_INT);
    $q->execute();
	}

	//DELETE
	public function delete(Alert $alert)
	{
		$this->_db->exec('DELETE FROM alerts WHERE id = '.$alert->id());
	}





}

?>