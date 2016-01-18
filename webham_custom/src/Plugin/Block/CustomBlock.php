<?php

/**
 * @file
 * Contains \Drupal\block_example\Plugin\Block\ExampleEmptyBlock.
 */

namespace Drupal\webham_custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: empty block' block.
 *
 * @Block(
 *   id = "webham_empty_second",
 *   admin_label = @Translation("Webham empty block second")
 * )
 */
class CustomConfigurableBlock extends BlockBase {

	/**
	 * {@inheritdoc}
	 */
	public function blockForm($form, &$form_state) {
	  
	  $form = parent::blockForm($form, $form_state);
	  
	  $config = $this->getConfiguration();

	  $form['demo_block_settings'] = array(
	    '#type' => 'textfield',
	    '#title' => $this->t('Who'),
	    '#description' => $this->t('Who do you want to say hello to?'),
	    '#default_value' => isset($config['demo_block_settings']) ? $config['demo_block_settings'] : '',
	  );
	  
	  return $form;
	}

	/**
	* {@inheritdoc}
	*/
	public function blockSubmit($form, &$form_state) {
	 
	 $this->setConfigurationValue('demo_block_settings', $form_state['values']['demo_block_settings']);
	 
	}

	/**
	 * {@inheritdoc}
	 */
	public function build() {
	  
	  $config = $this->getConfiguration();
	  
	  if (isset($config['demo_block_settings']) && !empty($config['demo_block_settings'])) {
	    $name = $config['demo_block_settings'];
	  }
	  else {
	    $name = $this->t('to no one');
	  }
	  
	  return array(
	    '#markup' => $this->t('Hello @name!', array('@name' => $name)),
	  );  
	}


}