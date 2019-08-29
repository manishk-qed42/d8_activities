<?php

namespace Drupal\d8_service_override\Services\User;

use Drupal\user\UserAuth;
use Drupal\user\UserAuthInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Password\PasswordInterface;

/**
 * UserAuth service.
 * Override UserAuth Service.
 * 
 * @package Drupal\d8_services_override\Services\User
 */
class UserAuthCustom extends UserAuth implements UserAuthInterface {

	/**
	 * Database Connection.
	 * 
	 * @var \Drupal\Core\Database\Connection
	 */
	protected $connection;

	/**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The password hashing service.
   *
   * @var \Drupal\Core\Password\PasswordInterface
   */
  protected $passwordChecker;

	/**
	 * Subscriber Manager Constructor.
	 * 
	 * @param \Drupal\Core\Database\Connection $connection
	 *   Database connection.
	 * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Password\PasswordInterface $password_checker
   *   The password service.
	 */
	public function __construct(EntityTypeManagerInterface $entity_type_manager, PasswordInterface $password_checker, Connection $connection) {
		parent::__construct($entity_type_manager, $password_checker);
		$this->connection = $connection;
		$this->entityTypeManager = $entity_type_manager;
	}

	/**
   * {@inheritdoc}
   */
  public function authenticate($username, $password) {
		$uid = parent::authenticate($username, $password);
		return $uid;
	}

	/**
	 * DataBase Connection.
	 */
	public function dbConnection() {
		return $this->connection;
	}

	/**
	 * Entity Type Manager.
	 */
	public function entityTypeManager() {
		return $this->entityTypeManager;
	}

}