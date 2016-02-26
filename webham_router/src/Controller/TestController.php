<?php
/**
 * @file
 * Contains \Drupal\webham_router\Controller\DemoController.
 */

namespace Drupal\webham_router\Controller;

/**
 * DemoController.
 */
class TestController {
  /**
   * Generates an example page.
   */
  public function test() {

    return array(
      '#markup' => t('Hello Compuccino!'),
    );
  }
}