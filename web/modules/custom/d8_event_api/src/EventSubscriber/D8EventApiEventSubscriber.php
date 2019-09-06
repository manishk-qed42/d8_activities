<?php

namespace Drupal\d8_event_api\EventSubscriber;

use Drupal\Core\Url;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * D8EventApi Event Subscriber.
 * 
 * @package \Drupal\d8_event_api\EventSubscriber
 */
class D8EventApiEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['onResponse'];
    return $events;
  }

  /**
   * Trigger this code on kernel.response event.
   * 
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   Filter Response Event.
   */
  public function onResponse(FilterResponseEvent $event) {
    // Add extra HTTP header.
    $current_path = Url::fromRoute('<current>');
    if (stristr($current_path->getInternalPath(), 'node')) {
      $request = $event->getRequest();
      $request->headers->set('access-control-allow-origin', '*');
      // $response = $event->getResponse();
      // $response->headers->set('access-control-allow-origin', '*');
    }
  }

}