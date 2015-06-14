<?php


/**
 * Base class that represents a row from the 'user' table.
 *
 *
 *
 * @package    propel.generator.cscrew.om
 */
abstract class BaseUser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'UserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the netid field.
     * @var        string
     */
    protected $netid;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the picture field.
     * @var        string
     */
    protected $picture;

    /**
     * The value for the year field.
     * @var        string
     */
    protected $year;

    /**
     * The value for the is_admin field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_admin;

    /**
     * @var        PropelObjectCollection|signIn[] Collection to store aggregation of signIn objects.
     */
    protected $collsignIns;
    protected $collsignInsPartial;

    /**
     * @var        PropelObjectCollection|UserSkill[] Collection to store aggregation of UserSkill objects.
     */
    protected $collUserSkills;
    protected $collUserSkillsPartial;

    /**
     * @var        PropelObjectCollection|helpHour[] Collection to store aggregation of helpHour objects.
     */
    protected $collhelpHours;
    protected $collhelpHoursPartial;

    /**
     * @var        PropelObjectCollection|Skill[] Collection to store aggregation of Skill objects.
     */
    protected $collSkills;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $skillsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $signInsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $userSkillsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $helpHoursScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_admin = false;
    }

    /**
     * Initializes internal state of BaseUser object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [netid] column value.
     *
     * @return string
     */
    public function getNetid()
    {

        return $this->netid;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [picture] column value.
     *
     * @return string
     */
    public function getPicture()
    {

        return $this->picture;
    }

    /**
     * Get the [year] column value.
     *
     * @return string
     */
    public function getYear()
    {

        return $this->year;
    }

    /**
     * Get the [is_admin] column value.
     *
     * @return boolean
     */
    public function getIsAdmin()
    {

        return $this->is_admin;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UserPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [netid] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setNetid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->netid !== $v) {
            $this->netid = $v;
            $this->modifiedColumns[] = UserPeer::NETID;
        }


        return $this;
    } // setNetid()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = UserPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [picture] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setPicture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->picture !== $v) {
            $this->picture = $v;
            $this->modifiedColumns[] = UserPeer::PICTURE;
        }


        return $this;
    } // setPicture()

    /**
     * Set the value of [year] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setYear($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->year !== $v) {
            $this->year = $v;
            $this->modifiedColumns[] = UserPeer::YEAR;
        }


        return $this;
    } // setYear()

    /**
     * Sets the value of the [is_admin] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setIsAdmin($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_admin !== $v) {
            $this->is_admin = $v;
            $this->modifiedColumns[] = UserPeer::IS_ADMIN;
        }


        return $this;
    } // setIsAdmin()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->is_admin !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->netid = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->picture = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->year = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->is_admin = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = UserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating User object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collsignIns = null;

            $this->collUserSkills = null;

            $this->collhelpHours = null;

            $this->collSkills = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->skillsScheduledForDeletion !== null) {
                if (!$this->skillsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->skillsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    UserSkillQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->skillsScheduledForDeletion = null;
                }

                foreach ($this->getSkills() as $skill) {
                    if ($skill->isModified()) {
                        $skill->save($con);
                    }
                }
            } elseif ($this->collSkills) {
                foreach ($this->collSkills as $skill) {
                    if ($skill->isModified()) {
                        $skill->save($con);
                    }
                }
            }

            if ($this->signInsScheduledForDeletion !== null) {
                if (!$this->signInsScheduledForDeletion->isEmpty()) {
                    signInQuery::create()
                        ->filterByPrimaryKeys($this->signInsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->signInsScheduledForDeletion = null;
                }
            }

            if ($this->collsignIns !== null) {
                foreach ($this->collsignIns as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->userSkillsScheduledForDeletion !== null) {
                if (!$this->userSkillsScheduledForDeletion->isEmpty()) {
                    UserSkillQuery::create()
                        ->filterByPrimaryKeys($this->userSkillsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->userSkillsScheduledForDeletion = null;
                }
            }

            if ($this->collUserSkills !== null) {
                foreach ($this->collUserSkills as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->helpHoursScheduledForDeletion !== null) {
                if (!$this->helpHoursScheduledForDeletion->isEmpty()) {
                    foreach ($this->helpHoursScheduledForDeletion as $helpHour) {
                        // need to save related object because we set the relation to null
                        $helpHour->save($con);
                    }
                    $this->helpHoursScheduledForDeletion = null;
                }
            }

            if ($this->collhelpHours !== null) {
                foreach ($this->collhelpHours as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UserPeer::NETID)) {
            $modifiedColumns[':p' . $index++]  = '`netid`';
        }
        if ($this->isColumnModified(UserPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(UserPeer::PICTURE)) {
            $modifiedColumns[':p' . $index++]  = '`picture`';
        }
        if ($this->isColumnModified(UserPeer::YEAR)) {
            $modifiedColumns[':p' . $index++]  = '`year`';
        }
        if ($this->isColumnModified(UserPeer::IS_ADMIN)) {
            $modifiedColumns[':p' . $index++]  = '`is_admin`';
        }

        $sql = sprintf(
            'INSERT INTO `user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`netid`':
                        $stmt->bindValue($identifier, $this->netid, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`picture`':
                        $stmt->bindValue($identifier, $this->picture, PDO::PARAM_STR);
                        break;
                    case '`year`':
                        $stmt->bindValue($identifier, $this->year, PDO::PARAM_STR);
                        break;
                    case '`is_admin`':
                        $stmt->bindValue($identifier, (int) $this->is_admin, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collsignIns !== null) {
                    foreach ($this->collsignIns as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUserSkills !== null) {
                    foreach ($this->collUserSkills as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collhelpHours !== null) {
                    foreach ($this->collhelpHours as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getNetid();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getPicture();
                break;
            case 4:
                return $this->getYear();
                break;
            case 5:
                return $this->getIsAdmin();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
        $keys = UserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNetid(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getPicture(),
            $keys[4] => $this->getYear(),
            $keys[5] => $this->getIsAdmin(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collsignIns) {
                $result['signIns'] = $this->collsignIns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUserSkills) {
                $result['UserSkills'] = $this->collUserSkills->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collhelpHours) {
                $result['helpHours'] = $this->collhelpHours->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNetid($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setPicture($value);
                break;
            case 4:
                $this->setYear($value);
                break;
            case 5:
                $this->setIsAdmin($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = UserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNetid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPicture($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setYear($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIsAdmin($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
        if ($this->isColumnModified(UserPeer::NETID)) $criteria->add(UserPeer::NETID, $this->netid);
        if ($this->isColumnModified(UserPeer::NAME)) $criteria->add(UserPeer::NAME, $this->name);
        if ($this->isColumnModified(UserPeer::PICTURE)) $criteria->add(UserPeer::PICTURE, $this->picture);
        if ($this->isColumnModified(UserPeer::YEAR)) $criteria->add(UserPeer::YEAR, $this->year);
        if ($this->isColumnModified(UserPeer::IS_ADMIN)) $criteria->add(UserPeer::IS_ADMIN, $this->is_admin);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);
        $criteria->add(UserPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of User (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNetid($this->getNetid());
        $copyObj->setName($this->getName());
        $copyObj->setPicture($this->getPicture());
        $copyObj->setYear($this->getYear());
        $copyObj->setIsAdmin($this->getIsAdmin());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getsignIns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsignIn($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUserSkills() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserSkill($relObj->copy($deepCopy));
                }
            }

            foreach ($this->gethelpHours() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addhelpHour($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return User Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return UserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('signIn' == $relationName) {
            $this->initsignIns();
        }
        if ('UserSkill' == $relationName) {
            $this->initUserSkills();
        }
        if ('helpHour' == $relationName) {
            $this->inithelpHours();
        }
    }

    /**
     * Clears out the collsignIns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addsignIns()
     */
    public function clearsignIns()
    {
        $this->collsignIns = null; // important to set this to null since that means it is uninitialized
        $this->collsignInsPartial = null;

        return $this;
    }

    /**
     * reset is the collsignIns collection loaded partially
     *
     * @return void
     */
    public function resetPartialsignIns($v = true)
    {
        $this->collsignInsPartial = $v;
    }

    /**
     * Initializes the collsignIns collection.
     *
     * By default this just sets the collsignIns collection to an empty array (like clearcollsignIns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsignIns($overrideExisting = true)
    {
        if (null !== $this->collsignIns && !$overrideExisting) {
            return;
        }
        $this->collsignIns = new PropelObjectCollection();
        $this->collsignIns->setModel('signIn');
    }

    /**
     * Gets an array of signIn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|signIn[] List of signIn objects
     * @throws PropelException
     */
    public function getsignIns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collsignInsPartial && !$this->isNew();
        if (null === $this->collsignIns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collsignIns) {
                // return empty collection
                $this->initsignIns();
            } else {
                $collsignIns = signInQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collsignInsPartial && count($collsignIns)) {
                      $this->initsignIns(false);

                      foreach ($collsignIns as $obj) {
                        if (false == $this->collsignIns->contains($obj)) {
                          $this->collsignIns->append($obj);
                        }
                      }

                      $this->collsignInsPartial = true;
                    }

                    $collsignIns->getInternalIterator()->rewind();

                    return $collsignIns;
                }

                if ($partial && $this->collsignIns) {
                    foreach ($this->collsignIns as $obj) {
                        if ($obj->isNew()) {
                            $collsignIns[] = $obj;
                        }
                    }
                }

                $this->collsignIns = $collsignIns;
                $this->collsignInsPartial = false;
            }
        }

        return $this->collsignIns;
    }

    /**
     * Sets a collection of signIn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $signIns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setsignIns(PropelCollection $signIns, PropelPDO $con = null)
    {
        $signInsToDelete = $this->getsignIns(new Criteria(), $con)->diff($signIns);


        $this->signInsScheduledForDeletion = $signInsToDelete;

        foreach ($signInsToDelete as $signInRemoved) {
            $signInRemoved->setUser(null);
        }

        $this->collsignIns = null;
        foreach ($signIns as $signIn) {
            $this->addsignIn($signIn);
        }

        $this->collsignIns = $signIns;
        $this->collsignInsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related signIn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related signIn objects.
     * @throws PropelException
     */
    public function countsignIns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collsignInsPartial && !$this->isNew();
        if (null === $this->collsignIns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collsignIns) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getsignIns());
            }
            $query = signInQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collsignIns);
    }

    /**
     * Method called to associate a signIn object to this object
     * through the signIn foreign key attribute.
     *
     * @param    signIn $l signIn
     * @return User The current object (for fluent API support)
     */
    public function addsignIn(signIn $l)
    {
        if ($this->collsignIns === null) {
            $this->initsignIns();
            $this->collsignInsPartial = true;
        }

        if (!in_array($l, $this->collsignIns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddsignIn($l);

            if ($this->signInsScheduledForDeletion and $this->signInsScheduledForDeletion->contains($l)) {
                $this->signInsScheduledForDeletion->remove($this->signInsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	signIn $signIn The signIn object to add.
     */
    protected function doAddsignIn($signIn)
    {
        $this->collsignIns[]= $signIn;
        $signIn->setUser($this);
    }

    /**
     * @param	signIn $signIn The signIn object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removesignIn($signIn)
    {
        if ($this->getsignIns()->contains($signIn)) {
            $this->collsignIns->remove($this->collsignIns->search($signIn));
            if (null === $this->signInsScheduledForDeletion) {
                $this->signInsScheduledForDeletion = clone $this->collsignIns;
                $this->signInsScheduledForDeletion->clear();
            }
            $this->signInsScheduledForDeletion[]= clone $signIn;
            $signIn->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related signIns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|signIn[] List of signIn objects
     */
    public function getsignInsJoinsignInReason($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = signInQuery::create(null, $criteria);
        $query->joinWith('signInReason', $join_behavior);

        return $this->getsignIns($query, $con);
    }

    /**
     * Clears out the collUserSkills collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUserSkills()
     */
    public function clearUserSkills()
    {
        $this->collUserSkills = null; // important to set this to null since that means it is uninitialized
        $this->collUserSkillsPartial = null;

        return $this;
    }

    /**
     * reset is the collUserSkills collection loaded partially
     *
     * @return void
     */
    public function resetPartialUserSkills($v = true)
    {
        $this->collUserSkillsPartial = $v;
    }

    /**
     * Initializes the collUserSkills collection.
     *
     * By default this just sets the collUserSkills collection to an empty array (like clearcollUserSkills());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserSkills($overrideExisting = true)
    {
        if (null !== $this->collUserSkills && !$overrideExisting) {
            return;
        }
        $this->collUserSkills = new PropelObjectCollection();
        $this->collUserSkills->setModel('UserSkill');
    }

    /**
     * Gets an array of UserSkill objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UserSkill[] List of UserSkill objects
     * @throws PropelException
     */
    public function getUserSkills($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUserSkillsPartial && !$this->isNew();
        if (null === $this->collUserSkills || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUserSkills) {
                // return empty collection
                $this->initUserSkills();
            } else {
                $collUserSkills = UserSkillQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUserSkillsPartial && count($collUserSkills)) {
                      $this->initUserSkills(false);

                      foreach ($collUserSkills as $obj) {
                        if (false == $this->collUserSkills->contains($obj)) {
                          $this->collUserSkills->append($obj);
                        }
                      }

                      $this->collUserSkillsPartial = true;
                    }

                    $collUserSkills->getInternalIterator()->rewind();

                    return $collUserSkills;
                }

                if ($partial && $this->collUserSkills) {
                    foreach ($this->collUserSkills as $obj) {
                        if ($obj->isNew()) {
                            $collUserSkills[] = $obj;
                        }
                    }
                }

                $this->collUserSkills = $collUserSkills;
                $this->collUserSkillsPartial = false;
            }
        }

        return $this->collUserSkills;
    }

    /**
     * Sets a collection of UserSkill objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $userSkills A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setUserSkills(PropelCollection $userSkills, PropelPDO $con = null)
    {
        $userSkillsToDelete = $this->getUserSkills(new Criteria(), $con)->diff($userSkills);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->userSkillsScheduledForDeletion = clone $userSkillsToDelete;

        foreach ($userSkillsToDelete as $userSkillRemoved) {
            $userSkillRemoved->setUser(null);
        }

        $this->collUserSkills = null;
        foreach ($userSkills as $userSkill) {
            $this->addUserSkill($userSkill);
        }

        $this->collUserSkills = $userSkills;
        $this->collUserSkillsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UserSkill objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UserSkill objects.
     * @throws PropelException
     */
    public function countUserSkills(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUserSkillsPartial && !$this->isNew();
        if (null === $this->collUserSkills || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserSkills) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserSkills());
            }
            $query = UserSkillQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collUserSkills);
    }

    /**
     * Method called to associate a UserSkill object to this object
     * through the UserSkill foreign key attribute.
     *
     * @param    UserSkill $l UserSkill
     * @return User The current object (for fluent API support)
     */
    public function addUserSkill(UserSkill $l)
    {
        if ($this->collUserSkills === null) {
            $this->initUserSkills();
            $this->collUserSkillsPartial = true;
        }

        if (!in_array($l, $this->collUserSkills->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUserSkill($l);

            if ($this->userSkillsScheduledForDeletion and $this->userSkillsScheduledForDeletion->contains($l)) {
                $this->userSkillsScheduledForDeletion->remove($this->userSkillsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UserSkill $userSkill The userSkill object to add.
     */
    protected function doAddUserSkill($userSkill)
    {
        $this->collUserSkills[]= $userSkill;
        $userSkill->setUser($this);
    }

    /**
     * @param	UserSkill $userSkill The userSkill object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUserSkill($userSkill)
    {
        if ($this->getUserSkills()->contains($userSkill)) {
            $this->collUserSkills->remove($this->collUserSkills->search($userSkill));
            if (null === $this->userSkillsScheduledForDeletion) {
                $this->userSkillsScheduledForDeletion = clone $this->collUserSkills;
                $this->userSkillsScheduledForDeletion->clear();
            }
            $this->userSkillsScheduledForDeletion[]= clone $userSkill;
            $userSkill->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related UserSkills from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UserSkill[] List of UserSkill objects
     */
    public function getUserSkillsJoinSkill($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UserSkillQuery::create(null, $criteria);
        $query->joinWith('Skill', $join_behavior);

        return $this->getUserSkills($query, $con);
    }

    /**
     * Clears out the collhelpHours collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addhelpHours()
     */
    public function clearhelpHours()
    {
        $this->collhelpHours = null; // important to set this to null since that means it is uninitialized
        $this->collhelpHoursPartial = null;

        return $this;
    }

    /**
     * reset is the collhelpHours collection loaded partially
     *
     * @return void
     */
    public function resetPartialhelpHours($v = true)
    {
        $this->collhelpHoursPartial = $v;
    }

    /**
     * Initializes the collhelpHours collection.
     *
     * By default this just sets the collhelpHours collection to an empty array (like clearcollhelpHours());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function inithelpHours($overrideExisting = true)
    {
        if (null !== $this->collhelpHours && !$overrideExisting) {
            return;
        }
        $this->collhelpHours = new PropelObjectCollection();
        $this->collhelpHours->setModel('helpHour');
    }

    /**
     * Gets an array of helpHour objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|helpHour[] List of helpHour objects
     * @throws PropelException
     */
    public function gethelpHours($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collhelpHoursPartial && !$this->isNew();
        if (null === $this->collhelpHours || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collhelpHours) {
                // return empty collection
                $this->inithelpHours();
            } else {
                $collhelpHours = helpHourQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collhelpHoursPartial && count($collhelpHours)) {
                      $this->inithelpHours(false);

                      foreach ($collhelpHours as $obj) {
                        if (false == $this->collhelpHours->contains($obj)) {
                          $this->collhelpHours->append($obj);
                        }
                      }

                      $this->collhelpHoursPartial = true;
                    }

                    $collhelpHours->getInternalIterator()->rewind();

                    return $collhelpHours;
                }

                if ($partial && $this->collhelpHours) {
                    foreach ($this->collhelpHours as $obj) {
                        if ($obj->isNew()) {
                            $collhelpHours[] = $obj;
                        }
                    }
                }

                $this->collhelpHours = $collhelpHours;
                $this->collhelpHoursPartial = false;
            }
        }

        return $this->collhelpHours;
    }

    /**
     * Sets a collection of helpHour objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $helpHours A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function sethelpHours(PropelCollection $helpHours, PropelPDO $con = null)
    {
        $helpHoursToDelete = $this->gethelpHours(new Criteria(), $con)->diff($helpHours);


        $this->helpHoursScheduledForDeletion = $helpHoursToDelete;

        foreach ($helpHoursToDelete as $helpHourRemoved) {
            $helpHourRemoved->setUser(null);
        }

        $this->collhelpHours = null;
        foreach ($helpHours as $helpHour) {
            $this->addhelpHour($helpHour);
        }

        $this->collhelpHours = $helpHours;
        $this->collhelpHoursPartial = false;

        return $this;
    }

    /**
     * Returns the number of related helpHour objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related helpHour objects.
     * @throws PropelException
     */
    public function counthelpHours(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collhelpHoursPartial && !$this->isNew();
        if (null === $this->collhelpHours || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collhelpHours) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->gethelpHours());
            }
            $query = helpHourQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collhelpHours);
    }

    /**
     * Method called to associate a helpHour object to this object
     * through the helpHour foreign key attribute.
     *
     * @param    helpHour $l helpHour
     * @return User The current object (for fluent API support)
     */
    public function addhelpHour(helpHour $l)
    {
        if ($this->collhelpHours === null) {
            $this->inithelpHours();
            $this->collhelpHoursPartial = true;
        }

        if (!in_array($l, $this->collhelpHours->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddhelpHour($l);

            if ($this->helpHoursScheduledForDeletion and $this->helpHoursScheduledForDeletion->contains($l)) {
                $this->helpHoursScheduledForDeletion->remove($this->helpHoursScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	helpHour $helpHour The helpHour object to add.
     */
    protected function doAddhelpHour($helpHour)
    {
        $this->collhelpHours[]= $helpHour;
        $helpHour->setUser($this);
    }

    /**
     * @param	helpHour $helpHour The helpHour object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removehelpHour($helpHour)
    {
        if ($this->gethelpHours()->contains($helpHour)) {
            $this->collhelpHours->remove($this->collhelpHours->search($helpHour));
            if (null === $this->helpHoursScheduledForDeletion) {
                $this->helpHoursScheduledForDeletion = clone $this->collhelpHours;
                $this->helpHoursScheduledForDeletion->clear();
            }
            $this->helpHoursScheduledForDeletion[]= $helpHour;
            $helpHour->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collSkills collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addSkills()
     */
    public function clearSkills()
    {
        $this->collSkills = null; // important to set this to null since that means it is uninitialized
        $this->collSkillsPartial = null;

        return $this;
    }

    /**
     * Initializes the collSkills collection.
     *
     * By default this just sets the collSkills collection to an empty collection (like clearSkills());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSkills()
    {
        $this->collSkills = new PropelObjectCollection();
        $this->collSkills->setModel('Skill');
    }

    /**
     * Gets a collection of Skill objects related by a many-to-many relationship
     * to the current object by way of the user_skill cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Skill[] List of Skill objects
     */
    public function getSkills($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSkills || null !== $criteria) {
            if ($this->isNew() && null === $this->collSkills) {
                // return empty collection
                $this->initSkills();
            } else {
                $collSkills = SkillQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSkills;
                }
                $this->collSkills = $collSkills;
            }
        }

        return $this->collSkills;
    }

    /**
     * Sets a collection of Skill objects related by a many-to-many relationship
     * to the current object by way of the user_skill cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $skills A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setSkills(PropelCollection $skills, PropelPDO $con = null)
    {
        $this->clearSkills();
        $currentSkills = $this->getSkills(null, $con);

        $this->skillsScheduledForDeletion = $currentSkills->diff($skills);

        foreach ($skills as $skill) {
            if (!$currentSkills->contains($skill)) {
                $this->doAddSkill($skill);
            }
        }

        $this->collSkills = $skills;

        return $this;
    }

    /**
     * Gets the number of Skill objects related by a many-to-many relationship
     * to the current object by way of the user_skill cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Skill objects
     */
    public function countSkills($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSkills || null !== $criteria) {
            if ($this->isNew() && null === $this->collSkills) {
                return 0;
            } else {
                $query = SkillQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collSkills);
        }
    }

    /**
     * Associate a Skill object to this object
     * through the user_skill cross reference table.
     *
     * @param  Skill $skill The UserSkill object to relate
     * @return User The current object (for fluent API support)
     */
    public function addSkill(Skill $skill)
    {
        if ($this->collSkills === null) {
            $this->initSkills();
        }

        if (!$this->collSkills->contains($skill)) { // only add it if the **same** object is not already associated
            $this->doAddSkill($skill);
            $this->collSkills[] = $skill;

            if ($this->skillsScheduledForDeletion and $this->skillsScheduledForDeletion->contains($skill)) {
                $this->skillsScheduledForDeletion->remove($this->skillsScheduledForDeletion->search($skill));
            }
        }

        return $this;
    }

    /**
     * @param	Skill $skill The skill object to add.
     */
    protected function doAddSkill(Skill $skill)
    {
        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$skill->getUsers()->contains($this)) { $userSkill = new UserSkill();
            $userSkill->setSkill($skill);
            $this->addUserSkill($userSkill);

            $foreignCollection = $skill->getUsers();
            $foreignCollection[] = $this;
        }
    }

    /**
     * Remove a Skill object to this object
     * through the user_skill cross reference table.
     *
     * @param Skill $skill The UserSkill object to relate
     * @return User The current object (for fluent API support)
     */
    public function removeSkill(Skill $skill)
    {
        if ($this->getSkills()->contains($skill)) {
            $this->collSkills->remove($this->collSkills->search($skill));
            if (null === $this->skillsScheduledForDeletion) {
                $this->skillsScheduledForDeletion = clone $this->collSkills;
                $this->skillsScheduledForDeletion->clear();
            }
            $this->skillsScheduledForDeletion[]= $skill;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->netid = null;
        $this->name = null;
        $this->picture = null;
        $this->year = null;
        $this->is_admin = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collsignIns) {
                foreach ($this->collsignIns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUserSkills) {
                foreach ($this->collUserSkills as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collhelpHours) {
                foreach ($this->collhelpHours as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSkills) {
                foreach ($this->collSkills as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collsignIns instanceof PropelCollection) {
            $this->collsignIns->clearIterator();
        }
        $this->collsignIns = null;
        if ($this->collUserSkills instanceof PropelCollection) {
            $this->collUserSkills->clearIterator();
        }
        $this->collUserSkills = null;
        if ($this->collhelpHours instanceof PropelCollection) {
            $this->collhelpHours->clearIterator();
        }
        $this->collhelpHours = null;
        if ($this->collSkills instanceof PropelCollection) {
            $this->collSkills->clearIterator();
        }
        $this->collSkills = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
