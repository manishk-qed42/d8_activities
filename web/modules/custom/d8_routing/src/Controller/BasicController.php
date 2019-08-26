<?php

namespace Drupal\d8_routing\Controller;

use Drupal\node\NodeInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Controller\ControllerBase;

/**
 * Basic Controller class.
 * 
 * @package \Drupal\d8_routing\Controller
 */
class BasicController extends ControllerBase {

  /**
	 * Static content callback.
	 * 
	 * @return array
	 *   Markup.
	 */
	public function staticCallback() {
		return ['#markup' => 'Hello! I am your node listing page.'];
	}

  /**
	 * Dynamic content callback.
	 * 
	 * @param int $arg
	 *   Demo argument.
	 * 
	 * @return array
	 *   Markup.
	 */
	public function dynamicListingCallback($arg) {
		return ['#markup' => 'Hello! I am your ' . $arg . ' listing page.'];
	}

  /**
	 * Node Details.
	 * 
	 * @param \Drupal\node\NodeInterface $node
	 *   Node.
	 * 
	 * @return array
	 *   Markup.
	 */
	public function nodeDetailCallback(NodeInterface $node) {
		$build['wrapper'] = [
			'#type' => 'container',
		];

		$build['wrapper']['node']['title'] = [
			'#type' => 'html_tag',
			'#tag' => 'h1',
			'#value' => $node->label(),
		];
		$build['wrapper']['node']['body'] = [
			'#type' => 'html_tag',
			'#tag' => 'p',
			'#value' => $node->body->value,
		];
		
		return $build;
  }

  /**
	 * Nodes Details.
	 * 
	 * @param \Drupal\node\NodeInterface $node1
	 *   Node.
	 * @param \Drupal\node\NodeInterface $node2
	 *   Node.
	 * 
	 * @return array
	 *   Markup.
	 */
	public function getNodesDetails(NodeInterface $node1, NodeInterface $node2 = NULL) {
		$build['wrapper'] = [
			'#type' => 'container',
		];

		$build['wrapper']['node1']['title'] = [
			'#type' => 'html_tag',
			'#tag' => 'h1',
			'#value' => $node1->label(),
		];
		$build['wrapper']['node1']['body'] = [
			'#type' => 'html_tag',
			'#tag' => 'p',
			'#value' => $node1->body->value,
		];
		
		if (!is_null($node2)) {
			$build['wrapper']['node2']['title'] = [
				'#type' => 'html_tag',
				'#tag' => 'h1',
				'#value' => $node2->label(),
			];
			$build['wrapper']['node2']['body'] = [
				'#type' => 'html_tag',
				'#tag' => 'p',
				'#value' => $node2->body->value,
			];
		}
		return $build;
	}

  /**
   * Dynamic routing callback.
   */
  public function routes() {
    $routes['d8_routing.dynamic_route_static_content'] = new Route(
      '/dynamic-route/static-content',
      [
        '_controller' => '\Drupal\d8_routing\Controller\BasicController::staticCallback',
        '_title' => 'Static Content Page',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    $routes['d8_routing.dynamic_route_node_details'] = new Route(
      '/dynamic-route/list/{node}',
      [
        '_controller' => '\Drupal\d8_routing\Controller\BasicController::dynamicListingCallback',
        '_title' => 'Dynamic Listing',
        'arg' => 'node',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    $routes['d8_routing.dynamic_route_arg_demo'] = new Route(
      '/dynamic-route/arg-demo/{arg}',
      [
        '_controller' => '\Drupal\d8_routing\Controller\BasicController::nodeDetailCallback',
        '_title' => 'Node Detail',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    return $routes;
  }
  
}