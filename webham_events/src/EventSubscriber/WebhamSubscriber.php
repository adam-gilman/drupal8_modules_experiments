<?php

/**
 * @file
 * Contains Drupal\webham_events\EventSubscriber\WebhamSubscriber
 */

namespace Drupal\webham_events\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class WebhamSubscriber implements EventSubscriberInterface {

  static function getSubscribedEvents() {

    $events['dummy_entity_form.save'][] = array('onConfigSave', 0);
    
    return $events;
  }

  public function onConfigSave($event) {

    $config = $event->getConfig();

    $name_website = $config->get('my_name') . " / " . $config->get('my_website');
    
    $config->set('my_website', $name_website);
  }

}