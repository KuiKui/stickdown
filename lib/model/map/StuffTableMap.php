<?php



/**
 * This class defines the structure of the 'stuff' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class StuffTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.StuffTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('stuff');
		$this->setPhpName('Stuff');
		$this->setClassname('Stuff');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('BOARD_ID', 'BoardId', 'INTEGER', 'board', 'ID', true, 11, null);
		$this->addColumn('CONTENT', 'Content', 'VARCHAR', true, 255, null);
		$this->addColumn('DETAILS', 'Details', 'VARCHAR', false, 64, null);
		$this->addColumn('LABEL', 'Label', 'VARCHAR', false, 32, null);
		$this->addColumn('STARRED', 'Starred', 'TINYINT', true, 1, 0);
		$this->addColumn('CHECKED', 'Checked', 'TINYINT', true, 1, 0);
		$this->addColumn('ORDER', 'Order', 'INTEGER', false, 11, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', false, 16, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Board', 'Board', RelationMap::MANY_TO_ONE, array('board_id' => 'id', ), 'CASCADE', 'RESTRICT');
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // StuffTableMap
