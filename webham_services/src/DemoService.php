<?php

namespace Drupal\webham_services;

/**
 * Simple service with simple output.
 */
class DemoService {

  protected $demoValue;

  /**
   * We are creating an object here.
   */
  public function __construct() {
    $this->demoValue = 'compuccino user from service';
  }

  /**
   * And our getter here.
   */
  public function getDemoValue() {
    return $this->demoValue;
  }

}
