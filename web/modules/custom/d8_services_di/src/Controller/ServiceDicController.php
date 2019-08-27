<?php

namespace Drupal\d8_services_di\Controller;

use Drupal\Core\Database\Connection;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ServiceDicController class.
 * 
 * @package \Drupal\d8_services_di\Controller
 */
class ServiceDicController extends ControllerBase {

  /**
   * Database Connection.
   * 
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  /**
	 * ServiceDicController Constructor.
	 * 
	 * @param \Drupal\Core\Database\Connection $connection
	 *   Database connection.
	 */
	public function __construct(Connection $connection) {
		$this->connection = $connection;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  /**
   * Get subscribers.
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   Return subscriber json.
   */
  public function getSubscribers() {
    if ($this->connection->schema()->tableExists('d8_demo')) {
			$query = $this->connection->select('d8_demo', 'd8d');
			$query->fields('d8d', ['id', 'email', 'first_name', 'last_name']);
      $result = $query->execute()->fetchAllAssoc('id');
      return new JsonResponse($result);
    }
    return new JsonResponse(['Subscribers not found.']);
  }
  
}