<?php



/**
 * This class defines the structure of the 'helphour' table.
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
class helpHourTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'cscrew.map.helpHourTableMap';

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
        $this->setName('helphour');
        $this->setPhpName('helpHour');
        $this->setClassname('helpHour');
        $this->setPackage('cscrew');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('monday', 'Monday', 'BOOLEAN', false, 1, false);
        $this->addColumn('tuesday', 'Tuesday', 'BOOLEAN', false, 1, false);
        $this->addColumn('wednesday', 'Wednesday', 'BOOLEAN', false, 1, false);
        $this->addColumn('thursday', 'Thursday', 'BOOLEAN', false, 1, false);
        $this->addColumn('friday', 'Friday', 'BOOLEAN', false, 1, false);
        $this->addColumn('saturday', 'Saturday', 'BOOLEAN', false, 1, false);
        $this->addColumn('sunday', 'Sunday', 'BOOLEAN', false, 1, false);
        $this->addColumn('start_time', 'StartTime', 'TIME', true, null, null);
        $this->addColumn('end_time', 'EndTime', 'TIME', true, null, null);
        $this->addColumn('end_date', 'EndDate', 'DATE', true, null, null);
        $this->addColumn('approved', 'Approved', 'BOOLEAN', false, 1, false);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'user', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), null, null);
        $this->addRelation('helpHourSignin', 'helpHourSignin', RelationMap::ONE_TO_MANY, array('id' => 'helphour_id', ), null, null, 'helpHourSignins');
    } // buildRelations()

} // helpHourTableMap
