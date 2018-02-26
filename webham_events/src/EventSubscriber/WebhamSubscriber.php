<?php

namespace Drupal\webham_events\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Our EventSubscriber class.
 */
class WebhamSubscriber implements EventSubscriberInterface {

  /**
   * Get the subscriber events.
   */
  public static function getSubscribedEvents() {

    $events['dummy_entity_form.save'][] = ['onConfigSave', 0];

    return $events;
  }

  /**
   * Actual altering happening here.
   */
  public function onConfigSave($event) {

    $config = $event->getConfig();

    $name_website = $config->get('my_name') . " / " . $config->get('my_website');

    $config->set('my_website', $name_website);
  }

}
