<?php

/**
 * @file
 * Contains \Drupal\webham_custom\Form\TestForm.
 */

namespace Drupal\webham_custom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class TestForm extends FormBase {
  
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'demo_form';
  }
  


  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Your .com email address.')
    );
    $form['show'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    );
    
    return $form;
  }
  

  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    if (!empty($form_state->values['email']) && strpos($form_state['values']['email'],'.com') !== false) {
      $form_state->setErrorByName('email', $this->t('This is not a .com email address.'));
    } 
  }


  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    drupal_set_message($this->t('Your email address is'), 'status');
  }


  
}