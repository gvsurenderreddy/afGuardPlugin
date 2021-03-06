<?php


/**
 * Base class that represents a query for the 'af_guard_user_group' table.
 *
 * 
 *
 * @method     afGuardUserGroupQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     afGuardUserGroupQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 *
 * @method     afGuardUserGroupQuery groupByUserId() Group by the user_id column
 * @method     afGuardUserGroupQuery groupByGroupId() Group by the group_id column
 *
 * @method     afGuardUserGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardUserGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardUserGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardUserGroupQuery leftJoinafGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserGroupQuery rightJoinafGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserGroupQuery innerJoinafGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUser relation
 *
 * @method     afGuardUserGroupQuery leftJoinafGuardGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardGroup relation
 * @method     afGuardUserGroupQuery rightJoinafGuardGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardGroup relation
 * @method     afGuardUserGroupQuery innerJoinafGuardGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardGroup relation
 *
 * @method     afGuardUserGroup findOne(PropelPDO $con = null) Return the first afGuardUserGroup matching the query
 * @method     afGuardUserGroup findOneOrCreate(PropelPDO $con = null) Return the first afGuardUserGroup matching the query, or a new afGuardUserGroup object populated from the query conditions when no match is found
 *
 * @method     afGuardUserGroup findOneByUserId(int $user_id) Return the first afGuardUserGroup filtered by the user_id column
 * @method     afGuardUserGroup findOneByGroupId(int $group_id) Return the first afGuardUserGroup filtered by the group_id column
 *
 * @method     array findByUserId(int $user_id) Return afGuardUserGroup objects filtered by the user_id column
 * @method     array findByGroupId(int $group_id) Return afGuardUserGroup objects filtered by the group_id column
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUserGroupQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseafGuardUserGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardUserGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardUserGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardUserGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardUserGroupQuery) {
			return $criteria;
		}
		$query = new afGuardUserGroupQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$user_id, $group_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardUserGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = afGuardUserGroupPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(afGuardUserGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    afGuardUserGroup A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `GROUP_ID` FROM `af_guard_user_group` WHERE `USER_ID` = :p0 AND `GROUP_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new afGuardUserGroup();
			$obj->hydrate($row);
			afGuardUserGroupPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    afGuardUserGroup|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(afGuardUserGroupPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(afGuardUserGroupPeer::GROUP_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(afGuardUserGroupPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(afGuardUserGroupPeer::GROUP_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @see       filterByafGuardUser()
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserGroupPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the group_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGroupId(1234); // WHERE group_id = 1234
	 * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
	 * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
	 * </code>
	 *
	 * @see       filterByafGuardGroup()
	 *
	 * @param     mixed $groupId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByGroupId($groupId = null, $comparison = null)
	{
		if (is_array($groupId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserGroupPeer::GROUP_ID, $groupId, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUser object
	 *
	 * @param     afGuardUser|PropelCollection $afGuardUser The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByafGuardUser($afGuardUser, $comparison = null)
	{
		if ($afGuardUser instanceof afGuardUser) {
			return $this
				->addUsingAlias(afGuardUserGroupPeer::USER_ID, $afGuardUser->getId(), $comparison);
		} elseif ($afGuardUser instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(afGuardUserGroupPeer::USER_ID, $afGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByafGuardUser() only accepts arguments of type afGuardUser or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUser relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function joinafGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUser');

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
			$this->addJoinObject($join, 'afGuardUser');
		}

		return $this;
	}

	/**
	 * Use the afGuardUser relation afGuardUser object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUser', 'afGuardUserQuery');
	}

	/**
	 * Filter the query by a related afGuardGroup object
	 *
	 * @param     afGuardGroup|PropelCollection $afGuardGroup The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function filterByafGuardGroup($afGuardGroup, $comparison = null)
	{
		if ($afGuardGroup instanceof afGuardGroup) {
			return $this
				->addUsingAlias(afGuardUserGroupPeer::GROUP_ID, $afGuardGroup->getId(), $comparison);
		} elseif ($afGuardGroup instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(afGuardUserGroupPeer::GROUP_ID, $afGuardGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByafGuardGroup() only accepts arguments of type afGuardGroup or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardGroup relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function joinafGuardGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardGroup');

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
			$this->addJoinObject($join, 'afGuardGroup');
		}

		return $this;
	}

	/**
	 * Use the afGuardGroup relation afGuardGroup object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardGroupQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardGroup', 'afGuardGroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     afGuardUserGroup $afGuardUserGroup Object to remove from the list of results
	 *
	 * @return    afGuardUserGroupQuery The current query, for fluid interface
	 */
	public function prune($afGuardUserGroup = null)
	{
		if ($afGuardUserGroup) {
			$this->addCond('pruneCond0', $this->getAliasedColName(afGuardUserGroupPeer::USER_ID), $afGuardUserGroup->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(afGuardUserGroupPeer::GROUP_ID), $afGuardUserGroup->getGroupId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseafGuardUserGroupQuery