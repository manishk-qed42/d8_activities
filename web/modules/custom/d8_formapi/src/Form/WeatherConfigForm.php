<?php

namespace Drupal\d8_formapi\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Weather Config Form.
 * 
 * @package Drupal\d8_formapi\Form
 */
class WeatherConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'weather_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'd8_formapi.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config('d8_formapi.settings');
    $form['appid'] = [
      '#type' => 'textfield',
			'#title' => $this->t('App ID'),
			'#required' => TRUE,
      '#default_value' => $config->get('appid'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('d8_formapi.settings')
      ->set('appid', $form_state->getValue('appid'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
