<?php


/**
 * Base class that represents a query for the 'signin_reason' table.
 *
 *
 *
 * @method signInReasonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method signInReasonQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method signInReasonQuery groupById() Group by the id column
 * @method signInReasonQuery groupByText() Group by the text column
 *
 * @method signInReasonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method signInReasonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method signInReasonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method signInReasonQuery leftJoinsignIn($relationAlias = null) Adds a LEFT JOIN clause to the query using the signIn relation
 * @method signInReasonQuery rightJoinsignIn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the signIn relation
 * @method signInReasonQuery innerJoinsignIn($relationAlias = null) Adds a INNER JOIN clause to the query using the signIn relation
 *
 * @method signInReason findOne(PropelPDO $con = null) Return the first signInReason matching the query
 * @method signInReason findOneOrCreate(PropelPDO $con = null) Return the first signInReason matching the query, or a new signInReason object populated from the query conditions when no match is found
 *
 * @method signInReason findOneByText(string $text) Return the first signInReason filtered by the text column
 *
 * @method array findById(int $id) Return signInReason objects filtered by the id column
 * @method array findByText(string $text) Return signInReason objects filtered by the text column
 *
 * @package    propel.generator.cscrew.om
 */
abstract class BasesignInReasonQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasesignInReasonQuery object.
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
            $modelName = 'signInReason';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new signInReasonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   signInReasonQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return signInReasonQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof signInReasonQuery) {
            return $criteria;
        }
        $query = new signInReasonQuery(null, null, $modelAlias);

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
     * @return   signInReason|signInReason[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = signInReasonPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(signInReasonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 signInReason A model object, or null if the key is not found
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
     * @return                 signInReason A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `text` FROM `signin_reason` WHERE `id` = :p0';
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
            $obj = new signInReason();
            $obj->hydrate($row);
            signInReasonPeer::addInstanceToPool($obj, (string) $key);
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
     * @return signInReason|signInReason[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|signInReason[]|mixed the list of results, formatted by the current formatter
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
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(signInReasonPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(signInReasonPeer::ID, $keys, Criteria::IN);
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
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(signInReasonPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(signInReasonPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(signInReasonPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(signInReasonPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query by a related signIn object
     *
     * @param   signIn|PropelObjectCollection $signIn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 signInReasonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBysignIn($signIn, $comparison = null)
    {
        if ($signIn instanceof signIn) {
            return $this
                ->addUsingAlias(signInReasonPeer::ID, $signIn->getReasonId(), $comparison);
        } elseif ($signIn instanceof PropelObjectCollection) {
            return $this
                ->usesignInQuery()
                ->filterByPrimaryKeys($signIn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysignIn() only accepts arguments of type signIn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the signIn relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function joinsignIn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('signIn');

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
            $this->addJoinObject($join, 'signIn');
        }

        return $this;
    }

    /**
     * Use the signIn relation signIn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   signInQuery A secondary query class using the current class as primary query
     */
    public function usesignInQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsignIn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'signIn', 'signInQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   signInReason $signInReason Object to remove from the list of results
     *
     * @return signInReasonQuery The current query, for fluid interface
     */
    public function prune($signInReason = null)
    {
        if ($signInReason) {
            $this->addUsingAlias(signInReasonPeer::ID, $signInReason->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
