<?php

namespace Drupal\d8_permission\Controller;

use Drupal\node\NodeInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Controller\ControllerBase;

/**
 * D8Permission Controller class.
 * 
 * @package \Drupal\d8_permission\Controller
 */
class D8PermissionController extends ControllerBase {
	
	/**
   * Custom access check for node.
   *
	 * @param \Drupal\node\NodeInterface $node
	 *   Node.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
	 * 
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
	public function access(NodeInterface $node, AccountInterface $account) {
    // Check current user with node author.
    if ($account->id() == $node->uid->getString()) {
      // If the current user match with nodes author, give them access.
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }
  
}