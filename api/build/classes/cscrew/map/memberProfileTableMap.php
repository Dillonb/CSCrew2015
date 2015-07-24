<?php



/**
 * This class defines the structure of the 'memberprofile' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.cscrew.map
 */
class memberProfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'cscrew.map.memberProfileTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('memberprofile');
        $this->setPhpName('memberProfile');
        $this->setClassname('memberProfile');
        $this->setPackage('cscrew');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id', 'Id', 'INTEGER' , 'user', 'id', true, null, null);
        $this->addColumn('visible', 'Visible', 'BOOLEAN', false, 1, false);
        $this->addColumn('bio', 'Bio', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id' => 'id', ), null, null);
    } // buildRelations()

} // memberProfileTableMap
