<?php
/**
 * @file
 * Contains \Drupal\webham_services\Controller\DemoController.
 */

namespace Drupal\webham_services\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * DemoController.
 */
class DemoController extends ControllerBase {
  
  protected $demoService;
  
  /**
   * Class constructor.
   */
  public function __construct($demoService) {
    $this->demoService = $demoService;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      // we are getting the service, the way it is declared in the .services.yml file
      $container->get('webham_services.demo_service')
    );
  }
  
  /**
   * Generates an example page.
   */
  public function printPage() {
    return array(
      '#markup' => t('Hello <strong>@value!</strong>', array('@value' => $this->demoService->getDemoValue())),
    );
  }
}