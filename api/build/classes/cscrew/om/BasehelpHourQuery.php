<?php


/**
 * Base class that represents a query for the 'helphour' table.
 *
 *
 *
 * @method helpHourQuery orderById($order = Criteria::ASC) Order by the id column
 * @method helpHourQuery orderByMonday($order = Criteria::ASC) Order by the monday column
 * @method helpHourQuery orderByTuesday($order = Criteria::ASC) Order by the tuesday column
 * @method helpHourQuery orderByWednesday($order = Criteria::ASC) Order by the wednesday column
 * @method helpHourQuery orderByThursday($order = Criteria::ASC) Order by the thursday column
 * @method helpHourQuery orderByFriday($order = Criteria::ASC) Order by the friday column
 * @method helpHourQuery orderBySaturday($order = Criteria::ASC) Order by the saturday column
 * @method helpHourQuery orderBySunday($order = Criteria::ASC) Order by the sunday column
 * @method helpHourQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method helpHourQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method helpHourQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method helpHourQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method helpHourQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method helpHourQuery groupById() Group by the id column
 * @method helpHourQuery groupByMonday() Group by the monday column
 * @method helpHourQuery groupByTuesday() Group by the tuesday column
 * @method helpHourQuery groupByWednesday() Group by the wednesday column
 * @method helpHourQuery groupByThursday() Group by the thursday column
 * @method helpHourQuery groupByFriday() Group by the friday column
 * @method helpHourQuery groupBySaturday() Group by the saturday column
 * @method helpHourQuery groupBySunday() Group by the sunday column
 * @method helpHourQuery groupByStartTime() Group by the start_time column
 * @method helpHourQuery groupByEndTime() Group by the end_time column
 * @method helpHourQuery groupByEndDate() Group by the end_date column
 * @method helpHourQuery groupByApproved() Group by the approved column
 * @method helpHourQuery groupByUserId() Group by the user_id column
 *
 * @method helpHourQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method helpHourQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method helpHourQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method helpHourQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method helpHourQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method helpHourQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method helpHourQuery leftJoinhelpHourSignin($relationAlias = null) Adds a LEFT JOIN clause to the query using the helpHourSignin relation
 * @method helpHourQuery rightJoinhelpHourSignin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the helpHourSignin relation
 * @method helpHourQuery innerJoinhelpHourSignin($relationAlias = null) Adds a INNER JOIN clause to the query using the helpHourSignin relation
 *
 * @method helpHour findOne(PropelPDO $con = null) Return the first helpHour matching the query
 * @method helpHour findOneOrCreate(PropelPDO $con = null) Return the first helpHour matching the query, or a new helpHour object populated from the query conditions when no match is found
 *
 * @method helpHour findOneByMonday(boolean $monday) Return the first helpHour filtered by the monday column
 * @method helpHour findOneByTuesday(boolean $tuesday) Return the first helpHour filtered by the tuesday column
 * @method helpHour findOneByWednesday(boolean $wednesday) Return the first helpHour filtered by the wednesday column
 * @method helpHour findOneByThursday(boolean $thursday) Return the first helpHour filtered by the thursday column
 * @method helpHour findOneByFriday(boolean $friday) Return the first helpHour filtered by the friday column
 * @method helpHour findOneBySaturday(boolean $saturday) Return the first helpHour filtered by the saturday column
 * @method helpHour findOneBySunday(boolean $sunday) Return the first helpHour filtered by the sunday column
 * @method helpHour findOneByStartTime(string $start_time) Return the first helpHour filtered by the start_time column
 * @method helpHour findOneByEndTime(string $end_time) Return the first helpHour filtered by the end_time column
 * @method helpHour findOneByEndDate(string $end_date) Return the first helpHour filtered by the end_date column
 * @method helpHour findOneByApproved(boolean $approved) Return the first helpHour filtered by the approved column
 * @method helpHour findOneByUserId(int $user_id) Return the first helpHour filtered by the user_id column
 *
 * @method array findById(int $id) Return helpHour objects filtered by the id column
 * @method array findByMonday(boolean $monday) Return helpHour objects filtered by the monday column
 * @method array findByTuesday(boolean $tuesday) Return helpHour objects filtered by the tuesday column
 * @method array findByWednesday(boolean $wednesday) Return helpHour objects filtered by the wednesday column
 * @method array findByThursday(boolean $thursday) Return helpHour objects filtered by the thursday column
 * @method array findByFriday(boolean $friday) Return helpHour objects filtered by the friday column
 * @method array findBySaturday(boolean $saturday) Return helpHour objects filtered by the saturday column
 * @method array findBySunday(boolean $sunday) Return helpHour objects filtered by the sunday column
 * @method array findByStartTime(string $start_time) Return helpHour objects filtered by the start_time column
 * @method array findByEndTime(string $end_time) Return helpHour objects filtered by the end_time column
 * @method array findByEndDate(string $end_date) Return helpHour objects filtered by the end_date column
 * @method array findByApproved(boolean $approved) Return helpHour objects filtered by the approved column
 * @method array findByUserId(int $user_id) Return helpHour objects filtered by the user_id column
 *
 * @package    propel.generator.cscrew.om
 */
abstract class BasehelpHourQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasehelpHourQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'cscrew';
        }
        if (null === $modelName) {
            $modelName = 'helpHour';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new helpHourQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   helpHourQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return helpHourQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof helpHourQuery) {
            return $criteria;
        }
        $query = new helpHourQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   helpHour|helpHour[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = helpHourPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(helpHourPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 helpHour A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 helpHour A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `start_time`, `end_time`, `end_date`, `approved`, `user_id` FROM `helphour` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new helpHour();
            $obj->hydrate($row);
            helpHourPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return helpHour|helpHour[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|helpHour[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(helpHourPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(helpHourPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(helpHourPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(helpHourPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the monday column
     *
     * Example usage:
     * <code>
     * $query->filterByMonday(true); // WHERE monday = true
     * $query->filterByMonday('yes'); // WHERE monday = true
     * </code>
     *
     * @param     boolean|string $monday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByMonday($monday = null, $comparison = null)
    {
        if (is_string($monday)) {
            $monday = in_array(strtolower($monday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::MONDAY, $monday, $comparison);
    }

    /**
     * Filter the query on the tuesday column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesday(true); // WHERE tuesday = true
     * $query->filterByTuesday('yes'); // WHERE tuesday = true
     * </code>
     *
     * @param     boolean|string $tuesday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByTuesday($tuesday = null, $comparison = null)
    {
        if (is_string($tuesday)) {
            $tuesday = in_array(strtolower($tuesday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::TUESDAY, $tuesday, $comparison);
    }

    /**
     * Filter the query on the wednesday column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesday(true); // WHERE wednesday = true
     * $query->filterByWednesday('yes'); // WHERE wednesday = true
     * </code>
     *
     * @param     boolean|string $wednesday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByWednesday($wednesday = null, $comparison = null)
    {
        if (is_string($wednesday)) {
            $wednesday = in_array(strtolower($wednesday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::WEDNESDAY, $wednesday, $comparison);
    }

    /**
     * Filter the query on the thursday column
     *
     * Example usage:
     * <code>
     * $query->filterByThursday(true); // WHERE thursday = true
     * $query->filterByThursday('yes'); // WHERE thursday = true
     * </code>
     *
     * @param     boolean|string $thursday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByThursday($thursday = null, $comparison = null)
    {
        if (is_string($thursday)) {
            $thursday = in_array(strtolower($thursday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::THURSDAY, $thursday, $comparison);
    }

    /**
     * Filter the query on the friday column
     *
     * Example usage:
     * <code>
     * $query->filterByFriday(true); // WHERE friday = true
     * $query->filterByFriday('yes'); // WHERE friday = true
     * </code>
     *
     * @param     boolean|string $friday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByFriday($friday = null, $comparison = null)
    {
        if (is_string($friday)) {
            $friday = in_array(strtolower($friday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::FRIDAY, $friday, $comparison);
    }

    /**
     * Filter the query on the saturday column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturday(true); // WHERE saturday = true
     * $query->filterBySaturday('yes'); // WHERE saturday = true
     * </code>
     *
     * @param     boolean|string $saturday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterBySaturday($saturday = null, $comparison = null)
    {
        if (is_string($saturday)) {
            $saturday = in_array(strtolower($saturday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::SATURDAY, $saturday, $comparison);
    }

    /**
     * Filter the query on the sunday column
     *
     * Example usage:
     * <code>
     * $query->filterBySunday(true); // WHERE sunday = true
     * $query->filterBySunday('yes'); // WHERE sunday = true
     * </code>
     *
     * @param     boolean|string $sunday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterBySunday($sunday = null, $comparison = null)
    {
        if (is_string($sunday)) {
            $sunday = in_array(strtolower($sunday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::SUNDAY, $sunday, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTime('2011-03-14'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime('now'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime(array('max' => 'yesterday')); // WHERE start_time < '2011-03-13'
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(helpHourPeer::START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(helpHourPeer::START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourPeer::START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEndTime('2011-03-14'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime('now'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime(array('max' => 'yesterday')); // WHERE end_time < '2011-03-13'
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByEndTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(helpHourPeer::END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(helpHourPeer::END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourPeer::END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $endDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(helpHourPeer::END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(helpHourPeer::END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourPeer::END_DATE, $endDate, $comparison);
    }

    /**
     * Filter the query on the approved column
     *
     * Example usage:
     * <code>
     * $query->filterByApproved(true); // WHERE approved = true
     * $query->filterByApproved('yes'); // WHERE approved = true
     * </code>
     *
     * @param     boolean|string $approved The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(helpHourPeer::APPROVED, $approved, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id >= 12
     * $query->filterByUserId(array('max' => 12)); // WHERE user_id <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(helpHourPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(helpHourPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 helpHourQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(helpHourPeer::USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(helpHourPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Filter the query by a related helpHourSignin object
     *
     * @param   helpHourSignin|PropelObjectCollection $helpHourSignin  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 helpHourQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByhelpHourSignin($helpHourSignin, $comparison = null)
    {
        if ($helpHourSignin instanceof helpHourSignin) {
            return $this
                ->addUsingAlias(helpHourPeer::ID, $helpHourSignin->getHelphourId(), $comparison);
        } elseif ($helpHourSignin instanceof PropelObjectCollection) {
            return $this
                ->usehelpHourSigninQuery()
                ->filterByPrimaryKeys($helpHourSignin->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByhelpHourSignin() only accepts arguments of type helpHourSignin or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the helpHourSignin relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function joinhelpHourSignin($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('helpHourSignin');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'helpHourSignin');
        }

        return $this;
    }

    /**
     * Use the helpHourSignin relation helpHourSignin object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   helpHourSigninQuery A secondary query class using the current class as primary query
     */
    public function usehelpHourSigninQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinhelpHourSignin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'helpHourSignin', 'helpHourSigninQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   helpHour $helpHour Object to remove from the list of results
     *
     * @return helpHourQuery The current query, for fluid interface
     */
    public function prune($helpHour = null)
    {
        if ($helpHour) {
            $this->addUsingAlias(helpHourPeer::ID, $helpHour->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
