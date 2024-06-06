<?php
/*
 * @file
 * Contains Drupal\demo\Form\MyDemoForm
 */

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class MyDemoForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'resume_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $demo_client_id = \Drupal::config('MyDemoConfig.settings')->get('demo_client_id');

    $callService = \Drupal::service('demo_base64');
    $encrypt_string = $callService->encryptStr('Gajanan');
    $form['encrypt'] = [
      '#markup' => '<h2>' . $encrypt_string . '</h2>',
    ];
    $form['encrypt_string'] = [
      '#markup' => '<h2>' . $callService->decryptStr($encrypt_string) . '</h2>',
    ];
    $form['demo_client_id'] = [
        '#markup' => '<h2>' . $demo_client_id . '</h2>',
    ];

    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Candidate Name:'),
      '#required' => TRUE,
    );
    $form['candidate_mail'] = array(
      '#type' => 'email',
      '#title' => $this->t('Email ID:'),
      '#required' => TRUE,
    );
    $form['candidate_number'] = array (
      '#type' => 'tel',
      '#title' => $this->t('Mobile no'),
    );
    $form['candidate_dob'] = array (
      '#type' => 'date',
      '#title' => $this->t('DOB'),
      '#required' => TRUE,
    );
    $form['candidate_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => $this->t('Female'),
        'male' => $this->t('Male'),
      ),
    );
    $form['candidate_confirmation'] = array (
      '#type' => 'radios',
      '#title' => ('Are you above 18 years old?'),
      '#options' => array(
        'Yes' => $this->t('Yes'),
        'No' => $this->t('No')
      ),
    );

    $form['age'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Age:'),
      '#states' => [
        'visible' => [
          ':input[name="candidate_confirmation"]' => ['value' => 'No'],
        ],
      ],
    );

    $form['candidate_copy'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Send me a copy of the application.'),
    );

    $form['#attached']['drupalSettings']['unique_id'] = "123";
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );

    $form['#attached']['library'][] = 'demo/demo.demo_js';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    if (strlen($form_state->getValue('candidate_number')) < 10) {
      $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
    }
  }

 /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    dump($form_state->getValues());
  }

}