<?php

namespace Drupal\ab_inbev_afr_sfmc_documentation\Form;

use Drupal;
use Drupal\ab_inbev_afr_sfmc_documentation\Controller\DocumentationController;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DocumentationForm.
 *
 * @package Drupal\ab_inbev_afr_sfmc_documentation\Form
 */
class DocumentationForm extends FormBase{

  /**
   * Returns a unique string identifying the form.
   *
   * @return string The unique string identifying the form.
   */
  public function getFormId(){
    return 'ab_inbev_afr_sfmc_documentation_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    // SFMC - Documentation.
    $form['sfmc']['documentation'] = [
      '#type' => 'details',
      '#title' => 'AB-InBev - Salesforce Marketing Cloud Email Connector - Documentation',
      '#open' => true,
    ];

    // Firstname.
    $form['sfmc']['documentation']['firstname'] = [
      '#type' => 'textfield',
      '#title' => t('Firstname'),
      '#required' => true,
    ];

    // Lastname.
    $form['sfmc']['documentation']['lastname'] = [
      '#type' => 'textfield',
      '#title' => t('Lastname'),
      '#required' => true,
    ];

    // Birthdate.
    $form['sfmc']['documentation']['birthdate'] = [
      '#type' => 'date',
      '#title' => t('Birthdate'),
      '#required' => true,
    ];

    // Email.
    $form['sfmc']['documentation']['email'] = [
      '#type' => 'email',
      '#title' => t('Email'),
      '#required' => true,
    ];

    // Phone.
    $form['sfmc']['documentation']['phone'] = [
      '#type' => 'textfield',
      '#title' => t('Phone'),
      '#required' => true,
    ];

    // Gender.
    $form['sfmc']['documentation']['gender'] = [
      '#type' => 'select',
      '#title' => t('Gender'),
      '#empty_option'  => t('- Select -'),
      '#options' => [
        'Male' => t('Male'),
        'Female' => t('Female'),
        'Other' => t('Other')
      ],
      '#required' => true,
    ];

    // Terms & conditions and privacy policy.
    $form['sfmc']['documentation']['terms_conditions_and_privacy_policy'] = [
      '#type' => 'checkbox',
      '#title' => t('I accept the <a href="/ab-inbev/sfmc/terms-and-conditions.pdf" target="_blank">Terms & Conditions</a> and the <a href="/ab-inbev/sfmc/terms-and-conditions.pdf" target="_blank">Privacy Policy</a>.'),
      '#required' => true,
    ];

    // Marketing.
    $form['sfmc']['documentation']['marketing'] = [
      '#type' => 'checkbox',
      '#title' => t('Please send me information on future events and promotions.'),
    ];

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Register'),
    );

    return $form;
  }

  /**
   *
   * @param array $form
   * @param FormStateInterface $form_state
   *
   *  validate form
   */
  public function validateForm(array &$form, FormStateInterface $form_state){
    $email = $form_state->getValue('email');
    $email_exist = DocumentationController::validateIfEmailExist($email);
    if($email_exist)
      $form_state->setErrorByName('email', t('The user cannot be registered with the email entered. Reason: There is already a registered user with this email (<b>' . $email . '</b>).'));
  }

  /**
   *
   * @param array $form
   * @param FormStateInterface $form_state
   *
   *  submit form and build the batch
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $result = DocumentationController::registerUser($form_state->getValue('firstname'), $form_state->getValue('lastname'), (string)$form_state->getValue('birthdate'), $form_state->getValue('email'), $form_state->getValue('phone'), $form_state->getValue('gender'), $form_state->getValue('terms_conditions_and_privacy_policy'), $form_state->getValue('marketing'));
    \Drupal::messenger()->addMessage($result);
  }
}
