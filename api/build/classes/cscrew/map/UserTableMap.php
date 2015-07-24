<?php



/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'cscrew.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('cscrew');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('netid', 'Netid', 'VARCHAR', true, 10, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', false, null, null);
        $this->addColumn('picture', 'Picture', 'LONGVARCHAR', false, null, null);
        $this->addColumn('year', 'Year', 'LONGVARCHAR', false, null, null);
        $this->addColumn('is_admin', 'IsAdmin', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('signIn', 'signIn', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'signIns');
        $this->addRelation('UserSkill', 'UserSkill', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'UserSkills');
        $this->addRelation('helpHour', 'helpHour', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'helpHours');
        $this->addRelation('memberProfile', 'memberProfile', RelationMap::ONE_TO_ONE, array('id' => 'id', ), null, null);
        $this->addRelation('Skill', 'Skill', RelationMap::MANY_TO_MANY, array(), null, null, 'Skills');
    } // buildRelations()

} // UserTableMap
