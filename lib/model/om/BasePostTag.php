<?php


abstract class BasePostTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $post_id;


	
	protected $tag_id;


	
	protected $id;

	
	protected $aPost;

	
	protected $aTag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPostId()
	{

		return $this->post_id;
	}

	
	public function getTagId()
	{

		return $this->tag_id;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setPostId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->post_id !== $v) {
			$this->post_id = $v;
			$this->modifiedColumns[] = PostTagPeer::POST_ID;
		}

		if ($this->aPost !== null && $this->aPost->getId() !== $v) {
			$this->aPost = null;
		}

	} 
	
	public function setTagId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tag_id !== $v) {
			$this->tag_id = $v;
			$this->modifiedColumns[] = PostTagPeer::TAG_ID;
		}

		if ($this->aTag !== null && $this->aTag->getId() !== $v) {
			$this->aTag = null;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PostTagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->post_id = $rs->getInt($startcol + 0);

			$this->tag_id = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PostTag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PostTagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PostTagPeer::DATABASE_NAME);
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


												
			if ($this->aPost !== null) {
				if ($this->aPost->isModified()) {
					$affectedRows += $this->aPost->save($con);
				}
				$this->setPost($this->aPost);
			}

			if ($this->aTag !== null) {
				if ($this->aTag->isModified()) {
					$affectedRows += $this->aTag->save($con);
				}
				$this->setTag($this->aTag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PostTagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PostTagPeer::doUpdate($this, $con);
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


												
			if ($this->aPost !== null) {
				if (!$this->aPost->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPost->getValidationFailures());
				}
			}

			if ($this->aTag !== null) {
				if (!$this->aTag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTag->getValidationFailures());
				}
			}


			if (($retval = PostTagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPostId();
				break;
			case 1:
				return $this->getTagId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostTagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPostId(),
			$keys[1] => $this->getTagId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPostId($value);
				break;
			case 1:
				$this->setTagId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostTagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPostId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTagId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PostTagPeer::DATABASE_NAME);

		if ($this->isColumnModified(PostTagPeer::POST_ID)) $criteria->add(PostTagPeer::POST_ID, $this->post_id);
		if ($this->isColumnModified(PostTagPeer::TAG_ID)) $criteria->add(PostTagPeer::TAG_ID, $this->tag_id);
		if ($this->isColumnModified(PostTagPeer::ID)) $criteria->add(PostTagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PostTagPeer::DATABASE_NAME);

		$criteria->add(PostTagPeer::ID, $this->id);

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

		$copyObj->setPostId($this->post_id);

		$copyObj->setTagId($this->tag_id);


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
			self::$peer = new PostTagPeer();
		}
		return self::$peer;
	}

	
	public function setPost($v)
	{


		if ($v === null) {
			$this->setPostId(NULL);
		} else {
			$this->setPostId($v->getId());
		}


		$this->aPost = $v;
	}


	
	public function getPost($con = null)
	{
		if ($this->aPost === null && ($this->post_id !== null)) {
						$this->aPost = PostPeer::retrieveByPK($this->post_id, $con);

			
		}
		return $this->aPost;
	}

	
	public function setTag($v)
	{


		if ($v === null) {
			$this->setTagId(NULL);
		} else {
			$this->setTagId($v->getId());
		}


		$this->aTag = $v;
	}


	
	public function getTag($con = null)
	{
		if ($this->aTag === null && ($this->tag_id !== null)) {
						$this->aTag = TagPeer::retrieveByPK($this->tag_id, $con);

			
		}
		return $this->aTag;
	}

} 