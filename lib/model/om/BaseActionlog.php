<?php


abstract class BaseActionlog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $who;


	
	protected $what;


	
	protected $where;


	
	protected $why;


	
	protected $when;


	
	protected $from;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getWho()
	{

		return $this->who;
	}

	
	public function getWhat()
	{

		return $this->what;
	}

	
	public function getWhere()
	{

		return $this->where;
	}

	
	public function getWhy()
	{

		return $this->why;
	}

	
	public function getWhen($format = 'Y-m-d H:i:s')
	{

		if ($this->when === null || $this->when === '') {
			return null;
		} elseif (!is_int($this->when)) {
						$ts = strtotime($this->when);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [when] as date/time value: " . var_export($this->when, true));
			}
		} else {
			$ts = $this->when;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFrom()
	{

		return $this->from;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ActionlogPeer::ID;
		}

	} 
	
	public function setWho($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->who !== $v) {
			$this->who = $v;
			$this->modifiedColumns[] = ActionlogPeer::WHO;
		}

	} 
	
	public function setWhat($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->what !== $v) {
			$this->what = $v;
			$this->modifiedColumns[] = ActionlogPeer::WHAT;
		}

	} 
	
	public function setWhere($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->where !== $v) {
			$this->where = $v;
			$this->modifiedColumns[] = ActionlogPeer::WHERE;
		}

	} 
	
	public function setWhy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->why !== $v) {
			$this->why = $v;
			$this->modifiedColumns[] = ActionlogPeer::WHY;
		}

	} 
	
	public function setWhen($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [when] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->when !== $ts) {
			$this->when = $ts;
			$this->modifiedColumns[] = ActionlogPeer::WHEN;
		}

	} 
	
	public function setFrom($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from !== $v) {
			$this->from = $v;
			$this->modifiedColumns[] = ActionlogPeer::FROM;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->who = $rs->getString($startcol + 1);

			$this->what = $rs->getString($startcol + 2);

			$this->where = $rs->getString($startcol + 3);

			$this->why = $rs->getString($startcol + 4);

			$this->when = $rs->getTimestamp($startcol + 5, null);

			$this->from = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Actionlog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActionlogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ActionlogPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActionlogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ActionlogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ActionlogPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = ActionlogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActionlogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getWho();
				break;
			case 2:
				return $this->getWhat();
				break;
			case 3:
				return $this->getWhere();
				break;
			case 4:
				return $this->getWhy();
				break;
			case 5:
				return $this->getWhen();
				break;
			case 6:
				return $this->getFrom();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ActionlogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getWho(),
			$keys[2] => $this->getWhat(),
			$keys[3] => $this->getWhere(),
			$keys[4] => $this->getWhy(),
			$keys[5] => $this->getWhen(),
			$keys[6] => $this->getFrom(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActionlogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setWho($value);
				break;
			case 2:
				$this->setWhat($value);
				break;
			case 3:
				$this->setWhere($value);
				break;
			case 4:
				$this->setWhy($value);
				break;
			case 5:
				$this->setWhen($value);
				break;
			case 6:
				$this->setFrom($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ActionlogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setWho($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setWhat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setWhere($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setWhy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setWhen($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFrom($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ActionlogPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActionlogPeer::ID)) $criteria->add(ActionlogPeer::ID, $this->id);
		if ($this->isColumnModified(ActionlogPeer::WHO)) $criteria->add(ActionlogPeer::WHO, $this->who);
		if ($this->isColumnModified(ActionlogPeer::WHAT)) $criteria->add(ActionlogPeer::WHAT, $this->what);
		if ($this->isColumnModified(ActionlogPeer::WHERE)) $criteria->add(ActionlogPeer::WHERE, $this->where);
		if ($this->isColumnModified(ActionlogPeer::WHY)) $criteria->add(ActionlogPeer::WHY, $this->why);
		if ($this->isColumnModified(ActionlogPeer::WHEN)) $criteria->add(ActionlogPeer::WHEN, $this->when);
		if ($this->isColumnModified(ActionlogPeer::FROM)) $criteria->add(ActionlogPeer::FROM, $this->from);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ActionlogPeer::DATABASE_NAME);

		$criteria->add(ActionlogPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setWho($this->who);

		$copyObj->setWhat($this->what);

		$copyObj->setWhere($this->where);

		$copyObj->setWhy($this->why);

		$copyObj->setWhen($this->when);

		$copyObj->setFrom($this->from);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ActionlogPeer();
		}
		return self::$peer;
	}

} 