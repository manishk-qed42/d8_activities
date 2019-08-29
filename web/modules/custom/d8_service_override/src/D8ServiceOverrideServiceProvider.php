<?php
/**
 * @file
 * Contains \Drupal\d8_service_override\D8ServiceProvider.
 */

namespace Drupal\d8_service_override;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\Core\DependencyInjection\ServiceProviderInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class D8ServiceOverrideProvider.
 *
 * @package Drupal\d8_service_override
 */
class D8ServiceOverrideServiceProvider extends ServiceProviderBase implements ServiceProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('user.auth');
    $definition->setClass('Drupal\d8_service_override\Services\User\UserAuthCustom');
    $definition->setArguments(
      [
        new Reference('entity_type.manager'),
        new Reference('password'),
        new Reference('database'),
      ]
    );
  }

}