<?php



class ActionlogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ActionlogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('actionlog');
		$tMap->setPhpName('Actionlog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('WHO', 'Who', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WHAT', 'What', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WHERE', 'Where', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WHY', 'Why', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WHEN', 'When', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FROM', 'From', 'string', CreoleTypes::VARCHAR, false, 32);

	} 
} 