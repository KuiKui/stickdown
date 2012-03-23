<?php


/**
 * Base class that represents a query for the 'stuff' table.
 *
 * 
 *
 * @method     StuffQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     StuffQuery orderByBoardId($order = Criteria::ASC) Order by the board_id column
 * @method     StuffQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     StuffQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     StuffQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     StuffQuery orderByStarred($order = Criteria::ASC) Order by the starred column
 * @method     StuffQuery orderByChecked($order = Criteria::ASC) Order by the checked column
 * @method     StuffQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method     StuffQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     StuffQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     StuffQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     StuffQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     StuffQuery groupById() Group by the id column
 * @method     StuffQuery groupByBoardId() Group by the board_id column
 * @method     StuffQuery groupByContent() Group by the content column
 * @method     StuffQuery groupByDetails() Group by the details column
 * @method     StuffQuery groupByLabel() Group by the label column
 * @method     StuffQuery groupByStarred() Group by the starred column
 * @method     StuffQuery groupByChecked() Group by the checked column
 * @method     StuffQuery groupByOrder() Group by the order column
 * @method     StuffQuery groupByIp() Group by the ip column
 * @method     StuffQuery groupByCreatedAt() Group by the created_at column
 * @method     StuffQuery groupByUpdatedAt() Group by the updated_at column
 * @method     StuffQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     StuffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StuffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StuffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StuffQuery leftJoinBoard($relationAlias = null) Adds a LEFT JOIN clause to the query using the Board relation
 * @method     StuffQuery rightJoinBoard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Board relation
 * @method     StuffQuery innerJoinBoard($relationAlias = null) Adds a INNER JOIN clause to the query using the Board relation
 *
 * @method     Stuff findOne(PropelPDO $con = null) Return the first Stuff matching the query
 * @method     Stuff findOneOrCreate(PropelPDO $con = null) Return the first Stuff matching the query, or a new Stuff object populated from the query conditions when no match is found
 *
 * @method     Stuff findOneById(int $id) Return the first Stuff filtered by the id column
 * @method     Stuff findOneByBoardId(int $board_id) Return the first Stuff filtered by the board_id column
 * @method     Stuff findOneByContent(string $content) Return the first Stuff filtered by the content column
 * @method     Stuff findOneByDetails(string $details) Return the first Stuff filtered by the details column
 * @method     Stuff findOneByLabel(string $label) Return the first Stuff filtered by the label column
 * @method     Stuff findOneByStarred(int $starred) Return the first Stuff filtered by the starred column
 * @method     Stuff findOneByChecked(int $checked) Return the first Stuff filtered by the checked column
 * @method     Stuff findOneByOrder(int $order) Return the first Stuff filtered by the order column
 * @method     Stuff findOneByIp(string $ip) Return the first Stuff filtered by the ip column
 * @method     Stuff findOneByCreatedAt(string $created_at) Return the first Stuff filtered by the created_at column
 * @method     Stuff findOneByUpdatedAt(string $updated_at) Return the first Stuff filtered by the updated_at column
 * @method     Stuff findOneByDeletedAt(string $deleted_at) Return the first Stuff filtered by the deleted_at column
 *
 * @method     array findById(int $id) Return Stuff objects filtered by the id column
 * @method     array findByBoardId(int $board_id) Return Stuff objects filtered by the board_id column
 * @method     array findByContent(string $content) Return Stuff objects filtered by the content column
 * @method     array findByDetails(string $details) Return Stuff objects filtered by the details column
 * @method     array findByLabel(string $label) Return Stuff objects filtered by the label column
 * @method     array findByStarred(int $starred) Return Stuff objects filtered by the starred column
 * @method     array findByChecked(int $checked) Return Stuff objects filtered by the checked column
 * @method     array findByOrder(int $order) Return Stuff objects filtered by the order column
 * @method     array findByIp(string $ip) Return Stuff objects filtered by the ip column
 * @method     array findByCreatedAt(string $created_at) Return Stuff objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Stuff objects filtered by the updated_at column
 * @method     array findByDeletedAt(string $deleted_at) Return Stuff objects filtered by the deleted_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseStuffQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseStuffQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Stuff', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new StuffQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    StuffQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof StuffQuery) {
			return $criteria;
		}
		$query = new StuffQuery();
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
	 * @return    Stuff|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = StuffPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(StuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Stuff A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `BOARD_ID`, `CONTENT`, `DETAILS`, `LABEL`, `STARRED`, `CHECKED`, `ORDER`, `IP`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT` FROM `stuff` WHERE `ID` = :p0';
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
			$obj = new Stuff();
			$obj->hydrate($row);
			StuffPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Stuff|array|mixed the result, formatted by the current formatter
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
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(StuffPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(StuffPeer::ID, $keys, Criteria::IN);
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
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(StuffPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the board_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBoardId(1234); // WHERE board_id = 1234
	 * $query->filterByBoardId(array(12, 34)); // WHERE board_id IN (12, 34)
	 * $query->filterByBoardId(array('min' => 12)); // WHERE board_id > 12
	 * </code>
	 *
	 * @see       filterByBoard()
	 *
	 * @param     mixed $boardId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByBoardId($boardId = null, $comparison = null)
	{
		if (is_array($boardId)) {
			$useMinMax = false;
			if (isset($boardId['min'])) {
				$this->addUsingAlias(StuffPeer::BOARD_ID, $boardId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($boardId['max'])) {
				$this->addUsingAlias(StuffPeer::BOARD_ID, $boardId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::BOARD_ID, $boardId, $comparison);
	}

	/**
	 * Filter the query on the content column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
	 * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $content The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByContent($content = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($content)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $content)) {
				$content = str_replace('*', '%', $content);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(StuffPeer::CONTENT, $content, $comparison);
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
	 * @return    StuffQuery The current query, for fluid interface
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
		return $this->addUsingAlias(StuffPeer::DETAILS, $details, $comparison);
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
	 * @return    StuffQuery The current query, for fluid interface
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
		return $this->addUsingAlias(StuffPeer::LABEL, $label, $comparison);
	}

	/**
	 * Filter the query on the starred column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStarred(1234); // WHERE starred = 1234
	 * $query->filterByStarred(array(12, 34)); // WHERE starred IN (12, 34)
	 * $query->filterByStarred(array('min' => 12)); // WHERE starred > 12
	 * </code>
	 *
	 * @param     mixed $starred The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByStarred($starred = null, $comparison = null)
	{
		if (is_array($starred)) {
			$useMinMax = false;
			if (isset($starred['min'])) {
				$this->addUsingAlias(StuffPeer::STARRED, $starred['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($starred['max'])) {
				$this->addUsingAlias(StuffPeer::STARRED, $starred['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::STARRED, $starred, $comparison);
	}

	/**
	 * Filter the query on the checked column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByChecked(1234); // WHERE checked = 1234
	 * $query->filterByChecked(array(12, 34)); // WHERE checked IN (12, 34)
	 * $query->filterByChecked(array('min' => 12)); // WHERE checked > 12
	 * </code>
	 *
	 * @param     mixed $checked The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByChecked($checked = null, $comparison = null)
	{
		if (is_array($checked)) {
			$useMinMax = false;
			if (isset($checked['min'])) {
				$this->addUsingAlias(StuffPeer::CHECKED, $checked['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($checked['max'])) {
				$this->addUsingAlias(StuffPeer::CHECKED, $checked['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::CHECKED, $checked, $comparison);
	}

	/**
	 * Filter the query on the order column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrder(1234); // WHERE order = 1234
	 * $query->filterByOrder(array(12, 34)); // WHERE order IN (12, 34)
	 * $query->filterByOrder(array('min' => 12)); // WHERE order > 12
	 * </code>
	 *
	 * @param     mixed $order The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByOrder($order = null, $comparison = null)
	{
		if (is_array($order)) {
			$useMinMax = false;
			if (isset($order['min'])) {
				$this->addUsingAlias(StuffPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($order['max'])) {
				$this->addUsingAlias(StuffPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::ORDER, $order, $comparison);
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
	 * @return    StuffQuery The current query, for fluid interface
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
		return $this->addUsingAlias(StuffPeer::IP, $ip, $comparison);
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
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(StuffPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(StuffPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::CREATED_AT, $createdAt, $comparison);
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
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(StuffPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(StuffPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $deletedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(StuffPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(StuffPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StuffPeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query by a related Board object
	 *
	 * @param     Board|PropelCollection $board The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function filterByBoard($board, $comparison = null)
	{
		if ($board instanceof Board) {
			return $this
				->addUsingAlias(StuffPeer::BOARD_ID, $board->getId(), $comparison);
		} elseif ($board instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StuffPeer::BOARD_ID, $board->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByBoard() only accepts arguments of type Board or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Board relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function joinBoard($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Board');

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
			$this->addJoinObject($join, 'Board');
		}

		return $this;
	}

	/**
	 * Use the Board relation Board object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BoardQuery A secondary query class using the current class as primary query
	 */
	public function useBoardQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBoard($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Board', 'BoardQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Stuff $stuff Object to remove from the list of results
	 *
	 * @return    StuffQuery The current query, for fluid interface
	 */
	public function prune($stuff = null)
	{
		if ($stuff) {
			$this->addUsingAlias(StuffPeer::ID, $stuff->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseStuffQuery