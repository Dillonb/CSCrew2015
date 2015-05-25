<?php


/**
 * Base class that represents a row from the 'helphour' table.
 *
 *
 *
 * @package    propel.generator.cscrew.om
 */
abstract class BasehelpHour extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'helpHourPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        helpHourPeer
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
     * The value for the monday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $monday;

    /**
     * The value for the tuesday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $tuesday;

    /**
     * The value for the wednesday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $wednesday;

    /**
     * The value for the thursday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $thursday;

    /**
     * The value for the friday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $friday;

    /**
     * The value for the saturday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $saturday;

    /**
     * The value for the sunday field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $sunday;

    /**
     * The value for the start_time field.
     * @var        string
     */
    protected $start_time;

    /**
     * The value for the end_time field.
     * @var        string
     */
    protected $end_time;

    /**
     * The value for the end_date field.
     * @var        string
     */
    protected $end_date;

    /**
     * The value for the approved field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $approved;

    /**
     * The value for the user_id field.
     * @var        int
     */
    protected $user_id;

    /**
     * @var        User
     */
    protected $aUser;

    /**
     * @var        PropelObjectCollection|helpHourSignin[] Collection to store aggregation of helpHourSignin objects.
     */
    protected $collhelpHourSignins;
    protected $collhelpHourSigninsPartial;

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
    protected $helpHourSigninsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->monday = false;
        $this->tuesday = false;
        $this->wednesday = false;
        $this->thursday = false;
        $this->friday = false;
        $this->saturday = false;
        $this->sunday = false;
        $this->approved = false;
    }

    /**
     * Initializes internal state of BasehelpHour object.
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
     * Get the [monday] column value.
     *
     * @return boolean
     */
    public function getMonday()
    {

        return $this->monday;
    }

    /**
     * Get the [tuesday] column value.
     *
     * @return boolean
     */
    public function getTuesday()
    {

        return $this->tuesday;
    }

    /**
     * Get the [wednesday] column value.
     *
     * @return boolean
     */
    public function getWednesday()
    {

        return $this->wednesday;
    }

    /**
     * Get the [thursday] column value.
     *
     * @return boolean
     */
    public function getThursday()
    {

        return $this->thursday;
    }

    /**
     * Get the [friday] column value.
     *
     * @return boolean
     */
    public function getFriday()
    {

        return $this->friday;
    }

    /**
     * Get the [saturday] column value.
     *
     * @return boolean
     */
    public function getSaturday()
    {

        return $this->saturday;
    }

    /**
     * Get the [sunday] column value.
     *
     * @return boolean
     */
    public function getSunday()
    {

        return $this->sunday;
    }

    /**
     * Get the [optionally formatted] temporal [start_time] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStartTime($format = '%X')
    {
        if ($this->start_time === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->start_time);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->start_time, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [end_time] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEndTime($format = '%X')
    {
        if ($this->end_time === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->end_time);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->end_time, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [end_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEndDate($format = '%x')
    {
        if ($this->end_date === null) {
            return null;
        }

        if ($this->end_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->end_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->end_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [approved] column value.
     *
     * @return boolean
     */
    public function getApproved()
    {

        return $this->approved;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {

        return $this->user_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = helpHourPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of the [monday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setMonday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->monday !== $v) {
            $this->monday = $v;
            $this->modifiedColumns[] = helpHourPeer::MONDAY;
        }


        return $this;
    } // setMonday()

    /**
     * Sets the value of the [tuesday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setTuesday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->tuesday !== $v) {
            $this->tuesday = $v;
            $this->modifiedColumns[] = helpHourPeer::TUESDAY;
        }


        return $this;
    } // setTuesday()

    /**
     * Sets the value of the [wednesday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setWednesday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->wednesday !== $v) {
            $this->wednesday = $v;
            $this->modifiedColumns[] = helpHourPeer::WEDNESDAY;
        }


        return $this;
    } // setWednesday()

    /**
     * Sets the value of the [thursday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setThursday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->thursday !== $v) {
            $this->thursday = $v;
            $this->modifiedColumns[] = helpHourPeer::THURSDAY;
        }


        return $this;
    } // setThursday()

    /**
     * Sets the value of the [friday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setFriday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->friday !== $v) {
            $this->friday = $v;
            $this->modifiedColumns[] = helpHourPeer::FRIDAY;
        }


        return $this;
    } // setFriday()

    /**
     * Sets the value of the [saturday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setSaturday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->saturday !== $v) {
            $this->saturday = $v;
            $this->modifiedColumns[] = helpHourPeer::SATURDAY;
        }


        return $this;
    } // setSaturday()

    /**
     * Sets the value of the [sunday] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setSunday($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->sunday !== $v) {
            $this->sunday = $v;
            $this->modifiedColumns[] = helpHourPeer::SUNDAY;
        }


        return $this;
    } // setSunday()

    /**
     * Sets the value of [start_time] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return helpHour The current object (for fluent API support)
     */
    public function setStartTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->start_time !== null || $dt !== null) {
            $currentDateAsString = ($this->start_time !== null && $tmpDt = new DateTime($this->start_time)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->start_time = $newDateAsString;
                $this->modifiedColumns[] = helpHourPeer::START_TIME;
            }
        } // if either are not null


        return $this;
    } // setStartTime()

    /**
     * Sets the value of [end_time] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return helpHour The current object (for fluent API support)
     */
    public function setEndTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end_time !== null || $dt !== null) {
            $currentDateAsString = ($this->end_time !== null && $tmpDt = new DateTime($this->end_time)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->end_time = $newDateAsString;
                $this->modifiedColumns[] = helpHourPeer::END_TIME;
            }
        } // if either are not null


        return $this;
    } // setEndTime()

    /**
     * Sets the value of [end_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return helpHour The current object (for fluent API support)
     */
    public function setEndDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end_date !== null || $dt !== null) {
            $currentDateAsString = ($this->end_date !== null && $tmpDt = new DateTime($this->end_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->end_date = $newDateAsString;
                $this->modifiedColumns[] = helpHourPeer::END_DATE;
            }
        } // if either are not null


        return $this;
    } // setEndDate()

    /**
     * Sets the value of the [approved] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setApproved($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->approved !== $v) {
            $this->approved = $v;
            $this->modifiedColumns[] = helpHourPeer::APPROVED;
        }


        return $this;
    } // setApproved()

    /**
     * Set the value of [user_id] column.
     *
     * @param  int $v new value
     * @return helpHour The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[] = helpHourPeer::USER_ID;
        }

        if ($this->aUser !== null && $this->aUser->getId() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setUserId()

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
            if ($this->monday !== false) {
                return false;
            }

            if ($this->tuesday !== false) {
                return false;
            }

            if ($this->wednesday !== false) {
                return false;
            }

            if ($this->thursday !== false) {
                return false;
            }

            if ($this->friday !== false) {
                return false;
            }

            if ($this->saturday !== false) {
                return false;
            }

            if ($this->sunday !== false) {
                return false;
            }

            if ($this->approved !== false) {
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
            $this->monday = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->tuesday = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->wednesday = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->thursday = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->friday = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->saturday = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->sunday = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->start_time = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->end_time = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->end_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->approved = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->user_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = helpHourPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating helpHour object", $e);
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

        if ($this->aUser !== null && $this->user_id !== $this->aUser->getId()) {
            $this->aUser = null;
        }
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
            $con = Propel::getConnection(helpHourPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = helpHourPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->collhelpHourSignins = null;

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
            $con = Propel::getConnection(helpHourPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = helpHourQuery::create()
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
            $con = Propel::getConnection(helpHourPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                helpHourPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

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

            if ($this->helpHourSigninsScheduledForDeletion !== null) {
                if (!$this->helpHourSigninsScheduledForDeletion->isEmpty()) {
                    foreach ($this->helpHourSigninsScheduledForDeletion as $helpHourSignin) {
                        // need to save related object because we set the relation to null
                        $helpHourSignin->save($con);
                    }
                    $this->helpHourSigninsScheduledForDeletion = null;
                }
            }

            if ($this->collhelpHourSignins !== null) {
                foreach ($this->collhelpHourSignins as $referrerFK) {
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

        $this->modifiedColumns[] = helpHourPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . helpHourPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(helpHourPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(helpHourPeer::MONDAY)) {
            $modifiedColumns[':p' . $index++]  = '`monday`';
        }
        if ($this->isColumnModified(helpHourPeer::TUESDAY)) {
            $modifiedColumns[':p' . $index++]  = '`tuesday`';
        }
        if ($this->isColumnModified(helpHourPeer::WEDNESDAY)) {
            $modifiedColumns[':p' . $index++]  = '`wednesday`';
        }
        if ($this->isColumnModified(helpHourPeer::THURSDAY)) {
            $modifiedColumns[':p' . $index++]  = '`thursday`';
        }
        if ($this->isColumnModified(helpHourPeer::FRIDAY)) {
            $modifiedColumns[':p' . $index++]  = '`friday`';
        }
        if ($this->isColumnModified(helpHourPeer::SATURDAY)) {
            $modifiedColumns[':p' . $index++]  = '`saturday`';
        }
        if ($this->isColumnModified(helpHourPeer::SUNDAY)) {
            $modifiedColumns[':p' . $index++]  = '`sunday`';
        }
        if ($this->isColumnModified(helpHourPeer::START_TIME)) {
            $modifiedColumns[':p' . $index++]  = '`start_time`';
        }
        if ($this->isColumnModified(helpHourPeer::END_TIME)) {
            $modifiedColumns[':p' . $index++]  = '`end_time`';
        }
        if ($this->isColumnModified(helpHourPeer::END_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`end_date`';
        }
        if ($this->isColumnModified(helpHourPeer::APPROVED)) {
            $modifiedColumns[':p' . $index++]  = '`approved`';
        }
        if ($this->isColumnModified(helpHourPeer::USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`user_id`';
        }

        $sql = sprintf(
            'INSERT INTO `helphour` (%s) VALUES (%s)',
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
                    case '`monday`':
                        $stmt->bindValue($identifier, (int) $this->monday, PDO::PARAM_INT);
                        break;
                    case '`tuesday`':
                        $stmt->bindValue($identifier, (int) $this->tuesday, PDO::PARAM_INT);
                        break;
                    case '`wednesday`':
                        $stmt->bindValue($identifier, (int) $this->wednesday, PDO::PARAM_INT);
                        break;
                    case '`thursday`':
                        $stmt->bindValue($identifier, (int) $this->thursday, PDO::PARAM_INT);
                        break;
                    case '`friday`':
                        $stmt->bindValue($identifier, (int) $this->friday, PDO::PARAM_INT);
                        break;
                    case '`saturday`':
                        $stmt->bindValue($identifier, (int) $this->saturday, PDO::PARAM_INT);
                        break;
                    case '`sunday`':
                        $stmt->bindValue($identifier, (int) $this->sunday, PDO::PARAM_INT);
                        break;
                    case '`start_time`':
                        $stmt->bindValue($identifier, $this->start_time, PDO::PARAM_STR);
                        break;
                    case '`end_time`':
                        $stmt->bindValue($identifier, $this->end_time, PDO::PARAM_STR);
                        break;
                    case '`end_date`':
                        $stmt->bindValue($identifier, $this->end_date, PDO::PARAM_STR);
                        break;
                    case '`approved`':
                        $stmt->bindValue($identifier, (int) $this->approved, PDO::PARAM_INT);
                        break;
                    case '`user_id`':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = helpHourPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collhelpHourSignins !== null) {
                    foreach ($this->collhelpHourSignins as $referrerFK) {
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
        $pos = helpHourPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMonday();
                break;
            case 2:
                return $this->getTuesday();
                break;
            case 3:
                return $this->getWednesday();
                break;
            case 4:
                return $this->getThursday();
                break;
            case 5:
                return $this->getFriday();
                break;
            case 6:
                return $this->getSaturday();
                break;
            case 7:
                return $this->getSunday();
                break;
            case 8:
                return $this->getStartTime();
                break;
            case 9:
                return $this->getEndTime();
                break;
            case 10:
                return $this->getEndDate();
                break;
            case 11:
                return $this->getApproved();
                break;
            case 12:
                return $this->getUserId();
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
        if (isset($alreadyDumpedObjects['helpHour'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['helpHour'][$this->getPrimaryKey()] = true;
        $keys = helpHourPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMonday(),
            $keys[2] => $this->getTuesday(),
            $keys[3] => $this->getWednesday(),
            $keys[4] => $this->getThursday(),
            $keys[5] => $this->getFriday(),
            $keys[6] => $this->getSaturday(),
            $keys[7] => $this->getSunday(),
            $keys[8] => $this->getStartTime(),
            $keys[9] => $this->getEndTime(),
            $keys[10] => $this->getEndDate(),
            $keys[11] => $this->getApproved(),
            $keys[12] => $this->getUserId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collhelpHourSignins) {
                $result['helpHourSignins'] = $this->collhelpHourSignins->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = helpHourPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMonday($value);
                break;
            case 2:
                $this->setTuesday($value);
                break;
            case 3:
                $this->setWednesday($value);
                break;
            case 4:
                $this->setThursday($value);
                break;
            case 5:
                $this->setFriday($value);
                break;
            case 6:
                $this->setSaturday($value);
                break;
            case 7:
                $this->setSunday($value);
                break;
            case 8:
                $this->setStartTime($value);
                break;
            case 9:
                $this->setEndTime($value);
                break;
            case 10:
                $this->setEndDate($value);
                break;
            case 11:
                $this->setApproved($value);
                break;
            case 12:
                $this->setUserId($value);
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
        $keys = helpHourPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMonday($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTuesday($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setWednesday($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setThursday($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFriday($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSaturday($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSunday($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setStartTime($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setEndTime($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setEndDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setApproved($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUserId($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(helpHourPeer::DATABASE_NAME);

        if ($this->isColumnModified(helpHourPeer::ID)) $criteria->add(helpHourPeer::ID, $this->id);
        if ($this->isColumnModified(helpHourPeer::MONDAY)) $criteria->add(helpHourPeer::MONDAY, $this->monday);
        if ($this->isColumnModified(helpHourPeer::TUESDAY)) $criteria->add(helpHourPeer::TUESDAY, $this->tuesday);
        if ($this->isColumnModified(helpHourPeer::WEDNESDAY)) $criteria->add(helpHourPeer::WEDNESDAY, $this->wednesday);
        if ($this->isColumnModified(helpHourPeer::THURSDAY)) $criteria->add(helpHourPeer::THURSDAY, $this->thursday);
        if ($this->isColumnModified(helpHourPeer::FRIDAY)) $criteria->add(helpHourPeer::FRIDAY, $this->friday);
        if ($this->isColumnModified(helpHourPeer::SATURDAY)) $criteria->add(helpHourPeer::SATURDAY, $this->saturday);
        if ($this->isColumnModified(helpHourPeer::SUNDAY)) $criteria->add(helpHourPeer::SUNDAY, $this->sunday);
        if ($this->isColumnModified(helpHourPeer::START_TIME)) $criteria->add(helpHourPeer::START_TIME, $this->start_time);
        if ($this->isColumnModified(helpHourPeer::END_TIME)) $criteria->add(helpHourPeer::END_TIME, $this->end_time);
        if ($this->isColumnModified(helpHourPeer::END_DATE)) $criteria->add(helpHourPeer::END_DATE, $this->end_date);
        if ($this->isColumnModified(helpHourPeer::APPROVED)) $criteria->add(helpHourPeer::APPROVED, $this->approved);
        if ($this->isColumnModified(helpHourPeer::USER_ID)) $criteria->add(helpHourPeer::USER_ID, $this->user_id);

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
        $criteria = new Criteria(helpHourPeer::DATABASE_NAME);
        $criteria->add(helpHourPeer::ID, $this->id);

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
     * @param object $copyObj An object of helpHour (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMonday($this->getMonday());
        $copyObj->setTuesday($this->getTuesday());
        $copyObj->setWednesday($this->getWednesday());
        $copyObj->setThursday($this->getThursday());
        $copyObj->setFriday($this->getFriday());
        $copyObj->setSaturday($this->getSaturday());
        $copyObj->setSunday($this->getSunday());
        $copyObj->setStartTime($this->getStartTime());
        $copyObj->setEndTime($this->getEndTime());
        $copyObj->setEndDate($this->getEndDate());
        $copyObj->setApproved($this->getApproved());
        $copyObj->setUserId($this->getUserId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->gethelpHourSignins() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addhelpHourSignin($relObj->copy($deepCopy));
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
     * @return helpHour Clone of current object.
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
     * @return helpHourPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new helpHourPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return helpHour The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setUserId(NULL);
        } else {
            $this->setUserId($v->getId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addhelpHour($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && ($this->user_id !== null) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addhelpHours($this);
             */
        }

        return $this->aUser;
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
        if ('helpHourSignin' == $relationName) {
            $this->inithelpHourSignins();
        }
    }

    /**
     * Clears out the collhelpHourSignins collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return helpHour The current object (for fluent API support)
     * @see        addhelpHourSignins()
     */
    public function clearhelpHourSignins()
    {
        $this->collhelpHourSignins = null; // important to set this to null since that means it is uninitialized
        $this->collhelpHourSigninsPartial = null;

        return $this;
    }

    /**
     * reset is the collhelpHourSignins collection loaded partially
     *
     * @return void
     */
    public function resetPartialhelpHourSignins($v = true)
    {
        $this->collhelpHourSigninsPartial = $v;
    }

    /**
     * Initializes the collhelpHourSignins collection.
     *
     * By default this just sets the collhelpHourSignins collection to an empty array (like clearcollhelpHourSignins());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function inithelpHourSignins($overrideExisting = true)
    {
        if (null !== $this->collhelpHourSignins && !$overrideExisting) {
            return;
        }
        $this->collhelpHourSignins = new PropelObjectCollection();
        $this->collhelpHourSignins->setModel('helpHourSignin');
    }

    /**
     * Gets an array of helpHourSignin objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this helpHour is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|helpHourSignin[] List of helpHourSignin objects
     * @throws PropelException
     */
    public function gethelpHourSignins($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collhelpHourSigninsPartial && !$this->isNew();
        if (null === $this->collhelpHourSignins || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collhelpHourSignins) {
                // return empty collection
                $this->inithelpHourSignins();
            } else {
                $collhelpHourSignins = helpHourSigninQuery::create(null, $criteria)
                    ->filterByhelpHour($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collhelpHourSigninsPartial && count($collhelpHourSignins)) {
                      $this->inithelpHourSignins(false);

                      foreach ($collhelpHourSignins as $obj) {
                        if (false == $this->collhelpHourSignins->contains($obj)) {
                          $this->collhelpHourSignins->append($obj);
                        }
                      }

                      $this->collhelpHourSigninsPartial = true;
                    }

                    $collhelpHourSignins->getInternalIterator()->rewind();

                    return $collhelpHourSignins;
                }

                if ($partial && $this->collhelpHourSignins) {
                    foreach ($this->collhelpHourSignins as $obj) {
                        if ($obj->isNew()) {
                            $collhelpHourSignins[] = $obj;
                        }
                    }
                }

                $this->collhelpHourSignins = $collhelpHourSignins;
                $this->collhelpHourSigninsPartial = false;
            }
        }

        return $this->collhelpHourSignins;
    }

    /**
     * Sets a collection of helpHourSignin objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $helpHourSignins A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return helpHour The current object (for fluent API support)
     */
    public function sethelpHourSignins(PropelCollection $helpHourSignins, PropelPDO $con = null)
    {
        $helpHourSigninsToDelete = $this->gethelpHourSignins(new Criteria(), $con)->diff($helpHourSignins);


        $this->helpHourSigninsScheduledForDeletion = $helpHourSigninsToDelete;

        foreach ($helpHourSigninsToDelete as $helpHourSigninRemoved) {
            $helpHourSigninRemoved->sethelpHour(null);
        }

        $this->collhelpHourSignins = null;
        foreach ($helpHourSignins as $helpHourSignin) {
            $this->addhelpHourSignin($helpHourSignin);
        }

        $this->collhelpHourSignins = $helpHourSignins;
        $this->collhelpHourSigninsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related helpHourSignin objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related helpHourSignin objects.
     * @throws PropelException
     */
    public function counthelpHourSignins(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collhelpHourSigninsPartial && !$this->isNew();
        if (null === $this->collhelpHourSignins || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collhelpHourSignins) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->gethelpHourSignins());
            }
            $query = helpHourSigninQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByhelpHour($this)
                ->count($con);
        }

        return count($this->collhelpHourSignins);
    }

    /**
     * Method called to associate a helpHourSignin object to this object
     * through the helpHourSignin foreign key attribute.
     *
     * @param    helpHourSignin $l helpHourSignin
     * @return helpHour The current object (for fluent API support)
     */
    public function addhelpHourSignin(helpHourSignin $l)
    {
        if ($this->collhelpHourSignins === null) {
            $this->inithelpHourSignins();
            $this->collhelpHourSigninsPartial = true;
        }

        if (!in_array($l, $this->collhelpHourSignins->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddhelpHourSignin($l);

            if ($this->helpHourSigninsScheduledForDeletion and $this->helpHourSigninsScheduledForDeletion->contains($l)) {
                $this->helpHourSigninsScheduledForDeletion->remove($this->helpHourSigninsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	helpHourSignin $helpHourSignin The helpHourSignin object to add.
     */
    protected function doAddhelpHourSignin($helpHourSignin)
    {
        $this->collhelpHourSignins[]= $helpHourSignin;
        $helpHourSignin->sethelpHour($this);
    }

    /**
     * @param	helpHourSignin $helpHourSignin The helpHourSignin object to remove.
     * @return helpHour The current object (for fluent API support)
     */
    public function removehelpHourSignin($helpHourSignin)
    {
        if ($this->gethelpHourSignins()->contains($helpHourSignin)) {
            $this->collhelpHourSignins->remove($this->collhelpHourSignins->search($helpHourSignin));
            if (null === $this->helpHourSigninsScheduledForDeletion) {
                $this->helpHourSigninsScheduledForDeletion = clone $this->collhelpHourSignins;
                $this->helpHourSigninsScheduledForDeletion->clear();
            }
            $this->helpHourSigninsScheduledForDeletion[]= $helpHourSignin;
            $helpHourSignin->sethelpHour(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->monday = null;
        $this->tuesday = null;
        $this->wednesday = null;
        $this->thursday = null;
        $this->friday = null;
        $this->saturday = null;
        $this->sunday = null;
        $this->start_time = null;
        $this->end_time = null;
        $this->end_date = null;
        $this->approved = null;
        $this->user_id = null;
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
            if ($this->collhelpHourSignins) {
                foreach ($this->collhelpHourSignins as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collhelpHourSignins instanceof PropelCollection) {
            $this->collhelpHourSignins->clearIterator();
        }
        $this->collhelpHourSignins = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(helpHourPeer::DEFAULT_STRING_FORMAT);
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
