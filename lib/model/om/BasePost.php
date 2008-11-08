<?php


abstract class BasePost extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $created_at;


	
	protected $slug;


	
	protected $title;


	
	protected $byline;


	
	protected $posted_at;


	
	protected $body;

	
	protected $collPostTags;

	
	protected $lastPostTagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getByline()
	{

		return $this->byline;
	}

	
	public function getPostedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->posted_at === null || $this->posted_at === '') {
			return null;
		} elseif (!is_int($this->posted_at)) {
						$ts = strtotime($this->posted_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [posted_at] as date/time value: " . var_export($this->posted_at, true));
			}
		} else {
			$ts = $this->posted_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBody()
	{

		return $this->body;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PostPeer::ID;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = PostPeer::CREATED_AT;
		}

	} 
	
	public function setSlug($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = PostPeer::SLUG;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = PostPeer::TITLE;
		}

	} 
	
	public function setByline($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->byline !== $v) {
			$this->byline = $v;
			$this->modifiedColumns[] = PostPeer::BYLINE;
		}

	} 
	
	public function setPostedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [posted_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->posted_at !== $ts) {
			$this->posted_at = $ts;
			$this->modifiedColumns[] = PostPeer::POSTED_AT;
		}

	} 
	
	public function setBody($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = PostPeer::BODY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->created_at = $rs->getTimestamp($startcol + 1, null);

			$this->slug = $rs->getString($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->byline = $rs->getString($startcol + 4);

			$this->posted_at = $rs->getTimestamp($startcol + 5, null);

			$this->body = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Post object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PostPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PostPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
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
					$pk = PostPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PostPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPostTags !== null) {
				foreach($this->collPostTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = PostPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPostTags !== null) {
					foreach($this->collPostTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCreatedAt();
				break;
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getByline();
				break;
			case 5:
				return $this->getPostedAt();
				break;
			case 6:
				return $this->getBody();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedAt(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getByline(),
			$keys[5] => $this->getPostedAt(),
			$keys[6] => $this->getBody(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCreatedAt($value);
				break;
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setByline($value);
				break;
			case 5:
				$this->setPostedAt($value);
				break;
			case 6:
				$this->setBody($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedAt($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setByline($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPostedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBody($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		if ($this->isColumnModified(PostPeer::ID)) $criteria->add(PostPeer::ID, $this->id);
		if ($this->isColumnModified(PostPeer::CREATED_AT)) $criteria->add(PostPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PostPeer::SLUG)) $criteria->add(PostPeer::SLUG, $this->slug);
		if ($this->isColumnModified(PostPeer::TITLE)) $criteria->add(PostPeer::TITLE, $this->title);
		if ($this->isColumnModified(PostPeer::BYLINE)) $criteria->add(PostPeer::BYLINE, $this->byline);
		if ($this->isColumnModified(PostPeer::POSTED_AT)) $criteria->add(PostPeer::POSTED_AT, $this->posted_at);
		if ($this->isColumnModified(PostPeer::BODY)) $criteria->add(PostPeer::BODY, $this->body);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		$criteria->add(PostPeer::ID, $this->id);

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

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setSlug($this->slug);

		$copyObj->setTitle($this->title);

		$copyObj->setByline($this->byline);

		$copyObj->setPostedAt($this->posted_at);

		$copyObj->setBody($this->body);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPostTags() as $relObj) {
				$copyObj->addPostTag($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new PostPeer();
		}
		return self::$peer;
	}

	
	public function initPostTags()
	{
		if ($this->collPostTags === null) {
			$this->collPostTags = array();
		}
	}

	
	public function getPostTags($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPostTags === null) {
			if ($this->isNew()) {
			   $this->collPostTags = array();
			} else {

				$criteria->add(PostTagPeer::POST_ID, $this->getId());

				PostTagPeer::addSelectColumns($criteria);
				$this->collPostTags = PostTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PostTagPeer::POST_ID, $this->getId());

				PostTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastPostTagCriteria) || !$this->lastPostTagCriteria->equals($criteria)) {
					$this->collPostTags = PostTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPostTagCriteria = $criteria;
		return $this->collPostTags;
	}

	
	public function countPostTags($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PostTagPeer::POST_ID, $this->getId());

		return PostTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPostTag(PostTag $l)
	{
		$this->collPostTags[] = $l;
		$l->setPost($this);
	}


	
	public function getPostTagsJoinTag($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPostTags === null) {
			if ($this->isNew()) {
				$this->collPostTags = array();
			} else {

				$criteria->add(PostTagPeer::POST_ID, $this->getId());

				$this->collPostTags = PostTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(PostTagPeer::POST_ID, $this->getId());

			if (!isset($this->lastPostTagCriteria) || !$this->lastPostTagCriteria->equals($criteria)) {
				$this->collPostTags = PostTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastPostTagCriteria = $criteria;

		return $this->collPostTags;
	}

} 