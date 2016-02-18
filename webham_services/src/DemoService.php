<?php

/**
 * @file
 * Contains Drupal\webham_services\DemoService.
 */

namespace Drupal\webham_services;

class DemoService {
  
  protected $demo_value;
  
  public function __construct() {
    $this->demo_value = 'compuccino user from service';
  }
  
  public function getDemoValue() {
    return $this->demo_value;
  }
  
}