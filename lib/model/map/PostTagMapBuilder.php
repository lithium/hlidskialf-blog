<?php



class PostTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PostTagMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('post_tag');
		$tMap->setPhpName('PostTag');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('POST_ID', 'PostId', 'int', CreoleTypes::INTEGER, 'post', 'ID', false, null);

		$tMap->addForeignKey('TAG_ID', 'TagId', 'int', CreoleTypes::INTEGER, 'tag', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 