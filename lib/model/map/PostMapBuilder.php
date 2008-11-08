<?php



class PostMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PostMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('post');
		$tMap->setPhpName('Post');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('BYLINE', 'Byline', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('POSTED_AT', 'PostedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 