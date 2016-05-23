<?php

namespace Drupal\webham_router\Controller;

use \Drupal\Core\Config\Config;

/**
 * DemoController.
 */
class TestController {

  /**
   * Generates an example page.
   */
  public function test() {

    $config = \Drupal::config('webham_router.new_settings');

    $smt  = $config->get('something');

    return array(
      '#markup' => 'Hello ' . $smt . ' ssss',
    );
  }

  /**
   * Test controller action 2.
   */
  public function test2() {

    $result = db_query_range('SELECT * FROM node');

    $taxonomies = array(
      'Innovation' => array('items' => array('New fans', 'New materials')),
      'Current Technology' => array('items' => array('Fans')),
    );

    $taxonomies['nodes']  = count($result);
    foreach ($result as $record) {
      // Perform operations on $record->title, etc. here.
      $taxonomies[$record->title] = $record->title;
    }

    $response = new Response();
    $response->setContent(json_encode($taxonomies));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

}
