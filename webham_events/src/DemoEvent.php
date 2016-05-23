<?php

namespace Drupal\webham_events;

use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Config\Config;

/**
 * Demo event class.
 */
class DemoEvent extends Event {

  protected $config;

  /**
   * Constructor.
   */
  public function __construct(Config $config) {
    $this->config = $config;
  }

  /**
   * Getter for the config object.
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Setter for the config object.
   */
  public function setConfig($config) {
    $this->config = $config;
  }

}
