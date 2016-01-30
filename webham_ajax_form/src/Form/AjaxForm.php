<?php

/**
 * @file
 * Contains \Drupal\webham_ajax_form\Form\AjaxForm.
 */

namespace Drupal\webham_ajax_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

// special for the ajax
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;

use Drupal\Core\Ajax\OpenModalDialogCommand;
    


class AjaxForm extends FormBase {
  
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'webham_ajax_form';
  }
  


  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Your .com email address.'),
       '#ajax' => [
            'callback' => array($this, 'validateEmailAjax'),
            'event' => 'change',
            'progress' => array(
              'type' => 'throbber',
              'message' => t('Verifying email...'),
            ),
          ],
    '#suffix' => '<span class="email-valid-message">suffix</span>');
    
    $form['show'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
             '#ajax' => [
            'callback' => array($this, 'submitEmailAjax'),
            'event' => 'click',
            'progress' => array(
              'type' => 'throbber',
              'message' => t('Submitting email...'),
            ),
          ],
    '#suffix' => '<span class="submit-valid-message">suffix</span>');
 
    
    
    return $form;
  }
  
  protected function validateEmail(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');
    if (!empty($email) && (strpos($email, '.com') !== false)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Ajax callback to validate the email field.
   */
  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    
    $valid = $this->validateEmail($form, $form_state);

    $response = new AjaxResponse();
    if ($valid) {
      $css = ['border' => '1px solid green'];
      $message = $this->t('Email ok.');
    }
    else {
      $css = ['border' => '1px solid red'];
      $message = $this->t('Email not valid.');
    }
    $response->addCommand(new CssCommand('#edit-email', $css));
    $response->addCommand(new HtmlCommand('.email-valid-message', $message));
    return $response;
}

  /**
   * Ajax callback to validate the email field.
   */
  public function submitEmailAjax(array &$form, FormStateInterface $form_state) {
    
    $valid = $this->validateEmail($form, $form_state);

    $response = new AjaxResponse();
    if ($valid) {
      $css = ['border' => '1px solid green'];
      $message = $this->t('Email ok.');
    }
    else {
      $css = ['border' => '1px solid red'];
      $message = $this->t('Email not valid.');
    }
    //$response->addCommand(new CssCommand('#edit-email', $css));
    $response->addCommand(new OpenModalDialogCommand('Alert', 'hello', array('width' => '700')));
    return $response;
}

  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    if (!$this->validateEmail($form, $form_state) ) {
      $form_state->setErrorByName('email', $this->t('This is not a .com email address.'));
    } 
  }



  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $email = $form_state->getValue('email');

    drupal_set_message($this->t('Your email address is @address', array('@address' => $email)), 'status');
  }




  
}