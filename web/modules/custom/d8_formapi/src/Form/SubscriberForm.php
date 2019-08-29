<?php

namespace Drupal\d8_formapi\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\d8_formapi\Services\Form\FormDataManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Simple Form
 * 
 * @package Drupal\d8_formapi\Form
 */
class SubscriberForm extends FormBase {
  
  /**
	 * The Messenger.
	 * 
	 * @var \Drupal\Core\Messenger\MessengerInterface
	 */
  protected $messenger;
  
  /**
	 * The Form Data Manager.
	 * 
	 * @var \Drupal\d8_formapi\Services\Form\FormDataManagerInterface
	 */
	protected $formDataManager;

	/**
	 * Subscriber Form Constructor.
	 * 
	 * @param \Drupal\Core\Messenger\MessengerInterface $messenger
	 *   The messenger interface.
	 * @param \Drupal\d8_formapi\Services\Form\FormDataManagerInterface $form_data_manager
	 *   The Form data manager interface.
	 */
	public function __construct(MessengerInterface $messenger, FormDataManagerInterface $form_data_manager) {
		$this->messenger = $messenger;
		$this->formDataManager = $form_data_manager;
	}
  
  /**
   * {@inheritdoc}
   */
	public static function create(ContainerInterface $container) {
		return new static(
      $container->get('messenger'),
      $container->get('d8_formapi.form_data_manager')
		);
  }
  
  /**
	 * {@inheritdoc}
	 */
	public function getFormId() {
		return 'subscriber_form';
  }
  
  /**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state) {
    $defaultData = $this->formDataManager->getSubscriberFormData();

		$form['first_name'] = [
			'#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => isset($defaultData['first_name']) ? $defaultData['first_name'] : '',
			'#attributes' => [
				'placeholder' => $this->t('First Name'),
			],
    ];
    
    $form['last_name'] = [
			'#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => isset($defaultData['last_name']) ? $defaultData['last_name'] : '',
			'#attributes' => [
				'placeholder' => $this->t('Last Name'),
			],
    ];
    
    $form['email'] = [
			'#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => isset($defaultData['email']) ? $defaultData['email'] : '',
			'#attributes' => [
				'placeholder' => $this->t('Email'),
			],
		];

		$form['form_submit'] = [
			'#type' => 'submit',
			'#value' => $this->t('Submit'),
		];

		return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
		if (empty($form_state->getValue('first_name'))) {
			$form_state->setErrorByName('first_name', $this->t('First Name is required.'));
    }
    if (empty($form_state->getValue('last_name'))) {
			$form_state->setErrorByName('last_name', $this->t('Last Name is required.'));
    }
    if (empty($form_state->getValue('email'))) {
			$form_state->setErrorByName('email', $this->t('Email Name is required.'));
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($this->formDataManager->setSubscriberFormData($form_state->getValues())) {
			$this->messenger->addStatus($this->t('Data inserted successfully.'));
		}
  }
  
}