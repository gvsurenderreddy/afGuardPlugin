<?php



/**
 * This class defines the structure of the 'af_guard_group_permission' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.map
 */
class afGuardGroupPermissionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.afGuardPlugin.lib.model.map.afGuardGroupPermissionTableMap';

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
		$this->setName('af_guard_group_permission');
		$this->setPhpName('afGuardGroupPermission');
		$this->setClassname('afGuardGroupPermission');
		$this->setPackage('plugins.afGuardPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'INTEGER' , 'af_guard_group', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PERMISSION_ID', 'PermissionId', 'INTEGER' , 'af_guard_permission', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('afGuardGroup', 'afGuardGroup', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('afGuardPermission', 'afGuardPermission', RelationMap::MANY_TO_ONE, array('permission_id' => 'id', ), 'CASCADE', null);
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
		);
	} // getBehaviors()

} // afGuardGroupPermissionTableMap
