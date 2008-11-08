<?php



class UserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user');
		$tMap->setPhpName('User');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REAL_NAME', 'RealName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ENABLED', 'Enabled', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ACCESS', 'Access', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 