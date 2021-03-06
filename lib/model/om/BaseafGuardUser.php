<?php


/**
 * Base class that represents a row from the 'af_guard_user' table.
 *
 * 
 *
 * @package    propel.generator.plugins.afGuardPlugin.lib.model.om
 */
abstract class BaseafGuardUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'afGuardUserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        afGuardUserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the algorithm field.
	 * Note: this column has a database default value of: 'sha1'
	 * @var        string
	 */
	protected $algorithm;

	/**
	 * The value for the salt field.
	 * @var        string
	 */
	protected $salt;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the last_login field.
	 * @var        string
	 */
	protected $last_login;

	/**
	 * The value for the is_active field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $is_active;

	/**
	 * The value for the is_super_admin field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_super_admin;

	/**
	 * @var        array afGuardUserPermission[] Collection to store aggregation of afGuardUserPermission objects.
	 */
	protected $collafGuardUserPermissions;

	/**
	 * @var        array afGuardUserGroup[] Collection to store aggregation of afGuardUserGroup objects.
	 */
	protected $collafGuardUserGroups;

	/**
	 * @var        array afGuardRememberKey[] Collection to store aggregation of afGuardRememberKey objects.
	 */
	protected $collafGuardRememberKeys;

	/**
	 * @var        array Band[] Collection to store aggregation of Band objects.
	 */
	protected $collBands;

	/**
	 * @var        array BandHasMember[] Collection to store aggregation of BandHasMember objects.
	 */
	protected $collBandHasMembers;

	/**
	 * @var        array Fan[] Collection to store aggregation of Fan objects.
	 */
	protected $collFans;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $afGuardUserPermissionsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $afGuardUserGroupsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $afGuardRememberKeysScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $bandsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $bandHasMembersScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $fansScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->algorithm = 'sha1';
		$this->is_active = true;
		$this->is_super_admin = false;
	}

	/**
	 * Initializes internal state of BaseafGuardUser object.
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
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [algorithm] column value.
	 * 
	 * @return     string
	 */
	public function getAlgorithm()
	{
		return $this->algorithm;
	}

	/**
	 * Get the [salt] column value.
	 * 
	 * @return     string
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [last_login] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{
		if ($this->last_login === null) {
			return null;
		}


		if ($this->last_login === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_login);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [is_active] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsActive()
	{
		return $this->is_active;
	}

	/**
	 * Get the [is_super_admin] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsSuperAdmin()
	{
		return $this->is_super_admin;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = afGuardUserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [username] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = afGuardUserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [algorithm] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setAlgorithm($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->algorithm !== $v) {
			$this->algorithm = $v;
			$this->modifiedColumns[] = afGuardUserPeer::ALGORITHM;
		}

		return $this;
	} // setAlgorithm()

	/**
	 * Set the value of [salt] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setSalt($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = afGuardUserPeer::SALT;
		}

		return $this;
	} // setSalt()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = afGuardUserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = afGuardUserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [last_login] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setLastLogin($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->last_login !== null || $dt !== null) {
			$currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->last_login = $newDateAsString;
				$this->modifiedColumns[] = afGuardUserPeer::LAST_LOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastLogin()

	/**
	 * Sets the value of the [is_active] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setIsActive($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = afGuardUserPeer::IS_ACTIVE;
		}

		return $this;
	} // setIsActive()

	/**
	 * Sets the value of the [is_super_admin] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function setIsSuperAdmin($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_super_admin !== $v) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = afGuardUserPeer::IS_SUPER_ADMIN;
		}

		return $this;
	} // setIsSuperAdmin()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->algorithm !== 'sha1') {
				return false;
			}

			if ($this->is_active !== true) {
				return false;
			}

			if ($this->is_super_admin !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
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
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->algorithm = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->salt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->last_login = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->is_active = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->is_super_admin = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = afGuardUserPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating afGuardUser object", $e);
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
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
			$con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = afGuardUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collafGuardUserPermissions = null;

			$this->collafGuardUserGroups = null;

			$this->collafGuardRememberKeys = null;

			$this->collBands = null;

			$this->collBandHasMembers = null;

			$this->collFans = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = afGuardUserQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseafGuardUser:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseafGuardUser:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

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
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(afGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseafGuardUser:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(afGuardUserPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

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
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseafGuardUser:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				afGuardUserPeer::addInstanceToPool($this);
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
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
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

			if ($this->afGuardUserPermissionsScheduledForDeletion !== null) {
				if (!$this->afGuardUserPermissionsScheduledForDeletion->isEmpty()) {
					afGuardUserPermissionQuery::create()
						->filterByPrimaryKeys($this->afGuardUserPermissionsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->afGuardUserPermissionsScheduledForDeletion = null;
				}
			}

			if ($this->collafGuardUserPermissions !== null) {
				foreach ($this->collafGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->afGuardUserGroupsScheduledForDeletion !== null) {
				if (!$this->afGuardUserGroupsScheduledForDeletion->isEmpty()) {
					afGuardUserGroupQuery::create()
						->filterByPrimaryKeys($this->afGuardUserGroupsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->afGuardUserGroupsScheduledForDeletion = null;
				}
			}

			if ($this->collafGuardUserGroups !== null) {
				foreach ($this->collafGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->afGuardRememberKeysScheduledForDeletion !== null) {
				if (!$this->afGuardRememberKeysScheduledForDeletion->isEmpty()) {
					afGuardRememberKeyQuery::create()
						->filterByPrimaryKeys($this->afGuardRememberKeysScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->afGuardRememberKeysScheduledForDeletion = null;
				}
			}

			if ($this->collafGuardRememberKeys !== null) {
				foreach ($this->collafGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->bandsScheduledForDeletion !== null) {
				if (!$this->bandsScheduledForDeletion->isEmpty()) {
					BandQuery::create()
						->filterByPrimaryKeys($this->bandsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->bandsScheduledForDeletion = null;
				}
			}

			if ($this->collBands !== null) {
				foreach ($this->collBands as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->bandHasMembersScheduledForDeletion !== null) {
				if (!$this->bandHasMembersScheduledForDeletion->isEmpty()) {
					BandHasMemberQuery::create()
						->filterByPrimaryKeys($this->bandHasMembersScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->bandHasMembersScheduledForDeletion = null;
				}
			}

			if ($this->collBandHasMembers !== null) {
				foreach ($this->collBandHasMembers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->fansScheduledForDeletion !== null) {
				if (!$this->fansScheduledForDeletion->isEmpty()) {
					FanQuery::create()
						->filterByPrimaryKeys($this->fansScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->fansScheduledForDeletion = null;
				}
			}

			if ($this->collFans !== null) {
				foreach ($this->collFans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
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
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = afGuardUserPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . afGuardUserPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(afGuardUserPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(afGuardUserPeer::USERNAME)) {
			$modifiedColumns[':p' . $index++]  = '`USERNAME`';
		}
		if ($this->isColumnModified(afGuardUserPeer::ALGORITHM)) {
			$modifiedColumns[':p' . $index++]  = '`ALGORITHM`';
		}
		if ($this->isColumnModified(afGuardUserPeer::SALT)) {
			$modifiedColumns[':p' . $index++]  = '`SALT`';
		}
		if ($this->isColumnModified(afGuardUserPeer::PASSWORD)) {
			$modifiedColumns[':p' . $index++]  = '`PASSWORD`';
		}
		if ($this->isColumnModified(afGuardUserPeer::CREATED_AT)) {
			$modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
		}
		if ($this->isColumnModified(afGuardUserPeer::LAST_LOGIN)) {
			$modifiedColumns[':p' . $index++]  = '`LAST_LOGIN`';
		}
		if ($this->isColumnModified(afGuardUserPeer::IS_ACTIVE)) {
			$modifiedColumns[':p' . $index++]  = '`IS_ACTIVE`';
		}
		if ($this->isColumnModified(afGuardUserPeer::IS_SUPER_ADMIN)) {
			$modifiedColumns[':p' . $index++]  = '`IS_SUPER_ADMIN`';
		}

		$sql = sprintf(
			'INSERT INTO `af_guard_user` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`USERNAME`':
						$stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
						break;
					case '`ALGORITHM`':
						$stmt->bindValue($identifier, $this->algorithm, PDO::PARAM_STR);
						break;
					case '`SALT`':
						$stmt->bindValue($identifier, $this->salt, PDO::PARAM_STR);
						break;
					case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
						break;
					case '`CREATED_AT`':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
						break;
					case '`LAST_LOGIN`':
						$stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
						break;
					case '`IS_ACTIVE`':
						$stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
						break;
					case '`IS_SUPER_ADMIN`':
						$stmt->bindValue($identifier, (int) $this->is_super_admin, PDO::PARAM_INT);
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
	 * @param      PropelPDO $con
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
	 * @return     array ValidationFailed[]
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
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = afGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collafGuardUserPermissions !== null) {
					foreach ($this->collafGuardUserPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collafGuardUserGroups !== null) {
					foreach ($this->collafGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collafGuardRememberKeys !== null) {
					foreach ($this->collafGuardRememberKeys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBands !== null) {
					foreach ($this->collBands as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBandHasMembers !== null) {
					foreach ($this->collBandHasMembers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFans !== null) {
					foreach ($this->collFans as $referrerFK) {
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
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = afGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getAlgorithm();
				break;
			case 3:
				return $this->getSalt();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getIsActive();
				break;
			case 8:
				return $this->getIsSuperAdmin();
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
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['afGuardUser'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['afGuardUser'][$this->getPrimaryKey()] = true;
		$keys = afGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getAlgorithm(),
			$keys[3] => $this->getSalt(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getIsActive(),
			$keys[8] => $this->getIsSuperAdmin(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collafGuardUserPermissions) {
				$result['afGuardUserPermissions'] = $this->collafGuardUserPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collafGuardUserGroups) {
				$result['afGuardUserGroups'] = $this->collafGuardUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collafGuardRememberKeys) {
				$result['afGuardRememberKeys'] = $this->collafGuardRememberKeys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collBands) {
				$result['Bands'] = $this->collBands->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collBandHasMembers) {
				$result['BandHasMembers'] = $this->collBandHasMembers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collFans) {
				$result['Fans'] = $this->collFans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = afGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setAlgorithm($value);
				break;
			case 3:
				$this->setSalt($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setIsActive($value);
				break;
			case 8:
				$this->setIsSuperAdmin($value);
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
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = afGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(afGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(afGuardUserPeer::ID)) $criteria->add(afGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(afGuardUserPeer::USERNAME)) $criteria->add(afGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(afGuardUserPeer::ALGORITHM)) $criteria->add(afGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(afGuardUserPeer::SALT)) $criteria->add(afGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(afGuardUserPeer::PASSWORD)) $criteria->add(afGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(afGuardUserPeer::CREATED_AT)) $criteria->add(afGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(afGuardUserPeer::LAST_LOGIN)) $criteria->add(afGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(afGuardUserPeer::IS_ACTIVE)) $criteria->add(afGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(afGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(afGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(afGuardUserPeer::DATABASE_NAME);
		$criteria->add(afGuardUserPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
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
	 * @param      object $copyObj An object of afGuardUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUsername($this->getUsername());
		$copyObj->setAlgorithm($this->getAlgorithm());
		$copyObj->setSalt($this->getSalt());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setLastLogin($this->getLastLogin());
		$copyObj->setIsActive($this->getIsActive());
		$copyObj->setIsSuperAdmin($this->getIsSuperAdmin());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getafGuardUserPermissions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addafGuardUserPermission($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getafGuardUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addafGuardUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getafGuardRememberKeys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addafGuardRememberKey($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBands() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBand($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBandHasMembers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBandHasMember($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getFans() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFan($relObj->copy($deepCopy));
				}
			}

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
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     afGuardUser Clone of current object.
	 * @throws     PropelException
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
	 * @return     afGuardUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new afGuardUserPeer();
		}
		return self::$peer;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('afGuardUserPermission' == $relationName) {
			return $this->initafGuardUserPermissions();
		}
		if ('afGuardUserGroup' == $relationName) {
			return $this->initafGuardUserGroups();
		}
		if ('afGuardRememberKey' == $relationName) {
			return $this->initafGuardRememberKeys();
		}
		if ('Band' == $relationName) {
			return $this->initBands();
		}
		if ('BandHasMember' == $relationName) {
			return $this->initBandHasMembers();
		}
		if ('Fan' == $relationName) {
			return $this->initFans();
		}
	}

	/**
	 * Clears out the collafGuardUserPermissions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addafGuardUserPermissions()
	 */
	public function clearafGuardUserPermissions()
	{
		$this->collafGuardUserPermissions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardUserPermissions collection.
	 *
	 * By default this just sets the collafGuardUserPermissions collection to an empty array (like clearcollafGuardUserPermissions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initafGuardUserPermissions($overrideExisting = true)
	{
		if (null !== $this->collafGuardUserPermissions && !$overrideExisting) {
			return;
		}
		$this->collafGuardUserPermissions = new PropelObjectCollection();
		$this->collafGuardUserPermissions->setModel('afGuardUserPermission');
	}

	/**
	 * Gets an array of afGuardUserPermission objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardUserPermission[] List of afGuardUserPermission objects
	 * @throws     PropelException
	 */
	public function getafGuardUserPermissions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserPermissions) {
				// return empty collection
				$this->initafGuardUserPermissions();
			} else {
				$collafGuardUserPermissions = afGuardUserPermissionQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardUserPermissions;
				}
				$this->collafGuardUserPermissions = $collafGuardUserPermissions;
			}
		}
		return $this->collafGuardUserPermissions;
	}

	/**
	 * Sets a collection of afGuardUserPermission objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $afGuardUserPermissions A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setafGuardUserPermissions(PropelCollection $afGuardUserPermissions, PropelPDO $con = null)
	{
		$this->afGuardUserPermissionsScheduledForDeletion = $this->getafGuardUserPermissions(new Criteria(), $con)->diff($afGuardUserPermissions);

		foreach ($afGuardUserPermissions as $afGuardUserPermission) {
			// Fix issue with collection modified by reference
			if ($afGuardUserPermission->isNew()) {
				$afGuardUserPermission->setafGuardUser($this);
			}
			$this->addafGuardUserPermission($afGuardUserPermission);
		}

		$this->collafGuardUserPermissions = $afGuardUserPermissions;
	}

	/**
	 * Returns the number of related afGuardUserPermission objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardUserPermission objects.
	 * @throws     PropelException
	 */
	public function countafGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserPermissions) {
				return 0;
			} else {
				$query = afGuardUserPermissionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardUserPermissions);
		}
	}

	/**
	 * Method called to associate a afGuardUserPermission object to this object
	 * through the afGuardUserPermission foreign key attribute.
	 *
	 * @param      afGuardUserPermission $l afGuardUserPermission
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addafGuardUserPermission(afGuardUserPermission $l)
	{
		if ($this->collafGuardUserPermissions === null) {
			$this->initafGuardUserPermissions();
		}
		if (!$this->collafGuardUserPermissions->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddafGuardUserPermission($l);
		}

		return $this;
	}

	/**
	 * @param	afGuardUserPermission $afGuardUserPermission The afGuardUserPermission object to add.
	 */
	protected function doAddafGuardUserPermission($afGuardUserPermission)
	{
		$this->collafGuardUserPermissions[]= $afGuardUserPermission;
		$afGuardUserPermission->setafGuardUser($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related afGuardUserPermissions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array afGuardUserPermission[] List of afGuardUserPermission objects
	 */
	public function getafGuardUserPermissionsJoinafGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = afGuardUserPermissionQuery::create(null, $criteria);
		$query->joinWith('afGuardPermission', $join_behavior);

		return $this->getafGuardUserPermissions($query, $con);
	}

	/**
	 * Clears out the collafGuardUserGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addafGuardUserGroups()
	 */
	public function clearafGuardUserGroups()
	{
		$this->collafGuardUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardUserGroups collection.
	 *
	 * By default this just sets the collafGuardUserGroups collection to an empty array (like clearcollafGuardUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initafGuardUserGroups($overrideExisting = true)
	{
		if (null !== $this->collafGuardUserGroups && !$overrideExisting) {
			return;
		}
		$this->collafGuardUserGroups = new PropelObjectCollection();
		$this->collafGuardUserGroups->setModel('afGuardUserGroup');
	}

	/**
	 * Gets an array of afGuardUserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardUserGroup[] List of afGuardUserGroup objects
	 * @throws     PropelException
	 */
	public function getafGuardUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserGroups) {
				// return empty collection
				$this->initafGuardUserGroups();
			} else {
				$collafGuardUserGroups = afGuardUserGroupQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardUserGroups;
				}
				$this->collafGuardUserGroups = $collafGuardUserGroups;
			}
		}
		return $this->collafGuardUserGroups;
	}

	/**
	 * Sets a collection of afGuardUserGroup objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $afGuardUserGroups A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setafGuardUserGroups(PropelCollection $afGuardUserGroups, PropelPDO $con = null)
	{
		$this->afGuardUserGroupsScheduledForDeletion = $this->getafGuardUserGroups(new Criteria(), $con)->diff($afGuardUserGroups);

		foreach ($afGuardUserGroups as $afGuardUserGroup) {
			// Fix issue with collection modified by reference
			if ($afGuardUserGroup->isNew()) {
				$afGuardUserGroup->setafGuardUser($this);
			}
			$this->addafGuardUserGroup($afGuardUserGroup);
		}

		$this->collafGuardUserGroups = $afGuardUserGroups;
	}

	/**
	 * Returns the number of related afGuardUserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardUserGroup objects.
	 * @throws     PropelException
	 */
	public function countafGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardUserGroups) {
				return 0;
			} else {
				$query = afGuardUserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardUserGroups);
		}
	}

	/**
	 * Method called to associate a afGuardUserGroup object to this object
	 * through the afGuardUserGroup foreign key attribute.
	 *
	 * @param      afGuardUserGroup $l afGuardUserGroup
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addafGuardUserGroup(afGuardUserGroup $l)
	{
		if ($this->collafGuardUserGroups === null) {
			$this->initafGuardUserGroups();
		}
		if (!$this->collafGuardUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddafGuardUserGroup($l);
		}

		return $this;
	}

	/**
	 * @param	afGuardUserGroup $afGuardUserGroup The afGuardUserGroup object to add.
	 */
	protected function doAddafGuardUserGroup($afGuardUserGroup)
	{
		$this->collafGuardUserGroups[]= $afGuardUserGroup;
		$afGuardUserGroup->setafGuardUser($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related afGuardUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array afGuardUserGroup[] List of afGuardUserGroup objects
	 */
	public function getafGuardUserGroupsJoinafGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = afGuardUserGroupQuery::create(null, $criteria);
		$query->joinWith('afGuardGroup', $join_behavior);

		return $this->getafGuardUserGroups($query, $con);
	}

	/**
	 * Clears out the collafGuardRememberKeys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addafGuardRememberKeys()
	 */
	public function clearafGuardRememberKeys()
	{
		$this->collafGuardRememberKeys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collafGuardRememberKeys collection.
	 *
	 * By default this just sets the collafGuardRememberKeys collection to an empty array (like clearcollafGuardRememberKeys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initafGuardRememberKeys($overrideExisting = true)
	{
		if (null !== $this->collafGuardRememberKeys && !$overrideExisting) {
			return;
		}
		$this->collafGuardRememberKeys = new PropelObjectCollection();
		$this->collafGuardRememberKeys->setModel('afGuardRememberKey');
	}

	/**
	 * Gets an array of afGuardRememberKey objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array afGuardRememberKey[] List of afGuardRememberKey objects
	 * @throws     PropelException
	 */
	public function getafGuardRememberKeys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collafGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardRememberKeys) {
				// return empty collection
				$this->initafGuardRememberKeys();
			} else {
				$collafGuardRememberKeys = afGuardRememberKeyQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collafGuardRememberKeys;
				}
				$this->collafGuardRememberKeys = $collafGuardRememberKeys;
			}
		}
		return $this->collafGuardRememberKeys;
	}

	/**
	 * Sets a collection of afGuardRememberKey objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $afGuardRememberKeys A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setafGuardRememberKeys(PropelCollection $afGuardRememberKeys, PropelPDO $con = null)
	{
		$this->afGuardRememberKeysScheduledForDeletion = $this->getafGuardRememberKeys(new Criteria(), $con)->diff($afGuardRememberKeys);

		foreach ($afGuardRememberKeys as $afGuardRememberKey) {
			// Fix issue with collection modified by reference
			if ($afGuardRememberKey->isNew()) {
				$afGuardRememberKey->setafGuardUser($this);
			}
			$this->addafGuardRememberKey($afGuardRememberKey);
		}

		$this->collafGuardRememberKeys = $afGuardRememberKeys;
	}

	/**
	 * Returns the number of related afGuardRememberKey objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related afGuardRememberKey objects.
	 * @throws     PropelException
	 */
	public function countafGuardRememberKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collafGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collafGuardRememberKeys) {
				return 0;
			} else {
				$query = afGuardRememberKeyQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collafGuardRememberKeys);
		}
	}

	/**
	 * Method called to associate a afGuardRememberKey object to this object
	 * through the afGuardRememberKey foreign key attribute.
	 *
	 * @param      afGuardRememberKey $l afGuardRememberKey
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addafGuardRememberKey(afGuardRememberKey $l)
	{
		if ($this->collafGuardRememberKeys === null) {
			$this->initafGuardRememberKeys();
		}
		if (!$this->collafGuardRememberKeys->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddafGuardRememberKey($l);
		}

		return $this;
	}

	/**
	 * @param	afGuardRememberKey $afGuardRememberKey The afGuardRememberKey object to add.
	 */
	protected function doAddafGuardRememberKey($afGuardRememberKey)
	{
		$this->collafGuardRememberKeys[]= $afGuardRememberKey;
		$afGuardRememberKey->setafGuardUser($this);
	}

	/**
	 * Clears out the collBands collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBands()
	 */
	public function clearBands()
	{
		$this->collBands = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBands collection.
	 *
	 * By default this just sets the collBands collection to an empty array (like clearcollBands());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initBands($overrideExisting = true)
	{
		if (null !== $this->collBands && !$overrideExisting) {
			return;
		}
		$this->collBands = new PropelObjectCollection();
		$this->collBands->setModel('Band');
	}

	/**
	 * Gets an array of Band objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Band[] List of Band objects
	 * @throws     PropelException
	 */
	public function getBands($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collBands || null !== $criteria) {
			if ($this->isNew() && null === $this->collBands) {
				// return empty collection
				$this->initBands();
			} else {
				$collBands = BandQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collBands;
				}
				$this->collBands = $collBands;
			}
		}
		return $this->collBands;
	}

	/**
	 * Sets a collection of Band objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $bands A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setBands(PropelCollection $bands, PropelPDO $con = null)
	{
		$this->bandsScheduledForDeletion = $this->getBands(new Criteria(), $con)->diff($bands);

		foreach ($bands as $band) {
			// Fix issue with collection modified by reference
			if ($band->isNew()) {
				$band->setafGuardUser($this);
			}
			$this->addBand($band);
		}

		$this->collBands = $bands;
	}

	/**
	 * Returns the number of related Band objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Band objects.
	 * @throws     PropelException
	 */
	public function countBands(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collBands || null !== $criteria) {
			if ($this->isNew() && null === $this->collBands) {
				return 0;
			} else {
				$query = BandQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collBands);
		}
	}

	/**
	 * Method called to associate a Band object to this object
	 * through the Band foreign key attribute.
	 *
	 * @param      Band $l Band
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addBand(Band $l)
	{
		if ($this->collBands === null) {
			$this->initBands();
		}
		if (!$this->collBands->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddBand($l);
		}

		return $this;
	}

	/**
	 * @param	Band $band The band object to add.
	 */
	protected function doAddBand($band)
	{
		$this->collBands[]= $band;
		$band->setafGuardUser($this);
	}

	/**
	 * Clears out the collBandHasMembers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBandHasMembers()
	 */
	public function clearBandHasMembers()
	{
		$this->collBandHasMembers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBandHasMembers collection.
	 *
	 * By default this just sets the collBandHasMembers collection to an empty array (like clearcollBandHasMembers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initBandHasMembers($overrideExisting = true)
	{
		if (null !== $this->collBandHasMembers && !$overrideExisting) {
			return;
		}
		$this->collBandHasMembers = new PropelObjectCollection();
		$this->collBandHasMembers->setModel('BandHasMember');
	}

	/**
	 * Gets an array of BandHasMember objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array BandHasMember[] List of BandHasMember objects
	 * @throws     PropelException
	 */
	public function getBandHasMembers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collBandHasMembers || null !== $criteria) {
			if ($this->isNew() && null === $this->collBandHasMembers) {
				// return empty collection
				$this->initBandHasMembers();
			} else {
				$collBandHasMembers = BandHasMemberQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collBandHasMembers;
				}
				$this->collBandHasMembers = $collBandHasMembers;
			}
		}
		return $this->collBandHasMembers;
	}

	/**
	 * Sets a collection of BandHasMember objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $bandHasMembers A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setBandHasMembers(PropelCollection $bandHasMembers, PropelPDO $con = null)
	{
		$this->bandHasMembersScheduledForDeletion = $this->getBandHasMembers(new Criteria(), $con)->diff($bandHasMembers);

		foreach ($bandHasMembers as $bandHasMember) {
			// Fix issue with collection modified by reference
			if ($bandHasMember->isNew()) {
				$bandHasMember->setafGuardUser($this);
			}
			$this->addBandHasMember($bandHasMember);
		}

		$this->collBandHasMembers = $bandHasMembers;
	}

	/**
	 * Returns the number of related BandHasMember objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related BandHasMember objects.
	 * @throws     PropelException
	 */
	public function countBandHasMembers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collBandHasMembers || null !== $criteria) {
			if ($this->isNew() && null === $this->collBandHasMembers) {
				return 0;
			} else {
				$query = BandHasMemberQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collBandHasMembers);
		}
	}

	/**
	 * Method called to associate a BandHasMember object to this object
	 * through the BandHasMember foreign key attribute.
	 *
	 * @param      BandHasMember $l BandHasMember
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addBandHasMember(BandHasMember $l)
	{
		if ($this->collBandHasMembers === null) {
			$this->initBandHasMembers();
		}
		if (!$this->collBandHasMembers->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddBandHasMember($l);
		}

		return $this;
	}

	/**
	 * @param	BandHasMember $bandHasMember The bandHasMember object to add.
	 */
	protected function doAddBandHasMember($bandHasMember)
	{
		$this->collBandHasMembers[]= $bandHasMember;
		$bandHasMember->setafGuardUser($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related BandHasMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array BandHasMember[] List of BandHasMember objects
	 */
	public function getBandHasMembersJoinBand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = BandHasMemberQuery::create(null, $criteria);
		$query->joinWith('Band', $join_behavior);

		return $this->getBandHasMembers($query, $con);
	}

	/**
	 * Clears out the collFans collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFans()
	 */
	public function clearFans()
	{
		$this->collFans = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFans collection.
	 *
	 * By default this just sets the collFans collection to an empty array (like clearcollFans());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initFans($overrideExisting = true)
	{
		if (null !== $this->collFans && !$overrideExisting) {
			return;
		}
		$this->collFans = new PropelObjectCollection();
		$this->collFans->setModel('Fan');
	}

	/**
	 * Gets an array of Fan objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this afGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Fan[] List of Fan objects
	 * @throws     PropelException
	 */
	public function getFans($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collFans || null !== $criteria) {
			if ($this->isNew() && null === $this->collFans) {
				// return empty collection
				$this->initFans();
			} else {
				$collFans = FanQuery::create(null, $criteria)
					->filterByafGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collFans;
				}
				$this->collFans = $collFans;
			}
		}
		return $this->collFans;
	}

	/**
	 * Sets a collection of Fan objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $fans A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setFans(PropelCollection $fans, PropelPDO $con = null)
	{
		$this->fansScheduledForDeletion = $this->getFans(new Criteria(), $con)->diff($fans);

		foreach ($fans as $fan) {
			// Fix issue with collection modified by reference
			if ($fan->isNew()) {
				$fan->setafGuardUser($this);
			}
			$this->addFan($fan);
		}

		$this->collFans = $fans;
	}

	/**
	 * Returns the number of related Fan objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Fan objects.
	 * @throws     PropelException
	 */
	public function countFans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collFans || null !== $criteria) {
			if ($this->isNew() && null === $this->collFans) {
				return 0;
			} else {
				$query = FanQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByafGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collFans);
		}
	}

	/**
	 * Method called to associate a Fan object to this object
	 * through the Fan foreign key attribute.
	 *
	 * @param      Fan $l Fan
	 * @return     afGuardUser The current object (for fluent API support)
	 */
	public function addFan(Fan $l)
	{
		if ($this->collFans === null) {
			$this->initFans();
		}
		if (!$this->collFans->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddFan($l);
		}

		return $this;
	}

	/**
	 * @param	Fan $fan The fan object to add.
	 */
	protected function doAddFan($fan)
	{
		$this->collFans[]= $fan;
		$fan->setafGuardUser($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Fans from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Fan[] List of Fan objects
	 */
	public function getFansJoinFanHasChildren($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FanQuery::create(null, $criteria);
		$query->joinWith('FanHasChildren', $join_behavior);

		return $this->getFans($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Fans from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Fan[] List of Fan objects
	 */
	public function getFansJoinFanHasRelationshipStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FanQuery::create(null, $criteria);
		$query->joinWith('FanHasRelationshipStatus', $join_behavior);

		return $this->getFans($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Fans from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Fan[] List of Fan objects
	 */
	public function getFansJoinFanHasIncome($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FanQuery::create(null, $criteria);
		$query->joinWith('FanHasIncome', $join_behavior);

		return $this->getFans($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this afGuardUser is new, it will return
	 * an empty collection; or if this afGuardUser has previously
	 * been saved, it will retrieve related Fans from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in afGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Fan[] List of Fan objects
	 */
	public function getFansJoinGender($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FanQuery::create(null, $criteria);
		$query->joinWith('Gender', $join_behavior);

		return $this->getFans($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->username = null;
		$this->algorithm = null;
		$this->salt = null;
		$this->password = null;
		$this->created_at = null;
		$this->last_login = null;
		$this->is_active = null;
		$this->is_super_admin = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
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
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collafGuardUserPermissions) {
				foreach ($this->collafGuardUserPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collafGuardUserGroups) {
				foreach ($this->collafGuardUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collafGuardRememberKeys) {
				foreach ($this->collafGuardRememberKeys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBands) {
				foreach ($this->collBands as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBandHasMembers) {
				foreach ($this->collBandHasMembers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collFans) {
				foreach ($this->collFans as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collafGuardUserPermissions instanceof PropelCollection) {
			$this->collafGuardUserPermissions->clearIterator();
		}
		$this->collafGuardUserPermissions = null;
		if ($this->collafGuardUserGroups instanceof PropelCollection) {
			$this->collafGuardUserGroups->clearIterator();
		}
		$this->collafGuardUserGroups = null;
		if ($this->collafGuardRememberKeys instanceof PropelCollection) {
			$this->collafGuardRememberKeys->clearIterator();
		}
		$this->collafGuardRememberKeys = null;
		if ($this->collBands instanceof PropelCollection) {
			$this->collBands->clearIterator();
		}
		$this->collBands = null;
		if ($this->collBandHasMembers instanceof PropelCollection) {
			$this->collBandHasMembers->clearIterator();
		}
		$this->collBandHasMembers = null;
		if ($this->collFans instanceof PropelCollection) {
			$this->collFans->clearIterator();
		}
		$this->collFans = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(afGuardUserPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseafGuardUser:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseafGuardUser
