<?php


/**
 * Base class that represents a query for the 'link' table.
 *
 * 
 *
 * @method     LinkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LinkQuery orderByScopeId($order = Criteria::ASC) Order by the scope_id column
 * @method     LinkQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     LinkQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     LinkQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     LinkQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     LinkQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     LinkQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     LinkQuery groupById() Group by the id column
 * @method     LinkQuery groupByScopeId() Group by the scope_id column
 * @method     LinkQuery groupByUrl() Group by the url column
 * @method     LinkQuery groupByDetails() Group by the details column
 * @method     LinkQuery groupByLabel() Group by the label column
 * @method     LinkQuery groupByIp() Group by the ip column
 * @method     LinkQuery groupByCreatedAt() Group by the created_at column
 * @method     LinkQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     LinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LinkQuery leftJoinScope($relationAlias = null) Adds a LEFT JOIN clause to the query using the Scope relation
 * @method     LinkQuery rightJoinScope($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Scope relation
 * @method     LinkQuery innerJoinScope($relationAlias = null) Adds a INNER JOIN clause to the query using the Scope relation
 *
 * @method     Link findOne(PropelPDO $con = null) Return the first Link matching the query
 * @method     Link findOneOrCreate(PropelPDO $con = null) Return the first Link matching the query, or a new Link object populated from the query conditions when no match is found
 *
 * @method     Link findOneById(int $id) Return the first Link filtered by the id column
 * @method     Link findOneByScopeId(int $scope_id) Return the first Link filtered by the scope_id column
 * @method     Link findOneByUrl(string $url) Return the first Link filtered by the url column
 * @method     Link findOneByDetails(string $details) Return the first Link filtered by the details column
 * @method     Link findOneByLabel(string $label) Return the first Link filtered by the label column
 * @method     Link findOneByIp(string $ip) Return the first Link filtered by the ip column
 * @method     Link findOneByCreatedAt(string $created_at) Return the first Link filtered by the created_at column
 * @method     Link findOneByUpdatedAt(string $updated_at) Return the first Link filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Link objects filtered by the id column
 * @method     array findByScopeId(int $scope_id) Return Link objects filtered by the scope_id column
 * @method     array findByUrl(string $url) Return Link objects filtered by the url column
 * @method     array findByDetails(string $details) Return Link objects filtered by the details column
 * @method     array findByLabel(string $label) Return Link objects filtered by the label column
 * @method     array findByIp(string $ip) Return Link objects filtered by the ip column
 * @method     array findByCreatedAt(string $created_at) Return Link objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Link objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLinkQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLinkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Link', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LinkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LinkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LinkQuery) {
			return $criteria;
		}
		$query = new LinkQuery();
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
	 * @return    Link|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LinkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LinkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Link A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SCOPE_ID`, `URL`, `DETAILS`, `LABEL`, `IP`, `CREATED_AT`, `UPDATED_AT` FROM `link` WHERE `ID` = :p0';
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
			$obj = new Link();
			$obj->hydrate($row);
			LinkPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Link|array|mixed the result, formatted by the current formatter
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
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LinkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LinkPeer::ID, $keys, Criteria::IN);
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
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LinkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the scope_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByScopeId(1234); // WHERE scope_id = 1234
	 * $query->filterByScopeId(array(12, 34)); // WHERE scope_id IN (12, 34)
	 * $query->filterByScopeId(array('min' => 12)); // WHERE scope_id > 12
	 * </code>
	 *
	 * @see       filterByScope()
	 *
	 * @param     mixed $scopeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByScopeId($scopeId = null, $comparison = null)
	{
		if (is_array($scopeId)) {
			$useMinMax = false;
			if (isset($scopeId['min'])) {
				$this->addUsingAlias(LinkPeer::SCOPE_ID, $scopeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($scopeId['max'])) {
				$this->addUsingAlias(LinkPeer::SCOPE_ID, $scopeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LinkPeer::SCOPE_ID, $scopeId, $comparison);
	}

	/**
	 * Filter the query on the url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
	 * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $url The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LinkPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the details column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDetails('fooValue');   // WHERE details = 'fooValue'
	 * $query->filterByDetails('%fooValue%'); // WHERE details LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $details The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByDetails($details = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($details)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $details)) {
				$details = str_replace('*', '%', $details);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LinkPeer::DETAILS, $details, $comparison);
	}

	/**
	 * Filter the query on the label column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
	 * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $label The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByLabel($label = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($label)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $label)) {
				$label = str_replace('*', '%', $label);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LinkPeer::LABEL, $label, $comparison);
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
	 * @return    LinkQuery The current query, for fluid interface
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
		return $this->addUsingAlias(LinkPeer::IP, $ip, $comparison);
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
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(LinkPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(LinkPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LinkPeer::CREATED_AT, $createdAt, $comparison);
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
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(LinkPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(LinkPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LinkPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Scope object
	 *
	 * @param     Scope|PropelCollection $scope The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function filterByScope($scope, $comparison = null)
	{
		if ($scope instanceof Scope) {
			return $this
				->addUsingAlias(LinkPeer::SCOPE_ID, $scope->getId(), $comparison);
		} elseif ($scope instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LinkPeer::SCOPE_ID, $scope->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByScope() only accepts arguments of type Scope or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Scope relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function joinScope($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Scope');

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
			$this->addJoinObject($join, 'Scope');
		}

		return $this;
	}

	/**
	 * Use the Scope relation Scope object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScopeQuery A secondary query class using the current class as primary query
	 */
	public function useScopeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinScope($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Scope', 'ScopeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Link $link Object to remove from the list of results
	 *
	 * @return    LinkQuery The current query, for fluid interface
	 */
	public function prune($link = null)
	{
		if ($link) {
			$this->addUsingAlias(LinkPeer::ID, $link->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLinkQuery