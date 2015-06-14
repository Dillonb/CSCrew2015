<?php


/**
 * Base class that represents a query for the 'helphoursignin' table.
 *
 *
 *
 * @method helpHourSigninQuery orderById($order = Criteria::ASC) Order by the id column
 * @method helpHourSigninQuery orderByHelphourId($order = Criteria::ASC) Order by the helphour_id column
 * @method helpHourSigninQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method helpHourSigninQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method helpHourSigninQuery groupById() Group by the id column
 * @method helpHourSigninQuery groupByHelphourId() Group by the helphour_id column
 * @method helpHourSigninQuery groupByCreatedAt() Group by the created_at column
 * @method helpHourSigninQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method helpHourSigninQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method helpHourSigninQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method helpHourSigninQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method helpHourSigninQuery leftJoinhelpHour($relationAlias = null) Adds a LEFT JOIN clause to the query using the helpHour relation
 * @method helpHourSigninQuery rightJoinhelpHour($relationAlias = null) Adds a RIGHT JOIN clause to the query using the helpHour relation
 * @method helpHourSigninQuery innerJoinhelpHour($relationAlias = null) Adds a INNER JOIN clause to the query using the helpHour relation
 *
 * @method helpHourSignin findOne(PropelPDO $con = null) Return the first helpHourSignin matching the query
 * @method helpHourSignin findOneOrCreate(PropelPDO $con = null) Return the first helpHourSignin matching the query, or a new helpHourSignin object populated from the query conditions when no match is found
 *
 * @method helpHourSignin findOneByHelphourId(int $helphour_id) Return the first helpHourSignin filtered by the helphour_id column
 * @method helpHourSignin findOneByCreatedAt(string $created_at) Return the first helpHourSignin filtered by the created_at column
 * @method helpHourSignin findOneByUpdatedAt(string $updated_at) Return the first helpHourSignin filtered by the updated_at column
 *
 * @method array findById(int $id) Return helpHourSignin objects filtered by the id column
 * @method array findByHelphourId(int $helphour_id) Return helpHourSignin objects filtered by the helphour_id column
 * @method array findByCreatedAt(string $created_at) Return helpHourSignin objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return helpHourSignin objects filtered by the updated_at column
 *
 * @package    propel.generator.cscrew.om
 */
abstract class BasehelpHourSigninQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasehelpHourSigninQuery object.
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
            $modelName = 'helpHourSignin';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new helpHourSigninQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   helpHourSigninQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return helpHourSigninQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof helpHourSigninQuery) {
            return $criteria;
        }
        $query = new helpHourSigninQuery(null, null, $modelAlias);

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
     * @return   helpHourSignin|helpHourSignin[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = helpHourSigninPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(helpHourSigninPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 helpHourSignin A model object, or null if the key is not found
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
     * @return                 helpHourSignin A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `helphour_id`, `created_at`, `updated_at` FROM `helphoursignin` WHERE `id` = :p0';
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
            $obj = new helpHourSignin();
            $obj->hydrate($row);
            helpHourSigninPeer::addInstanceToPool($obj, (string) $key);
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
     * @return helpHourSignin|helpHourSignin[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|helpHourSignin[]|mixed the list of results, formatted by the current formatter
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
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(helpHourSigninPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(helpHourSigninPeer::ID, $keys, Criteria::IN);
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
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(helpHourSigninPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(helpHourSigninPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourSigninPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the helphour_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHelphourId(1234); // WHERE helphour_id = 1234
     * $query->filterByHelphourId(array(12, 34)); // WHERE helphour_id IN (12, 34)
     * $query->filterByHelphourId(array('min' => 12)); // WHERE helphour_id >= 12
     * $query->filterByHelphourId(array('max' => 12)); // WHERE helphour_id <= 12
     * </code>
     *
     * @see       filterByhelpHour()
     *
     * @param     mixed $helphourId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterByHelphourId($helphourId = null, $comparison = null)
    {
        if (is_array($helphourId)) {
            $useMinMax = false;
            if (isset($helphourId['min'])) {
                $this->addUsingAlias(helpHourSigninPeer::HELPHOUR_ID, $helphourId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($helphourId['max'])) {
                $this->addUsingAlias(helpHourSigninPeer::HELPHOUR_ID, $helphourId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourSigninPeer::HELPHOUR_ID, $helphourId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(helpHourSigninPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(helpHourSigninPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourSigninPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(helpHourSigninPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(helpHourSigninPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(helpHourSigninPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related helpHour object
     *
     * @param   helpHour|PropelObjectCollection $helpHour The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 helpHourSigninQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByhelpHour($helpHour, $comparison = null)
    {
        if ($helpHour instanceof helpHour) {
            return $this
                ->addUsingAlias(helpHourSigninPeer::HELPHOUR_ID, $helpHour->getId(), $comparison);
        } elseif ($helpHour instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(helpHourSigninPeer::HELPHOUR_ID, $helpHour->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByhelpHour() only accepts arguments of type helpHour or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the helpHour relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function joinhelpHour($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('helpHour');

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
            $this->addJoinObject($join, 'helpHour');
        }

        return $this;
    }

    /**
     * Use the helpHour relation helpHour object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   helpHourQuery A secondary query class using the current class as primary query
     */
    public function usehelpHourQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinhelpHour($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'helpHour', 'helpHourQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   helpHourSignin $helpHourSignin Object to remove from the list of results
     *
     * @return helpHourSigninQuery The current query, for fluid interface
     */
    public function prune($helpHourSignin = null)
    {
        if ($helpHourSignin) {
            $this->addUsingAlias(helpHourSigninPeer::ID, $helpHourSignin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(helpHourSigninPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(helpHourSigninPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(helpHourSigninPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(helpHourSigninPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(helpHourSigninPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     helpHourSigninQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(helpHourSigninPeer::CREATED_AT);
    }
}
