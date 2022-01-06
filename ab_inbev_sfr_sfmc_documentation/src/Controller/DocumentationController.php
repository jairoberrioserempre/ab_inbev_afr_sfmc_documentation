<?php
namespace Drupal\ab_inbev_afr_sfmc_documentation\Controller;

use Drupal;
use Drupal\ab_inbev_afr_sfmc_documentation\DocumentationRepository;
use Drupal\Component\Render\FormattableMarkup;

class DocumentationController{

  /**
   * @param $received_email
   * @return bool
   */
  public static function validateIfEmailExist($received_email){
    $response = false;
    $repository = new DocumentationRepository();
    $result = $repository->checkEmailExist($received_email);
    if($result)
      $response = true;

    return $response;
  }

  /**
   * @param $received_firstname
   * @param $received_lastname
   * @param $received_birthdate
   * @param $received_email
   * @param $received_phone
   * @param $received_gender
   * @param $received_terms_conditions_and_privacy_policy
   * @param $received_marketing
   * @return FormattableMarkup|Drupal\Core\StringTranslation\TranslatableMarkup|string
   */
  public static function registerUser($received_firstname, $received_lastname, $received_birthdate, $received_email, $received_phone, $received_gender, $received_terms_conditions_and_privacy_policy, $received_marketing){
    $repository = new DocumentationRepository();
    $response = $repository->insertUser($received_firstname, $received_lastname, $received_birthdate, $received_email, $received_phone, $received_gender, $received_terms_conditions_and_privacy_policy, $received_marketing);

    return $response;
  }
}
