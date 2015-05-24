<?php
/**
* 
*/
class Database
{
	public static $_instance = null;
	private $_pdo;

	private function __construct($db_type, $db_host, $db_name, $db_user, $db_pass)
	{	
		try
		{
			$this->_pdo = new PDO($db_type.':host='.$db_host.';dbname='.$db_name.';charset=UTF8', $db_user, $db_pass);
		}
		catch(PDOexception $e)
		{
			die('Hov, der skete en fejl. Prøv igen senere.');
		}
	}

	public static function getInstance($db_type, $db_host, $db_name, $db_user, $db_pass)
	{
		if(!isset(self::$_instance))
		{
			self::$_instance = new Database($db_type, $db_host, $db_name, $db_user, $db_pass);
		}
		return self::$_instance;
	}

	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->_pdo->prepare($sql);

		foreach ($array as $key => $value)
		{
			if(is_array($value))
			{
				$sth->bindValue("$key", $value[0], $value[1]);
			}
			else
			$sth->bindValue("$key", $value);
		}

		if(!$sth->execute())
		{
			throw new Exception($sth->errorInfo()[2]);
		}

		return $sth->fetchAll($fetchMode);
	}

	public function insertMultiple($table, $fieldNames, $columns)
	{
		$inputLength = 0;
		foreach ($columns as $array)
		{
			$size = sizeof($array);
			if($size > $inputLength) $inputLength = $size;
		}

		foreach ($columns as $column)
		{	
			if(is_array($column))
			{
				foreach ($column as $i => $value)
				{
					if(!isset($rows[$i])) $rows[$i] = array();
					array_push($rows[$i], $value);
				}
			}
			else
			{
				for ($i=0; $i < $inputLength; $i++)
				{
					if(!isset($rows[$i])) $rows[$i] = array();
					array_push($rows[$i], $column);
				}
			}
		}

		$fieldValues = '(';

		for ($i=0; $i < sizeof($rows); $i++)
		{ 
			for ($j=0; $j < sizeOf($fieldNames); $j++)
			{ 
				$fieldValues .= ':'.$i.$j.',';
				$bindValues[$i.$j] = $rows[$i][$j];
			}
			$fieldValues = rtrim($fieldValues, ',').'), (';

		}
		$fieldValues = rtrim($fieldValues, ', (');
		$fieldNames = implode('`, `', $fieldNames);
	
		$sth = $this->_pdo->prepare("INSERT INTO $table (`$fieldNames`) VALUES $fieldValues");

		foreach ($bindValues as $key => $value)
		{
			$sth->bindValue(":$key", htmlentities($value));
		}

		if(!$sth->execute())
		{
			throw new Exception($sth->errorInfo()[2]);
		}
	}

	public function insert($table, $data)
	{
		ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->_pdo->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value)
		{
			$sth->bindValue(":$key", htmlentities($value));
		}
		
		if(!$sth->execute())
		{
			throw new Exception($sth->errorInfo()[2]);
		}
	}


	public function update($table, $data, $where)
	{
		ksort($data);
		$fieldDetails = null;
		$whereDetails = null;

		foreach($where as $clause => $value)
		{
			$bind = (isset($value[3])) ? $value[3] : '';
			$whereDetails .= "`$value[0]` $value[1] :$value[0] $bind ";
		}

		foreach($data as $key => $value)
		{
			$fieldDetails .= "`$key`=:$key,";
		}

		$fieldDetails = rtrim($fieldDetails, ',');

		$sth = $this->_pdo->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");
		
		foreach ($data as $key => $value)
		{
			$sth->bindValue(":$key", htmlentities($value));
		}

		foreach($where as $clause => $value)
		{
			$sth->bindValue(":$value[0]", htmlentities($value[2]));
		}
		
		if(!$sth->execute())
		{
			throw new Exception($sth->errorInfo()[2]);
		}

		return true;
	}

	public function delete($table, $where, $limit = 1)
	{
		$whereDetails = null;

		foreach($where as $clause => $value)
		{
			$bind = (isset($value[3])) ? $value[3] : '';
			$whereDetails .= "`$value[0]` $value[1] :$value[0] $bind ";
		}

		$sth = $this->_pdo->prepare("DELETE FROM $table WHERE $whereDetails LIMIT $limit");

		foreach($where as $clause => $value)
		{
			$sth->bindValue(":$value[0]", htmlentities($value[2]));
		}
		
		if(!$sth->execute())
		{
			throw new Exception($sth->errorInfo()[2]);
		}

		return true;
	}

	public function beginTransaction()
	{
		$this->_pdo->beginTransaction();
	}

	public function commit()
	{
		$this->_pdo->commit();
	}

	public function rollBack()
	{
		$this->_pdo->rollBack();	
	}

	public function lastInsertId()
	{
		return $this->_pdo->lastInsertId();
	}
}