<?php

namespace Drupal\d8_event_api\EventSubscriber;

use Drupal\Core\Url;
use Drupal\d8_event_api\Event\D8EventApiEvent;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * D8EventApiCustomEventSubscriber Event Subscriber.
 * 
 * @package \Drupal\d8_event_api\EventSubscriber
 */
class D8EventApiCustomSubscriber implements EventSubscriberInterface {

  /**
   * The logger.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $logger;

  /**
   * The D8EventApiCustomEventSubscriber Subscriber Constructor.
   *
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger
   *   The logger channel factory interface.
   */
  public function __construct(LoggerChannelFactoryInterface $logger) {
    $this->logger = $logger->get('d8_event_api');
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[D8EventApiEvent::NODE_INSERT][] = ['onEntityInsert'];
    return $events;
  }

  /**
   * Trigger this code on node.insert event.
   * 
   * @param \Drupal\d8_event_api\Event\D8EventApiEvent $event
   *   D8EventApiEvent Event.
   */
  public function onEntityInsert(D8EventApiEvent $event) {
    $entity = $event->getEntity();
    $this->logger->info('New node @node_title inserted.', [
      '@node_title' => $entity->label(),
    ]);
  }

}