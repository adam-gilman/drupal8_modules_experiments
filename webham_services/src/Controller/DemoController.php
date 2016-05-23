<?php

namespace Drupal\webham_services\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use PHPGit\Git;

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
      // We are getting the service, the way it is declared in
      // the .services.yml file.
      $container->get('webham_services.demo_service')
    );
  }

  /**
   * Generates an example page.
   */
  public function printPage() {

    $output = t('Hello <strong>@value!</strong>', array('@value' => $this->demoService->getDemoValue()));

    // $parser = new Jsonp();
    // ;
    // $repo = new Repo('/Users/nikolay/Sites/gittest');.
    $git = new Git();

    $git->setRepository('/Users/nikolay/Sites/gittest');

    kint($git->log());

    return array(
      '#markup' => $output,
    );
  }

}
