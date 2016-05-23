<?php

namespace Drupal\webham_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * General class containing our TestForm.
 */
class TestForm extends FormBase {

  /**
   * Gettting the form id.
   */
  public function getFormId() {
    return 'demo_form';
  }

  /**
   * Building the form here.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Your .com email address.'),
    );
    $form['show'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    );

    return $form;
  }

  /**
   * Validating our form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    if (!empty($form_state->values['email']) && strpos($form_state['values']['email'], '.com') !== FALSE) {
      $form_state->setErrorByName('email', $this->t('This is not a .com email address.'));
    }
  }

  /**
   * Submitting our form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    drupal_set_message($this->t('Your email address is'), 'status');
  }

}
