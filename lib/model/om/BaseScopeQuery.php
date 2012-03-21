<?php


/**
 * Base class that represents a query for the 'scope' table.
 *
 * 
 *
 * @method     ScopeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ScopeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ScopeQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ScopeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ScopeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ScopeQuery groupById() Group by the id column
 * @method     ScopeQuery groupByName() Group by the name column
 * @method     ScopeQuery groupByIp() Group by the ip column
 * @method     ScopeQuery groupByCreatedAt() Group by the created_at column
 * @method     ScopeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ScopeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ScopeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ScopeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ScopeQuery leftJoinLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the Link relation
 * @method     ScopeQuery rightJoinLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Link relation
 * @method     ScopeQuery innerJoinLink($relationAlias = null) Adds a INNER JOIN clause to the query using the Link relation
 *
 * @method     Scope findOne(PropelPDO $con = null) Return the first Scope matching the query
 * @method     Scope findOneOrCreate(PropelPDO $con = null) Return the first Scope matching the query, or a new Scope object populated from the query conditions when no match is found
 *
 * @method     Scope findOneById(int $id) Return the first Scope filtered by the id column
 * @method     Scope findOneByName(string $name) Return the first Scope filtered by the name column
 * @method     Scope findOneByIp(string $ip) Return the first Scope filtered by the ip column
 * @method     Scope findOneByCreatedAt(string $created_at) Return the first Scope filtered by the created_at column
 * @method     Scope findOneByUpdatedAt(string $updated_at) Return the first Scope filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Scope objects filtered by the id column
 * @method     array findByName(string $name) Return Scope objects filtered by the name column
 * @method     array findByIp(string $ip) Return Scope objects filtered by the ip column
 * @method     array findByCreatedAt(string $created_at) Return Scope objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Scope objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseScopeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseScopeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Scope', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ScopeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ScopeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ScopeQuery) {
			return $criteria;
		}
		$query = new ScopeQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
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
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Scope|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ScopePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ScopePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Scope A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `IP`, `CREATED_AT`, `UPDATED_AT` FROM `scope` WHERE `ID` = :p0';
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
			$obj = new Scope();
			$obj->hydrate($row);
			ScopePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Scope|array|mixed the result, formatted by the current formatter
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
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
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
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ScopePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ScopePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ScopePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScopePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the ip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
	 * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ip The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScopePeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ScopePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ScopePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScopePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(ScopePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(ScopePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScopePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Link object
	 *
	 * @param     Link $link  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function filterByLink($link, $comparison = null)
	{
		if ($link instanceof Link) {
			return $this
				->addUsingAlias(ScopePeer::ID, $link->getScopeId(), $comparison);
		} elseif ($link instanceof PropelCollection) {
			return $this
				->useLinkQuery()
				->filterByPrimaryKeys($link->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLink() only accepts arguments of type Link or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Link relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function joinLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Link');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Link');
		}

		return $this;
	}

	/**
	 * Use the Link relation Link object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LinkQuery A secondary query class using the current class as primary query
	 */
	public function useLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLink($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Link', 'LinkQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Scope $scope Object to remove from the list of results
	 *
	 * @return    ScopeQuery The current query, for fluid interface
	 */
	public function prune($scope = null)
	{
		if ($scope) {
			$this->addUsingAlias(ScopePeer::ID, $scope->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseScopeQuery