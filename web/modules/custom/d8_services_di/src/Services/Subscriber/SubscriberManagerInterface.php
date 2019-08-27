<?php

namespace Drupal\d8_services_di\Services\Subscriber;

/**
 * SubscriberManager Interface.
 */
interface SubscriberManagerInterface {
	
	/**
	 * Get Subscribers.
	 * 
	 * @return array
	 *   Subscriber List.
	 */
	public function getSubscribers();

}