<?php

namespace Drupal\d8_event_api\Event;

use Drupal\Core\Entity\EntityInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * D8EventApi Event.
 * 
 * @package \Drupal\d8_event_api\Event
 */
class D8EventApiEvent extends Event {

  const NODE_INSERT = 'node.insert';

  /**
   * Node entity.
   *
   * @var \Drupal\Core\Entity\EntityInterface
   */
  protected $entity;

  /**
   * D8EventApi Event Constructor.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The Entity.
   */
  public function __construct(EntityInterface $entity) {
    $this->entity = $entity;
  }

  /**
   * Get inserted entity.
   * 
   * @return \Drupal\Core\Entity\EntityInterface
   *   Return Entity.
   */
  public function getEntity() {
    return $this->entity;
  }

}