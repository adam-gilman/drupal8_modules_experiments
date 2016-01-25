<?php

/**
 * @file
 * Contains Drupal\webham_events\Form\DummyEntityForm.
 */

namespace Drupal\webham_events\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

// To be able to use the event
use Drupal\webham_events\DemoEvent;

class DummyEntityForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'dummy_entity_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('webham_events.demo_form_config');
    $form['my_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('My name'),
      '#default_value' => $config->get('my_name'),
    ];
    $form['my_website'] = [
      '#type' => 'textfield',
      '#title' => $this->t('My website'),
      '#default_value' => $config->get('my_website'),
    ];
    //kint('hello');
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    parent::submitForm($form, $form_state);

    $config = $this->configFactory()->getEditable('webham_events.demo_form_config');

    $config->set('my_name', $form_state->getValue('my_name'))
      ->set('my_website', $form_state->getValue('my_website'));

    // Special code to implement the Events
    
    $dispatcher = \Drupal::service('event_dispatcher');

    $e = new DemoEvent($config);

    $event = $dispatcher->dispatch('dummy_entity_form.save', $e);

    $newData = $event->getConfig()->get();


    //kint($newData);
    //die();
    
    $config->merge($newData);



    
    

    $config->save();
   
  }

  protected function getEditableConfigNames() {
    return array('system.site');
  }

}